<?php
    class Admin extends AppController {

        public $article_model;
        public $cathegory_model;
        
        function __construct() { parent::__construct(); 
            require 'models/article_model.php';
            require 'models/cathegory_model.php';
            $this->article_model = new ArticleModel();
            $this->cathegory_model = new CathegoryModel();
        }

        function index() {

            $this->view->readResult = $this->article_model->readCompleteRecords();
            $this->view->cathegoryNum = $this->cathegory_model->readRecords();

            $this->view->render('admin/index');
        }

        function insert() { 
            $this->view->subCathegoryList = $this->cathegory_model->readRecordsAndSubCathegories();
            $this->view->render('admin/insert'); 
        }

        function cathegory() {
            $this->view->cathegoryList = $this->cathegory_model->readRecordsAndSubCathegories();
            $this->view->render('admin/cathegory'); 
        }

        function insertRecord() { $this->article_model->insertRecord(); }

        function insertCathegory() { $this->cathegory_model->insertRecord(); }

        function insertSubCathegory($id) {$this->cathegory_model->insertSubCathegory($id); }

        function removeRecord($id) { $this->article_model->removeRecord($id); }

        function removeCathegory($id) { $this->cathegory_model->removeRecord($id); }

        function removeSubCathegory($id) { $this->cathegory_model->removeSubCathegory($id); }

        function changeRecord($id) {
            $result = $this->article_model->readSingleRecord($id);
            $this->view->izmena = true;
            $this->view->id = $result['sifra']; 
            $this->view->naziv = $result['naziv'];
            $this->view->cena = $result['cena'];
            $this->view->opis = $result['opis'];
            $this->view->kategorija = $result['sifra_podkategorije'];
            $this->view->subCathegoryList = $this->cathegory_model->readRecordsAndSubCathegories();
            $this->view->render('admin/insert');
        }

        function updateRecord($id) { $this->article_model->updateRecord($id); }

    }

?>