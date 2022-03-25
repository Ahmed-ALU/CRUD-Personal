<!-- This php File is the first file we created,
In general it contains the HTML structrue for our page, we used some help from j-query and some ready codes from
Bootstrap to focus on the CRUD Operations -->

<!-- #Part N.01 -->
<?php
// Here we imported (one time) the php files that contains the codes of creating the main CRUD components like the 
// buttons and the input fields, doing that using php helped us in the part of integration and calling it in other files
// in addition it is somehow an automation for creating them. 
require_once ("php/buttons.php");
require_once("php/operations.php");
?>

<!-- Html Starts HERE -->
<!DOCTYPE html>
<html lang="en">
    <!-- --------------------------------------------------------- -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Heros</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"> 
    </head>
    <!-- --------------------------------------------------------- -->
    <!-- --------------------------------------------------------- -->
    <body>
        <section class="main">
        <div class="containerTop">
            <div class="title">
                <h1>Welcome Mr. <img src="Images/logox.png" alt="" class="x">avier</h1>
            </div>
            <div class="subtitle">
                <h2 class="2ndtitle">The HEROS are waiting for your command</h2>
            </div>
        </div>

        <div class="containerBottom">
            <!-- The collection of the buttons, textboxes and table has been put in a form to make it able to accept the operations -->
            <form action="" method="post" class="w-50"> <!-- We are using the POST php method for the operations -->
                <div class="subContainer01" style="display: flex; flex-direction: row; ">
                    
                    <!-- This container contains objects from the php function that makes the input fields -->

                    <div class="pt-3">
                        <?php inputField("<img src='Images/id.png' class ='inputImage' style ='max-width: 20px; min-height: 23px;'>" ,"Hero ID", "hero_id",setID()); ?>  
                        <!-- The set Id here is a function that works Automatically on proviing the id of the hero in the textbox from the database-->
                    </div>
                    <div class="pt-3">
                        <?php inputField("<img src='Images/heroMask.png' class ='inputImage' style ='max-width: 20px;'>","Hero SuperName", "hero_supername",""); ?>
                    </div>
                    
                    <div class="pt-3">
                        <?php inputField("<img src='Images/heroNoMask.png' class ='inputImage' style ='max-width: 20px;'>","Hero Real Name", "hero_realname",""); ?>
                    </div>
                    <div class="pt-3">
                        <?php inputField("<img src='Images/Bio.png' class ='inputImage' style ='max-width: 20px;'>","Bio", "hero_bio",""); ?>
                    </div>
                    
                </div>

                <!-- This container contains objects from the php function that makes the Buttons -->
            <div class="Buttons">
                <?php buttonTag("btn-create","btn btn-success","Create","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                <?php buttonTag("btn-read","btn btn-primary","Read","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                <?php buttonTag("btn-update","btn btn-light border","Update","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                <?php buttonTag("btn-delete","btn btn-danger","Delete","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                
            </div>

            <!-- Table starts from here -->

            <div class="tableDivC">

                <div class="d-flex table-data" id="tableDiv">
                    <table class="table table-striped table-dark" style ="margine: 1em 10em;">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>SuperName</th>
                                <th>RealName</th>
                                <th>Bio</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php

                            // if the user presses on the read button, it will put the data
                            // on an array, loop on it, then put it in the text boxs
                            if(isset($_POST['read'])){ //this function is imported from the operations file
                                $result = getData();

                                if($result){
                                    
                                    //The following method is helping on getting a sql object 
                                    while ($row = mysqli_fetch_assoc($result)){ ?> 

                                        <tr>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['hero_supername']; ?></td>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['hero_realname']; ?></td>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['hero_bio']; ?></td>
                                            <td ><a class="btnedit" data-id= "<?php echo $row['id']; ?>"><img class="btnedit2" data-id="<?php echo $row['id']; ?>" src="Images/edit.png"></a></td>
                                        </tr>
                            <?php
                                    }

                                }
                            }


                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="php/script.js"></script> <!-- The Javascript file -->
    </body>
    <!-- --------------------------------------------------------- -->
</html>