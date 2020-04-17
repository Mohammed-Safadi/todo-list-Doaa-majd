$(document).ready(function(){

	// load the defalut list item from local storage		
	if (localStorage['toDoItem']) {
		var toDoItem = JSON.parse(localStorage['toDoItem']);
	}else {
		var toDoItem = ['Learn HTML','Learn CSS','Learn JavaScript','Learn PHP'];
	}
	
	$.each(toDoItem , function(index, val) { 
		appendTasks(val);
	});
	
	// when add to list button clicked 
	
	 $(".add-task").click(function(){	
		var item = $(".input-task").val();
			if( item ) {

			appendTasks(item);
			
			toDoItem.push(item);
			localStorage["toDoItem"] = JSON.stringify(toDoItem);
			$(".input-task").val('');
			}
    });
	
	// when we want to add task as done, from css i hide the <a>Mark as Done go to style file line 41, here i add class done.
	$(document).on( 'click', '.done-action', function() {
		console.log("hello");
	  $(this).parent().parent('li').addClass('done');
	});    
	
	// when delete button clicked
	$(document).on( 'click','.delete-action', function() {
	  
		var valOfTask = $(this).closest('.list-group-item').find('.task-text').html().trim(); //get the task value ex.Learn HTML
		var index = toDoItem.indexOf(valOfTask);   // get the index of the value return 
         if (index !== -1) toDoItem.splice(index, 1);  // if index is not -1 delete from array 
		localStorage["toDoItem"] = JSON.stringify(toDoItem);  // save the new array to local storage
		$(this).parent().parent('li').fadeOut(); // hide the row list ( li) from front page
	});   
	
	// this fun used when the page is ready to load array items from local storage and append it to list group item. (used with .each fun) line 12
	// and used when add new task, it append new li to the list. --line 21
	function appendTasks(task){
		$(".todo-items").append('<li class="list-group-item border-top-0 border-right-0 border-left-0 mb-1">'+
								'<div class="float-left task-text"> '+ task +' </div>'+
								'<div class="float-right action"><a href ="#" class="done-action">Mark as Done </a>|<a href ="#" class="delete-action"> Delete</a></div></li>');
	}
});