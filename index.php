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
     if(isset($_POST['updateText'])){
        $value = $_POST['title'];
        $id = $_GET['updateId'];
        if($value != null){
            $contrlr->updateItemText($id,$value);
        }
    }
     if(isset($_GET['id'])){
       $id = $_GET['id'];
        if($id != null){
            $contrlr->updateItem($id);
        }
    }
    if(isset($_GET['action']) && $_GET['action'] == 'deleteCompleted'){
             $contrlr->deletedCompleted();
     }


     
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ToDoList</title>
      
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       
    </head>
    <body>
    
        <div class="container">
          
            <div class="card">
            <h2 class="text-center">ToDos</h2>
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
                       $counter = 0;
                      if(isset($_GET['action']) && $_GET['action'] == 'activeItem'){
                        $items =  $contrlr->activeItem();
                    }else if(isset($_GET['action']) && $_GET['action'] == 'completedItem'){
                        $items = $contrlr->completedItem();
                    }else{
                        $items = $contrlr->retrieveAllItem();
                    }

                    if($items){
                       
                        while($result = $items->fetch_assoc()){
                            $id = $result['id'];
                            $title = $result['title'];
                            $ckd = $result['completed'];
                            $counter++;
                        if($ckd == 'YES'){
                        ?>
                             <input type="checkbox" style="margin:10px;font-size:18px"
                       checked
                         /><span style="text-decoration:line-through;"><?php echo $title; ?></span><br>
                         <?php
                        }else{
                            ?>
                            <form action="index.php?updateId=<?php echo $id; ?>" method="POST">
                            <input type="checkbox" style="margin-left:10px;font-size:18px" onclick="userCompletedTask(<?php echo $id; ?>);"
                         /><span style=""> <input type="text" class="form-control"  style="border:none;width:500px" value="<?php echo $title; ?>" name="title">
                      
                        </span>  
                        <input type="hidden" name="updateText">
                    
                    </form>
                            
                            <?php
                        }
                         
                        }
                       
                    }else{
                        
                    }
                    ?>
                    </div>
              <div class="card-footer">
               <ul class="fMenu">
                   <li id="bt"><?php if($counter){
                       echo $counter." Items ";
                   }  ?> </li>
                   <li ><a href="?action=allItem">All</a></li>
                   <li ><a href="?action=activeItem">Active</a></li>
                   <li ><a href="?action=completedItem">Completed</a></li>
                   <li ><a href="?action=deleteCompleted">Clear completed</a></li>
               </ul>
            </div>

                  
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

//

</script>