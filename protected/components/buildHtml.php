<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class buildHtml {
    /*
     *  0           =>      1   =>   2      =>  0
     * Unpublish    =>  Publish => Hidden   =>  Unpublish
     */

    static function status($cid, $status = 0, $fldName = 'cb') {
        $title = 'Unpublish';
        $task = 'publish';
        $img_name = "publish_g.png";
        if ($status == 0) {
            $title = 'Unpublish';
            $task = 'publish';
            $img_name = "publish_x.png";
        } else if ($status == 1) {
            $title = 'Publish';
            $task = 'hidden';
            $img_name = "publish_g.png";
        } else if ($status == 2) {
            $title = 'Hidden';
            $task = 'unpublish';
            $img_name = "disabled.png";
        }

        ob_start();
        $fldName = $fldName . "$cid";
        ?>
        <span class="editlinktip hasTip"><a onclick="return listItemTask('<?php echo $fldName; ?>', '<?php echo $task; ?>')" href="javascript:void(0);">
                <img width="16" height="16" border="0" alt="<?php echo $title; ?>" src="/admin/templates/standard/assets/images/icons/<?php echo $img_name; ?>"></a></span>
        <?php
        $return = ob_get_contents();
        ob_end_clean();
        return $return;
    }

    static function choseStatus($name = "status", $value = 1, $show_default = 1) {
        ob_start();
        $id = trim(preg_replace('/[^\d\w]/ism', '_', $name), '_');
        ?>
        <select name="<?php echo $name; ?>" id="<?php echo $id; ?>">
            <?php if ($show_default == 1) { ?>
                <option <?php if ($value == -1) echo 'selected=""'; ?> value="-1"> -- Change status --</option>
            <?php } ?>
            <option <?php if ($value == 1) echo 'selected=""'; ?> value="1">Published</option>
            <option <?php if ($value == 2) echo 'selected=""'; ?> value="2">Hidden</option>
            <option <?php if ($value == 0) echo 'selected=""'; ?> value="0">Unpublished</option>
        </select>
        <?php
        $return = ob_get_contents();
        ob_end_clean();
        return $return;
    }

    static function limit($name, $current = 10) {
        $arr_limit = array(5, 10, 25, 50, 100);
        ob_start();
        $id = trim(preg_replace('/[^\d\w]/ism', '_', $name), '_');
        ?>
        <select name="<?php echo $name; ?>" id="<?php echo $id; ?>" onchange="javascript:document.adminForm.submit();">    
            <?php
            for ($i = 0; $i < count($arr_limit); $i++) {
                $value = $arr_limit[$i];
                ?>
                <option <?php if ($value == $current) echo 'selected=""'; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php
            }
            ?>
        </select>
        <?php
        $return = ob_get_contents();
        ob_end_clean();
        return $return;
    }

    static function pagination($total, $limitstart = 1, $limit = 20) {
        $pages_total = ceil($total / $limit);
        $pages_current = intval($limitstart / $limit) + 1;
        ob_start();
        ?>
        <div class="paging">
            <ul>
                <?php
                if ($pages_current != 1) {
                    $_limitstartjm = $limit * ($pages_current - 2);
                    ?>
                    <li class="pagenav-inactive">
                        <a href="?limitstart=<?php echo ("$_limitstartjm"); ?>" onclick="javascript: document.adminForm.limitstart.value =<?php echo ("$_limitstartjm"); ?>;
                                submitform();
                                return false;"> < </a
                    </li>
                    <?php
                }
                for ($j = 1; $j <= $pages_total; $j++) {
                    if ($pages_total <= 1) {
                        break;
                    }
                    if ($j > 1 && ($j < $pages_current - 3 || $j > $pages_current + 3)) {
                        continue;
                    }

                    $_limitstart = $limit * ($j - 1);
                    if ($j == $pages_current) {
                        ?>
                        <li class="pagenav-active">
                            <span><?php echo $j; ?></span>							
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="pagenav-inactive">
                            <a href="?limitstart=<?php echo ("$_limitstart"); ?>" onclick="javascript: document.adminForm.limitstart.value =<?php echo ("$_limitstart"); ?>;
                                    submitform();
                                    return false;">
                                   <?php echo $j; ?>
                            </a>
                        </li>							
                        <?php
                    }
                }
                // next button
                if ($pages_current < $pages_total) {
                    $_limitstart = $limit * ($pages_current);
                    ?>
                    <li class="pagenav-inactive">
                        <a href="?limitstart=<?php echo ("$_limitstart"); ?>" onclick="javascript: document.adminForm.limitstart.value =<?php echo ("$_limitstart"); ?>;
                                submitform();
                                return false;"> > </a>
                    </li>
                    <?php
                }
                ?>
            </ul>            
        </div>
        <?php
        echo "<div style='display: inline-table;'>Total: $total item. Page $pages_current of $pages_total. </div>";
        $return = ob_get_contents();
        ob_end_clean();
        return $return;
    }

    static function headSort($title, $order, $order_current, $order_dir) {
        $imgsort = 'sort_desc';
        if (strtolower($order_dir) == 'asc') {
            $order_dir = 'desc';
            $imgsort = 'sort_asc';
        } else {
            $order_dir = 'asc';
            $imgsort = 'sort_desc';
        }

        ob_start();
        ?>
        <a title="Click to sort by this column" href="javascript:tableOrdering('<?php echo $order; ?>','<?php echo $order_dir; ?>','');">
            <?php echo $title; ?>                
            <?php
            if ($order == $order_current)
                echo '<img alt="" src="/admin/templates/standard/assets/images/' . $imgsort . '.png"></a>';
            $return = ob_get_contents();
            ob_end_clean();
            return $return;
        }

        static function select($items, $seleted = 0, $name, $id = "", $attr = " size=1 ", $text_level1 = "", $text_level2 = "") {
            if (!is_array($items))
                return "";
            if (count($items) <= 0)
                return "";

            $html = "<select name='$name' id='$id' $attr >";
            foreach ($items as $item) {
                $item = (object) $item;
                if ($text_level1 != "" and $item->level > 0) {
                    $item->text = str_repeat($text_level1, $item->level) . $text_level2 . ucfirst($item->text);
                }
                if ($item->value == $seleted)
                    $html .= "<option value='$item->value' selected='true'>$item->text</option>";
                else
                    $html .= "<option value='$item->value'>$item->text</option>";
            }
            $html .= "</select>";
            return $html;
        }

        public static function changState($cid, $value = 0, $prefix = "archive.", $title_prefix = "day", $fldName = 'cb') {

            $title = 'Toggle to change ' . $title_prefix . ' to on ';
            $task = $prefix . "on";
            $img_name = "publish_g.png";
            if ($value == 0) {
                $title = 'Toggle to change ' . $title_prefix . ' to on ';
                $task = $prefix . "on";
                $img_name = "publish_x.png";
            } else if ($value == 1) {
                $title = 'Toggle to change ' . $title_prefix . ' to off ';
                $task = $prefix . "off";
                $img_name = "publish_g.png";
            }
            ob_start();
            $fldName = $fldName . "$cid";
            ?>
            <span class="editlinktip hasTip"><a onclick="return listItemTask('<?php echo $fldName; ?>', '<?php echo $task; ?>')" href="javascript:void(0);">
                    <img width="16" height="16" border="0" alt="<?php echo $title; ?>" src="/admin/templates/standard/assets/images/icons/<?php echo $img_name; ?>"></a></span>
            <?php
            $return = ob_get_contents();
            ob_end_clean();
            return $return;
        }

        static function renderField($type = "text", $name, $value = "", $title, $class = null, $placeholder = "", $w1 = 2, $w2 = 10, $width = "100%", $height = "400px") {
            if ($class == null)
                $class = "form-control";
            $html = '<div class="form-group row">';
            $html .= '<label class="control-label left col-md-' . $w1 . '">' . $title . '</label>';
            $html .= '<div class="col-md-' . $w2 . '">';
            if ($type == "text")
                $html .= '<input placeholder="' . $placeholder . '" type="text" name="' . $name . '" class="' . $class . '" value="' . $value . '">';
            else if ($type == "textarea")
                $html .= '<textarea rows="3" style="width: 100%;" name="' . $name . '" class="' . $class . '">' . $value . '</textarea>';
            else if ($type == "editor")
                $html .= buildHtml::editors($name, $value, $width, $height);
            else if ($type == "label")
                $html .= $value;
            else if ($type == "calander")
                $html .= '<input placeholder="' . $placeholder . '" type="text" name="' . $name . '" class="' . $class . ' datepicker" value="' . $value . '">';
            $html .= '</div>';
            $html .= '</div>';


            return $html;
        }

        static function editors($name, $value, $width = "100%", $height = "500px") {
            $base_url = Yii::app()->getBaseUrl(true);

            require_once(ROOT_PATH . 'editors/ckeditor/ckeditor.php');

            $config = array();
            $config['toolbar'] = array(
                array("name" => 'document', "items" => array('Source', '-', 'Bold', 'Italic', 'Underline', 'Strike', "Subscript", "Superscript", "RemoveFormat")),
                array("name" => 'clipboard', "items" => array('Cut', "Copy", 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo')),
                array("name" => 'editing', "items" => array("Find", "Replace", "SelectAll", "Scayt")),
                array("name" => 'paragraph', "items" => array('NumberedList', 'BulletedList', 'Outdent', 'Indent', "Blockquote", "CreateDiv", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyBlock")),
                array("name" => 'insert', "items" => array('Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe')),
                array("name" => 'links', "items" => array('Link', 'Unlink', 'Anchor')),
                array("name" => 'styles', "items" => array('Styles', 'Format', 'Font', 'FontSize', '-', 'TextColor', 'BGColor')),
                array("name" => 'tools', "items" => array('Maximize', '-', 'About')),
            );

            $config['height'] = $height;
            $config['returnOutput'] = true;
            //$events['instanceReady'] = 'function (ev) { }';
            $CKEditor = new CKEditor("$base_url/editors/ckeditor/");
            $CKEditor->returnOutput = true;
            $out = $CKEditor->editor($name, $value, $config, $events = null);

            return $out;
        }

        public static function TruncateText($text, $max_len = 30) {
            $len = mb_strlen($text, 'UTF-8');
            if ($len <= $max_len)
                return $text;
            else
                return mb_substr($text, 0, $max_len - 1, 'UTF-8') . '...';
        }
        
        
         public static function showPlaylist($pid = false, $vid = false) {
                global $mainframe, $db;

                if (isset($pid) && $pid) {
                    $data_play = "SELECT * FROM {{playlist}} WHERE id=$pid AND status = 1";
                    $query_command = $db->createCommand($data_play);
                    $items = $query_command->queryRow();
                    $data = array();
                    if ($items) {
                        $query = "SELECT * FROM {{videos}} WHERE play_id=$pid AND status = 1";
                        $command = $db->createCommand($query);
                        $items['playlists'] = $command->queryAll();
                    }
                }
                ?>
                <?php if (isset($items['playlists']) && $items['playlists']): ?>
                    <div class="col-md-4 no-padding">
                        <div class="detail-video" id="scollbar">
                            <div class="detail-title">
                                <h4>
                                    <?php echo $items['name'] ?> <?php echo count($items['playlists']) ?> Video
                                </h4>
                            </div>
                            <div id="box" class="box">
                                <?php foreach ($items['playlists'] as $playlist): ?>
                                    <div class="entry-recomment-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="<?php echo Yii::app()->baseUrl . '/xem-video?pid=' . $items['id'] . '&pslug=' . $items['alias'] . '&vid=' . $playlist['id'] . '&vslug=' . $playlist['alias']; ?>">
                                                    <img class="media-object" src="<?php echo $playlist['image'] ?>" alt="<?php echo $playlist['title'] ?>" width="150" height="80">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><?php echo $playlist['title'] ?></h4>
                                                <div class="entry-recomment-user hidden-lg hidden-md">
                                                    <span class="entry-viewed">
                                                        <span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/eye.png"><?php echo isset($video['viewed']) ? $video['viewed'] : 0 ?></span>
                                                    </span>
                                                    <span class="entry-like">
                                                        <span><i class="fa fa-heart"></i> <?php echo isset($video['liked']) ? $video['liked'] : 0 ?></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
            }

        public static function showSubmenu() {
            global $mainframe, $db;

            $query = "SELECT * FROM {{playlist}} WHERE status = 1 AND active=1";
            $query_command = $db->createCommand($query);
            $playlists = $query_command->queryAll();
            ?>
                <?php if (isset($playlists) && $playlists): ?>
                <ul class="dropdown-menu">
                    <?php foreach ($playlists as $menu): ?>
                        <li><a href="<?php echo Yii::app()->baseUrl . '/playlist?pid=' . $menu['id'], '&pslug=' . $menu['alias'] ?>"><?php echo $menu['name'] ?></a></li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php
        }

        public static function SlideShow() {

            $useragent = $_SERVER['HTTP_USER_AGENT'];

            if (!preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
                global $mainframe, $db;


                $query = "SELECT * FROM {{videos}} WHERE status = 1"
                        . " ORDER BY viewed ASC LIMIT 12 ";
                $query_command = $db->createCommand($query);
                $items = $query_command->queryAll();
                if (isset($items) && $items):
                    ?>

                    <div class="vega-feature hidden-xs hidden-sm">
                        <h2 class="vega_title">
                            <span>Video Nổi Bật</span>
                        </h2>
                        <div class="veg-box">
                            <div id="feature-carousel" class="carousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <?php
                                    $numb = 1;
                                    $flag = 1;
                                    ?>
                                    <?php foreach ($items as $item): ?>
                                        <?php if ($numb == 1): ?>
                                            <?php if ($flag == 1): ?>
                                                <div class="active item">
                                                <?php else: ?>
                                                    <div class="item">
                                                    <?php endif; ?>
                                                    <div class="col-md-3"><a href="<?php echo Yii::app()->baseUrl . '/xem-video?pid=' . $item['play_id'] . '&pslug=&vid=' . $item['id'] . '&vslug=' . $item['alias'] ?>"><img src="<?php echo $item['image'] ?>" alt="Image" class="img-responsive"></a>
                                                        <h4>
                                                            <a href="<?php echo Yii::app()->baseUrl . '/xem-video?pid=' . $item['play_id'] . '&pslug=&vid=' . $item['id'] . '&vslug=' . $item['alias'] ?>"><?php echo $item['title'] ?></a>
                                                        </h4>
                                                    </div>
                                                <?php elseif ($numb == 4): ?>
                                                    <div class="col-md-3"><a href="<?php echo Yii::app()->baseUrl . '/playlist/detail?pid=' . $item['play_id'] . '&pslug=&vid=' . $item['id'] . '&vslug=' . $item['alias'] ?>"><img src="<?php echo $item['image'] ?>" alt="Image" class="img-responsive"></a>
                                                        <h4>
                                                            <a href="<?php echo Yii::app()->baseUrl . '/xem-video?pid=' . $item['play_id'] . '&pslug=&vid=' . $item['id'] . '&vslug=' . $item['alias'] ?>"><?php echo $item['title'] ?></a>
                                                        </h4>
                                                    </div>
                                                    <?php $numb = 0; ?>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-md-3"><a href="<?php echo Yii::app()->baseUrl . '/xem-video?pid=' . $item['play_id'] . '&pslug=&vid=' . $item['id'] . '&vslug=' . $item['alias'] ?>"><img src="<?php echo $item['image'] ?>" alt="Image" class="img-responsive"></a>
                                                    <h4>
                                                        <a href="<?php echo Yii::app()->baseUrl . '/xem-video?pid=' . $item['play_id'] . '&pslug=&vid=' . $item['id'] . '&vslug=' . $item['alias'] ?>"><?php echo $item['title'] ?></a>
                                                    </h4>
                                                </div>
                                            <?php endif; ?>
                                            <?php $numb++; ?>
                                            <?php $flag++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <!--/carousel-inner--> 
                                    <a class="left carousel-control" href="#feature-carousel" data-slide="prev"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/arrow_left.png"></a>

                                    <a class="right carousel-control" href="#feature-carousel" data-slide="next"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/arrow_r.png"></a>
                                </div>
                            </div>
                        </div>

                        <?php
                    endif;
                }
            }

            public static function showPost() {
                global $mainframe, $db;


                $query = "SELECT * FROM {{articles}} WHERE status = 1"
                        . " ORDER BY cdate DESC LIMIT 4 ";
                $query_command = $db->createCommand($query);
                $items = $query_command->queryAll();
                ?>
                <?php if (isset($items) && $items): ?>
                    <div class="vega-feature top-20">
                        <h2 class="vega_title">
                            <span>Tin Tức Giả trí</span>
                        </h2>
                        <div class="veg-box">
                            <div class="news-items" style="overflow: hidden; height: 250px;">
            <?php foreach ($items as $item): 
                    $link = fnCreateUrlNewsDetail($item['id'],$item['alias']);
                ?>
                                    <div class="col-md-3 no-padding">
                                        <div class="thumbnail">
                                            <a href="<?php echo $link; ?>">
                                                <img style="height: 190px; width: 80%;"  src="<?php echo $item['thumbnail'] ?>" alt=""/>
                                            </a>
                                            <div class="caption">
                                                <p>
                                                    <a href="<?php echo $link; ?>"><?php echo $item['title'] ?></a>    
                                                </p>
                                            </div>
                                        </div>

                                    </div>
            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
        <?php endif; ?>
                <?php
            }

            public static function showSideBar() {
                global $mainframe, $db;

                $query = "SELECT * FROM {{videos}} WHERE status = 1"
                        . " ORDER BY viewed DESC LIMIT 3 ";
                $query_command = $db->createCommand($query);
                $video_hots = $query_command->queryAll();
                ?>
                <div class="col-md-4 no-padding-right sidebar padding-mb-2">
                    <div class="row-fuild">
                        <?php if (isset($video_hots) && $video_hots): ?>
                            <div class="entry-container">
                                <div class="entry-title">
                                    <div class="entry-title-text">
                                        <span>Video Hot</span>
                                    </div>
                                </div>
                                <div class="entry-content hot-video">
                                    <div class="" style="position: relative">
                                        <?php $index = 0; ?>
                                        <?php foreach ($video_hots as $video): ?>
                                            <?php if ($index == 0): ?>   
                                                <?php
                                                if (isset($video['origin_link']) && $video['origin_link']) {

                                                    $urlQ = parse_url($video['fecth_link'], PHP_URL_QUERY);
                                                    parse_str($urlQ, $query);
                                                }
                                                if (isset($video['origin_link']) && $video['origin_link']) {
                                                    $origin_link = isset($video['origin_link']) ? $video['origin_link'] : '';
                                                }
                                                ?>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <img src="<?php echo $video['image']; ?>" class="img-responsive"/>
                                                    <div class="icon-play" rel="<?php echo isset($query['v']) ? $query['v'] : '' ?>" data-link="<?php echo isset($origin_link) ? $origin_link : '' ?>"></div>
                                                    <div class="ytplayer"></div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="caption entry-recomment-item" style="margin-top: 30px;">
                                                <a href="<?php echo Yii::app()->baseUrl . '/xem-video?pid=' . $video['play_id'] . '&pslug=&vid=' . $video['id'] . '&vslug=' . $video['alias'] ?>"><h4><?php echo $video['title'] ?></h4></a>
                                            </div>
                                            <div class="entry-recomment-user" style="margin-left: 40px;">
                                                <span class="entry-viewed">
                                                    <span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/eye.png"><?php echo isset($video['viewed']) ? $video['viewed'] : 0 ?></span>
                                                </span>
                                                <span class="entry-like">
                                                    <span><i class="fa fa-heart"></i> <?php echo isset($video['liked']) ? $video['liked'] : 0 ?></span>
                                                </span>
                                            </div>
                                            <?php $index ++; ?>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                        <?php
                        $query2 = "SELECT * FROM {{videos}} WHERE status = 1"
                                . " ORDER BY cdate DESC LIMIT 1 ";
                        $query_command2 = $db->createCommand($query2);
                        $video_new = $query_command2->queryAll();
                        ?>
                        <?php if (isset($video_new) && $video_new): ?>
                            <div class="entry-container">
                                <div class="entry-title">
                                    <div class="entry-title-text">
                                        <span>Video Mới</span>
                                    </div>
                                </div>
                                <div class="entry-content" style="position: relative;">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <?php
                                        if (isset($video_new[0]['fecth_link']) && $video_new[0]['fecth_link']) {
                                            $urlQ = parse_url($video_new[0]['fecth_link'], PHP_URL_QUERY);
                                            parse_str($urlQ, $query);
                                        }
                                        if (isset($video_new[0]['origin_link']) && $video_new[0]['origin_link']) {
                                            $origin_link = isset($video_new[0]['origin_link']) ? $video_new[0]['origin_link'] : '';
                                        }
                                        ?>
                                    <!--<a href="<?php echo Yii::app()->baseUrl . '/xem-video?pid=' . $video_new[0]['play_id'] . '&pslug=&vid=' . $video_new[0]['id'] . '&vslug=' . $video_new[0]['alias']; ?>"  class="thumb">-->
                                        <img src="<?php echo $video_new[0]['image']; ?>" class="img-responsive"/>
                                        <div class="icon-play"   rel="<?php echo isset($query['v']) ? $query['v'] : '' ?>" data-link="<?php echo isset($origin_link) ? $origin_link : '' ?>"></div>
                                        <div class="ytplayer"></div>
                                        <!--</a>-->
                                        <div class="caption entry-recomment-item" style="margin-top: 15px;">
                                            <a href="<?php echo Yii::app()->baseUrl . '/xem-video?pid=' . $video['play_id'] . '&pslug=&vid=' . $video['id'] . '&vslug=' . $video['alias']; ?>"><h4><?php echo $video['title'] ?></h4></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            }
}
        