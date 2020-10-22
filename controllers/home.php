<?php
    class Home extends AppController {

        public $article_model;
        public $cathegory_model;

        function __construct() { parent::__construct();
            require 'models/article_model.php';
            require 'models/cathegory_model.php';
            $this->article_model = new ArticleModel();
            $this->cathegory_model = new CathegoryModel();
        }

        function index() {
            $this->view->readResult = $this->article_model->readRecords();
            $this->view->cathegoryList = $this->cathegory_model->readRecordsAndSubCathegories();
            $this->view->render('home/index');
            return $this->view->readResult;
        }

        function getData(){
            $result = $this->article_model->readRecords();
            $rows = array();
            while($r = $result->fetch_assoc()) {
                $rows[] = $r;
            }
            print json_encode($rows);
            // echo json_encode($this->article_model->readRecords());
        }

        public function other($name = '') {
            echo "Ovo je funkcija kontrolora, dobrodosli ".$name;
        }
    }

?>