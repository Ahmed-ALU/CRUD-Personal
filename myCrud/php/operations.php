<?php
// Importing 
require_once ("db.php");
require_once ("buttons.php");

// Creating The database, if exists of course (check the dp.php file)
$con = Createdb();

// Actions on Clicks ----------------

// When clicking create
if(isset($_POST['create'])){
    createFunction();
}

// When clicking update
if(isset($_POST['update'])){
    updateFunction();
}

// When clicking delete
if(isset($_POST['delete'])){
    deleteFunction();
}

// The read click has been provided in the index.php 



// Functions to create/add a row in the database 
function createFunction(){
    // $con = Createdb();
    $herosupername = textboxValue("hero_supername");
    $herorealname = textboxValue("hero_realname");
    $herobio = textboxValue("hero_bio");

    if($herosupername && $herorealname && $herobio){

        $sql = "INSERT INTO xavier (hero_realname, hero_supername, hero_bio) 
                        VALUES ('$herosupername','$herorealname','$herobio')";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted...!");
        }else{
            echo "Error";
        }

    }else{
            TextNode("error", "Provide Data in the Textbox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}

// messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

//--------------------------------------------------------------

// get data from mysql database 
// used in the index.php
function getData(){
    $sql = "SELECT * FROM xavier";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

//----------------------------------------------
// Function to update a row of data
function updateFunction(){
    echo("Update works ");
    $heroid = textboxValue("hero_id");
    $herosupername = textboxValue("hero_supername");
    $herorealname = textboxValue("hero_realname");
    $herobio = textboxValue("hero_bio");

    if($herosupername && $herorealname && $herobio){
        $sql = "
                    UPDATE xavier SET hero_supername='$herosupername', hero_realname = '$herorealname', hero_bio = '$herobio' WHERE id='$heroid';                    
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Unable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }


}

//----------------------------------------------
// function to delete a row of data 
function deleteFunction(){
    $heroid = (int)textboxValue("hero_id");

    $sql = "DELETE FROM xavier WHERE id=$heroid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Enable to Delete Record...!");
    }

}

//----------------------------------------------
// set id to textbox
// used in the index.php
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}


