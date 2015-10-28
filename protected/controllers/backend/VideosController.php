<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VideosController extends BackEndController {

    private $video;
    private $category;
    var $tag;
    private $playlist;

    function init() {
        parent::init();
        yii::import('application.models.backend.medias.*');
        $this->video = Media::getInstance();
        yii::import('application.models.backend.category.*');
        $this->category = Category::getInstance();
        yii::import('application.models.backend.tags.*');
        $this->tag = Tag::getInstance();

        yii::import('application.models.backend.playlists.*');
        $this->playlist = Playlist::getInstance();
    }

    public function actionDisplay() {
        $data = array();
        if (isset($_GET['delete']) && $_GET['delete']) {
            $this->deleteMedia($_GET['delete']);
        }
        $data['total'] = $this->countTotal();
        $offset = isset($_GET['limitstart']) ? $_GET['limitstart'] : 0;
        $limit = 10;
        $data['films'] = $this->video->getMedias($limit, $offset);


        $this->render('default', $data);
    }

    private function countTotal() {
        $media = new Media();
        return $media->getCountTotal();
    }

    public function actionCreate($type = false) {
        $data = array();
        if (isset($_GET['id']) && $_GET['id']) {
            $data['item'] = $this->video->getMediaById($_GET['id']);
            $data['item']['tags'] = $this->video->getVideoAndByTag($_GET['id']);
            $data['item']['categories'] = $this->video->getVideoAndByCategories($_GET['id']);
        }
//        if (isset($_GET['query']) && $_GET['query']) {
//            $data['item'] = $this->YoutubeGetInfo(str_replace(' ', '', $_GET['query']));
//            $data['item']['fecklink'] = $_GET['query'];
//            $data['item']['image'] = $data['item']['thumbnail_url'];
//            //$data['item']['origin_link'] = 
        //      }
        $data['playlists'] = $this->playlist->getPlaylists(0, 0);
        $data['categories'] = $this->category->getCategories(0, 0, array('type' => 0));
        $data['tags'] = $this->tag->getTags(0, 0);
        $this->render('add', $data);
    }

    private function YoutubeGetInfo($url) {
        $youtube = "http://www.youtube.com/oembed?url=" . $url . "&format=json";

        $curl = curl_init($youtube);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $return = curl_exec($curl);
        curl_close($curl);
        return json_decode($return, true);
    }

    public function actionAddMedia() {
        $link_data = array();
        $data = array();
        $id = false;
        if (isset($_POST) && $_POST) {
            $data['video'] = array(
                'id' => (Request::getVar('id', '')) ? Request::getVar('id', '') : false,
                'title' => Request::getVar('title', ''),
                'alias' => Request::getVar('alias', ''),
                'play_id' => Request::getVar('playlist', ''),
                'info' => Request::getVar('info', ''),
                'fecth_link' => Request::getVar('fecth_link', ''),
                'origin_link' => Request::getVar('origin_link', ''),
                'status' => Request::getVar('status', ''),
                'iframe' => isset($_POST['iframe']) ? $_POST['iframe'] : '',
                'option' => Request::getVar('auto', ''),
                'metakey' => Request::getVar('metakey', ''),
                'metadesc' => Request::getVar('metadesc', ''),
                'cdate' => date('Y:m:d H:i:s', time()),
                'image' => Request::getVar('image', ''),
                'mdate' => isset($_POST['id']) ? date('Y:m:d H:i:s', time()) : false
            );
            if (isset($_POST['tags']) && $_POST['tags']) {
                $data['tags'] = $_POST['tags'];
            }
            if (isset($_POST['categories']) && $_POST['categories']) {
                $data['categories'] = $_POST['categories'];
            }
            if (isset($data['video']['id']) && $data['video']['id']) {
                if (!$this->video->updateMedia($data)) {
                    YError::raseWarning("Update bean has success!.");
                } else {
                    YError::raseNotice("Error! Update fail!.");
                }
                $id = $_POST['id'];
            } else {
                $id = $this->video->addMedia($data);
                if ($id) {
                    YError::raseWarning("Create bean has success!.");
                } else {

                    YError::raseNotice("Error! Created fail!.");
                }
            }
            if (isset($_POST['save_close']) && $_POST['save_close']) {
                $this->redirect($this->createUrl("/videos"));
            } else {
                $this->redirect("/backend/videos/create?id=$id");
            }
        }
    }

    private function deleteMedia($id) {
        if (!$this->video->deleteRecord($id)) {

            YError::raseWarning("Delete bean has success!.");
        } else {

            YError::raseNotice("Error! Delete fail!.");
        }
        $this->redirect($this->createUrl("/videos"));
    }

//API : get_video_info
    private static $endpoint = "http://www.youtube.com/get_video_info";

    private function getLink($id) {
        $API_URL = self::$endpoint . "?&video_id=" . $id;
        $video_info = $this->curlGet($API_URL);
        $url_encoded_fmt_stream_map = '';
        parse_str($video_info);
        if (isset($reason)) {
            return $reason;
        }
        if (isset($url_encoded_fmt_stream_map)) {
            $my_formats_array = explode(',', $url_encoded_fmt_stream_map);
        } else {
            return 'No encoded format stream found.';
        }
        if (count($my_formats_array) == 0) {
            return 'No format stream map found - was the video id correct?';
        }
        $avail_formats[] = '';
        $i = 0;
        $ipbits = $ip = $itag = $sig = $quality = $type = $url = '';
        $expire = time();
        foreach ($my_formats_array as $format) {
            parse_str($format);
            $avail_formats[$i]['itag'] = $itag;
            $avail_formats[$i]['quality'] = $quality;
            $type = explode(';', $type);
            $avail_formats[$i]['type'] = $type[0];
            $avail_formats[$i]['url'] = urldecode($url) . '&signature=' . $sig;
            parse_str(urldecode($url));
            $avail_formats[$i]['expires'] = date("G:i:s T", $expire);
            $avail_formats[$i]['ipbits'] = $ipbits;
            $avail_formats[$i]['ip'] = $ip;
            $i++;
        }
        return $avail_formats;
    }

    private function curlGet($URL) {
        $ch = curl_init();
        $timeout = 3;
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $tmp = curl_exec($ch);
        curl_close($ch);
        return $tmp;
    }

    public function actionQueryYoutube() {
        if (isset($_POST) && $_POST) {
            $data = $this->YoutubeGetInfo(str_replace(' ', '', $_POST['query']));
            echo json_encode(isset($data) ? $data : false);
        }
    }

}
