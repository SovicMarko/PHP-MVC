<?php
    class Login extends AppController {
        
        function __construct() {
            parent::__construct();
            
            

        }

        function index() {
            $this->view->render('login/index');
        }


    }

?>