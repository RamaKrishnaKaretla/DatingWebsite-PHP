<?php

class Register{

    public $name;
    public $age;
    public $email;
    public $country;
    public $city;
    public $mobile;
    public $password;
    public $cPassword;
    public $gender;
    function set_password($password){
        $this->password = $password;
    }

    function get_password(){
        return $this->password;
    }
    function set_gender($gender){
        $this->gender = $gender;
    }
    function get_gender(){
        return  $this->gender;
    }
    function set_cPassword($cPassword){
        $this->cPassword = $cPassword;
    }

    function get_cPassword(){
        return $this->cPassword;
    }

    function set_name($name){
        $this->name = $name;
    }

    function get_name(){
        return $this->name;
    }

    function set_age($age){
        $this->age = $age;
    }

    function get_age(){
        return $this->age;
    }

    function set_email($email){
        $this->email = $email;
    }

    function get_email(){
        return $this->email;
    }


    function set_city($city){
        $this->city = $city;
    }

    function get_city(){
        return $this->city;
    }

    function set_country($country){
        $this->country = $country;
    }

    function get_country(){
        return $this->country;
    }

    function set_mobile($mobile){
        $this->mobile = $mobile;
    }

    function get_mobile(){
        return $this->mobile;
    }
    function insertData(){

        include "Configuration/Configuration.php";

        $conn = OpenCon();
        //echo $this->get_password();
        //$sql = "INSERT INTO Users(name,password,email,gender,age,mobile,country,city) VALUES (get_name(),'get_password()','get_email()','get_gender()','get_age()','get_mobile()','get_country()','get_City()')";

        $result=$conn->query("INSERT INTO Users(name,password,email,gender,age,mobile,country,city,status) VALUES ('".$this->get_name()."','".$this->get_password()."','".$this->get_email()."','".$this->get_gender()."','".$this->get_age()."','".$this->get_mobile()."','".$this->get_country()."','".$this->get_city()."','1')");

        CloseCon($conn);
        }

        function loginFunctionality(){

            include "Configuration/Configuration.php";

            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // username and password sent from form

                $con = OpenCon();

                $myEmail = $this->get_email();
                $myPassword = $this->get_password();
                $sql = "SELECT u_id, name FROM users WHERE email = '".$myEmail."' and password = '".$myPassword."'";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);

                $count = mysqli_num_rows($result);

                // If result matched $myEmail and $myPassword, table row must be 1 row
                if ($count == 1) {
                    $_SESSION['login_user'] = $row['name'];
                    $_SESSION['login_id'] = $row['u_id'];
                    header("Location: ../FinalProject/view/home.php");
                } else {
                    $error = "Your Login Email or Password is invalid";
                }
            }
            CloseCon($con);

        }

        function fetchAllUsersModel(){
            include "../Configuration/Configuration.php";
            //session_start();
            $con = OpenCon();

            $sql = "SELECT u_id,name,picture FROM users";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);

            if ($count) {
                return $result;
            } else {
                $error = "Your Login Email or Password is invalid";
            }
            CloseCon($con);
        }
        function fetchSingleProfileModel($single_id)
        {
            include "../Configuration/Configuration.php";
            $con = OpenCon();

            $sql = "SELECT u_id,name,picture FROM users where u_id='$single_id'";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);

            if ($count) {
                return $result;
            } else {
                $error = "Your Login Email or Password is invalid";
            }
            CloseCon($con);
        }


}

?>