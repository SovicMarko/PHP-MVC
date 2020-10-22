<?php
    class Help extends AppController {
        
        function __construct() {
            parent::__construct();
            // echo "Help contorller";
            
        }

        public function other($name = '') {
            echo "Ovo je funkcija kontrolora, dobrodosli ".$name;

            require_once 'models/help_model.php';

            $model = new Help_Model();
        }

    }

?>