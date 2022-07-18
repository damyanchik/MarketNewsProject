<?php



session_start();

require_once('src/controller/AbstractController.php');
include('src/controller/DatabaseController.php');
require('src/controller/GuestController.php');
require('src/controller/UserController.php');
require('src/controller/CommentController.php');
require('src/controller/AdminController.php');
require('src/controller/ArticlesController.php');
require('src/config/db.php');
require('src/Validation.php');
require('src/View.php');
require('src/model/articlestab.php');
require('src/model/commentstab.php');
require('src/model/userstab.php');



include('src/controller/PersonController.php');

$start = new PersonController($_POST, $_GET, $db);
//$user = new UserController($db);
//$comment = new CommentController($db);
//$test = new ArticlesController($db);
//$testadmin = new AdminController($db);




