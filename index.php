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
     if(isset($_GET['id'])){
       $id = $_GET['id'];

        if($id != null){
            $contrlr->updateItem($id);
        }

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ToDoList</title>
      
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       
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
</div>
<div>
                      <?php





                    $items = $contrlr->retrieveAllItem();
                    if($items){
                        while($result = $items->fetch_assoc()){
                            $id = $result['id'];
                            $title = $result['title'];
                            $ckd = $result['completed'];
                            ?>
                          
                            <p <?php
                        if($ckd == 'YES'){
                            echo 'style="text-decoration: line-through;color:#555;"';
                        }
                        ?> ><input type="checkbox" style="margin:10px;font-size:18px" onclick="userCompletedTask(<?php echo $id; ?>);"
                        <?php
                        if($ckd == 'YES'){
                            echo 'checked';
                        }
                        ?>
                         /><?php echo $title; ?></p>
                          
                            
                            <?php
                         
                        }
                        ?>
                         </div>
                   <div class="card-footer">
                    <ul class="fMenu">
                        <li id="bt">4 Items</li>
                        <li id="all">All</li>
                        <li id="completed">Active</li>
                        <li id="clear">Completed</li>
                        <li id="target"><a href="#">Clear completed</a></li>
                    </ul>
                 </div>

                        <?php
                    }else{

                    }
                      
                      ?>
                  
            </div>
        </div>
    </body>
</html>
<script>
function userCompletedTask(id) {
var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET","index.php?id="+id,true);
xmlhttp.send();
}
</script>