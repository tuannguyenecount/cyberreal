<?php
  session_start(); 
  require_once '../model/config.php';
  require_once '../model/SimpleImage.php';
  require_once '../model/functions.php';
  require_once '../model/connection.php';
  require_once '../model/class.database.php';

  $controller = $_GET['controller'];
  $action = $_GET['action'];
  $view_data = array();
  $view_data['errors'] = array();
  
  if(!isset($_SESSION['UserLogged']) || $_SESSION['UserLogged']['Role'] != "Biên Tập Viên" )
  {
    header("Location: ".base_url."/editorlogin");
  }

  require_once 'controller/'.$controller."controller.php";
  include_once 'view/shared/_layout.php';
  
 ?>