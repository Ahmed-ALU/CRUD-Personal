<?php

function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "xheros";

    // create connection
    $con = mysqli_connect($servername, $username, $password);

    // Check Connection
    if (!$con){
        die("Connection Failed, Sorry : " . mysqli_connect_error());
    }

    // create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "
                        CREATE TABLE IF NOT EXISTS xavier(
                            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            hero_realname VARCHAR (25) ,
                            hero_supername VARCHAR (20),
                            hero_bio VARCHAR (20)
                        );
        ";
        // echo "Database Created..";

        if(mysqli_query($con, $sql)){
            // echo "Database Created...";
            return $con;
        }else{
            echo "Cannot Create table, Please check your connection to the database...!";
        }

    }else{
        echo "Error while creating the mentioned database ". mysqli_error($con);
    }

}
