<?php
use MyApp\Data\controller;

use MyApp\Data\database;
require_once realpath("vendor/autoload.php");
$contrlr = new controller();
$db = new database();


     if(isset($_POST['submitted'])){
         $value = $_POST['todolist'];
         if($value != null){
             $contrlr->insertItem($value);
         }

     }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ToDoList</title>
      
        <link rel="stylesheet" href="style.css">
      
    </head>
    <body>
        <div class="container">
           
            <div class="card">
                   
                   <div class="Form">
                     <!-- form starts-->
                     <form action="index.php" method="POST">
                        <input type="text" id="todolist" name="todolist" placeholder="As much you want..">
                        <input type="hidden" name="submitted">
                      </form>
                       <!--form ends
                       
                      
                      -->
                      <?php
                    $items = $contrlr->retrieveAllItem();
                    if($items){
                        while($result = $items->fetch_assoc()){
                            $title = $result['title'];
                            ?>
                             <p class="checked"><input type="checkbox"
                         /><?php echo $title; ?></p>

                            <?php
                         
                        }
                    }
                      
                      ?>
                     
                   </div>
                   <div class="card-footer">
                    <ul class="fMenu">
                        <li id="all">4 Items</li>
                        <li id="all">All</li>
                        <li id="completed">Active</li>
                        <li id="clear">Completed</li>
                        <li id="target"><a href="#">Clear completed</a></li>
                    </ul>
                 </div>
            </div>
        </div>
    </body>
</html>