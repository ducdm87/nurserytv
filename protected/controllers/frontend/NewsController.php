<?php

class NewsController extends FrontEndController {

    private $category;
    private $post;

    function init() {
        parent::init();
        // yii::import('application.models.frontend.*');
        $this->category = Category::getInstance();
        $this->post = Post::getInstance();
    }

    public function actionDisplay() {
        $data = array();
        $post_model = new Post();

        $data['posts'] = $post_model->getPosts(4, 0);

        $this->render('default', $data);
    }

    public function actionDetail() {

        $id = $_GET['id'];

        $alias = $_GET['alias'];

        $data['post'] = $this->post->getPostById($id);

        $this->setPageTitle(isset($data['post']['title']) ? $data['post']['title'] : '' . ', Xem video giả trí hay hay, clip giả trí, clip nóng mới nhất tại Nuseryty.Com');
        $this->metaDesc = isset($data['post']['metadesc']) ? $data['post']['metadesc'] : '';
        $this->metaKey = isset($data['post']['metakey']) ? $data['post']['metakey'] : '';

        $this->render('detail', $data);
    }

    private function getPostCategory($cid) {
        $post = new Post();

        return $post->getPostByCategories($cid, 4, 0);
    }

}
