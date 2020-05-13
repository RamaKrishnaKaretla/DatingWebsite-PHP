<?php

include "Model/Register.php";

class RegController
{
    function registering()  //register function
    {
        $register = new Register();

        $register->set_name($_POST["name"]);
        $register->set_age($_POST["age"]);
        $register->set_gender($_POST["gender"]);
        $register->set_email($_POST["email"]);
        $_password = $register->set_password($_POST["Password"]);
        $_cPassword = $register->set_cPassword($_POST["confirmPassword"]);
        $register->set_mobile($_POST["mobile"]);
        $register->set_country($_POST["country"]);
        $register->set_city($_POST["city"]);

        if($_password == $_cPassword)
        {
            $register->insertData();
            require 'view/login/index.php';
            //header("view/login/index.php?data=".$msg);
        }
        else
        {
            $msg = "Password does not match.";
            return $msg;
        }
        echo "Your details are successfully saved";
    }

    function loginController(){ //login function
        $loginObj = new Register;

        $loginObj->set_email($_POST["email"]);
        $loginObj->set_password($_POST["password"]);

        $loginObj->loginFunctionality();
    }

    function logout(){  //logout function
        session_start();
        session_destroy();
        header("Location:view/index.php");
    }

    function fetchAllUsers(){
        $fetchAllUsers= new Register;
        $fetchAllUsers->fetchAllUsersModel();

        //header("Location:View/home.php");
    }


}

?>