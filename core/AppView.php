<?php

class AppView {
    function __construct() {}

    public function render($viewName)
    {
        require_once 'views/components/header.php';
        require 'views/'.$viewName.'.php';
        require_once 'views/components/footer.php';
    }
}

?>