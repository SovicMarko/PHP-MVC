<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- Custom style -->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/main-style.css">
    <!-- Vue js library -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- Axios library -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    <header class="container-fluid">
        <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo URL; ?>home">WebSiteName</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo URL; ?>home">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="<?php echo URL; ?>greska">Error</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo URL; ?>admin">Admin</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
        
      </nav>
    
    </header>

    <main class="container">