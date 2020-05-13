<?php

    function OpenCon()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $data = "dating";

        //create connection
        $conn = new mysqli($servername, $username, $password, $data) or die("Connect Failed: %s\n" . $conn->error);
        return $conn;
    }

    function CloseCon($conn)
    {
        $conn->close();
    }

?>

