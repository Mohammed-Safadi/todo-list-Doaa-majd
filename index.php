<!DOCTYPE html>
<html lang="en">
<head>
<title>My To-do's List</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Unicat project">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
require 'db.php'; 
$db = new Db(); 
?>
	<div class="container">
		<div class="row todo">
			<div class="col">
			
			<div class="title mb-5"><h1>My To-do's List -</h1></div>
			
			<div class="row no-gutters mb-4">
				<div class="col-3 mr-2"><input type="text" class="form-control input-task" placeholder="New Task..."></div>
				<div class="col-2"><button type="button" class="btn btn-primary add-task">Add To List</button></div>
			</div>
			
			<div class="row">
				<div class="col">
					<ul class="list-group todo-items">
                    
                    <?php 
                        $result= $db->getAllRecords();
                           foreach($result as $row)
                           {
                    ?>
                    <li class="list-group-item border-top-0 border-right-0 border-left-0 mb-1 <?php if($row['status'] == 1) { echo 'done'; } ?>">
					   <div class="float-left task-text"> <?php echo $row['name'] ;?> </div>
					   <div class="float-right action" id="<?php echo $row['id'] ;?>">
                         <a href ="#" class="done-action">Mark as Done </a>|<a href ="#" class="delete-action"> Delete</a>
                       </div>
                    </li>
                    <?php        
                           }
                    ?>
					<!--	<li class="list-group-item border-top-0 border-right-0 border-left-0 mb-1">
							<div class="float-left"> Learn HTML </div>
							<div class="float-right action"><a href ="#" class="done">Mark as Done </a>|<a href ="#" class="delete"> Delete</a></div>
						</li>
						
						<li class="list-group-item border-top-0 border-right-0 border-left-0 mb-1">
							<div class="float-left"> Learn CSS </div>
							<div class="float-right action"><a href ="#" class="done">Mark as Done </a>|<a href ="#" class="delete"> Delete</a></div>
						</li>
						<li class="list-group-item border-top-0 border-right-0 border-left-0 mb-1">
							<div class="float-left"> Learn JavaScript </div>
							<div class="float-right action"><a href ="#" class="done">Mark as Done </a>|<a href ="#" class="delete"> Delete</a></div>
						</li>
						<li class="list-group-item border-top-0 border-right-0 border-left-0 mb-1">
							<div class="float-left"> Learn PHP </div>
							<div class="float-right action"><a href ="#" class="done"> Mark as Done </a>|<a href ="#" class="delete"> Delete</a></div>
						</li> -->
					</ul>
				</div>
			</div>
			
			
			</div>
							
		</div>

	</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>