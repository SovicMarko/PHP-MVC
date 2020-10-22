<?php
    class Err extends AppController {
        
        function __construct() {
            parent::__construct();
            
            

        }
        function index()
        {
            $this->view->render('error/index');
        }

    }

?>