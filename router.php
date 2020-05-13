<?php

session_start();
if (isset($_SESSION['login_user'])){

    require 'Controller/RegisterController.php';
    require 'Controller/FavouriteController.php';

    $action = $_GET["action"];
    switch ($action) {
        case "favList":
            $login_id = $_GET['login_id'];
            $fav_id = $_GET['fav_id'];
            favList($login_id, $fav_id);
            break;
        case "delFav":
            $login_id = $_SESSION['login_id'];
            $delFavId = $_GET['del_favid'];
            $favModel = new FavouriteBean;
            $favModel->delFavId($login_id, $delFavId);
            break;
        case "RegisterController":
            $RegController = new RegController;
            $RegController->registering();
            break;
        case "LoginController":
            $RegController = new RegController;
            $RegController->loginController();
            break;
        case "Logout":
            $RegController = new RegController;
            $RegController->logout();
            break;
        case "Users":
            echo "users";
            //$RegController = new RegController;
            //$RegController->fetchAllUsers();
            break;
        default:
            header('Location: view/index.php');
    }
}else{
    require 'Controller/RegisterController.php';
    //require 'Controller/FavouriteController.php';

    $action = $_GET["action"];
    switch ($action) {
        case "RegisterController":
            $RegController = new RegController;
            $RegController->registering();
            break;
        case "LoginController":
            $RegController = new RegController;
            $RegController->loginController();
            break;
        case "Logout":
            $RegController = new RegController;
            $RegController->logout();
            break;
        case "Users":
            echo "users";
            //$RegController = new RegController;
            //$RegController->fetchAllUsers();
            break;
        default:
            //header('Location: view/index.php');
    }
}