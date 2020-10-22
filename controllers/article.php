<?php
    class Article extends AppController {

        public $article_model;

        function __construct() { parent::__construct();
            require 'models/article_model.php';
            $this->article_model = new ArticleModel();
        }

        function index() {
            $this->view->render('article/index');
            // return $this->view->readResult;
        }

        function show($id) {
            $this->view->record = $this->article_model->readSingleRecord($id);
            $this->view->render('article/index');
        }

       
    }

?>