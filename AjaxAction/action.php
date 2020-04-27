<?php
require '../db.php'; 
$db = new Db(); 

 if($_POST["action"] == "add")  
  {  
    $name =$_POST["name"];
     $id = $db->addTask("Insert into `tasks`( `name`) values ( :name)", [
        'name' => $name,
    ]); 
    echo $id;
  } 
  if($_POST["action"] == "delete")
  {
    $id =$_POST["id"];
     $db->delete("Delete from tasks where id = :id",[
        'id' => $id
    ]);
    echo $id;
  }
  if($_POST["action"] == "update")
  {
    $id =$_POST["id"];
    
    $db->Update("Update tasks set `status` = :status where id = :id",[
        'id' => $id,
        'status' => 1
    ]);
  }
  
//echo "hello";
?>