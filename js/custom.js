$(document).ready(function(){

	// when add to list button clicked 
	
	 $(".add-task").click(function(){	
		var item = $(".input-task").val();
			if( item ) {
			 
                $.ajax({
                        type: 'POST',
                        url: "AjaxAction/action.php",
    					dataType: 'json',
                        data: {
                            'name': item,
                            'action':"add",
                        },
                        success: function(data) {
                           	$(".input-task").val('');
                            appendTasks(item ,data);
                        },
                    });	
    		
			}
    });
	
	// when we want to add task as done, from css i hide the <a>Mark as Done go to style file line 41, here i add class done.
	$(document).on( 'click', '.done-action', function() {
	    var id = $(this).parent().attr('id');
		$.ajax({
            type: 'POST',
            url: "AjaxAction/action.php",
			dataType: 'json',
            data: {
                'id': id,
                'action':"update",
            },
            success: function() {
               	$(this).parent().parent('li').addClass('done');
            },
        });	
                    
	  $(this).parent().parent('li').addClass('done');
	});    
	
	// when delete button clicked
	$(document).on( 'click','.delete-action', function() {
	   var id = $(this).parent().attr('id');
	   $.ajax({
                        type: 'POST',
                        url: "AjaxAction/action.php",
    					dataType: 'json',
                        data: {
                            'id': id,
                            'action':"delete",
                        },
                        success: function() {
                        
                           $(this).parent().parent('li').fadeOut();
                        },
                    });
                    

		$(this).parent().parent('li').fadeOut(); // hide the row list ( li) from front page
	});   
	
	// this fun used when the page is ready to load array items from local storage and append it to list group item. (used with .each fun) line 12
	// and used when add new task, it append new li to the list. --line 21
	function appendTasks(task,data){
		$(".todo-items").append('<li class="list-group-item border-top-0 border-right-0 border-left-0 mb-1">'+
								'<div class="float-left task-text"> '+ task +' </div>'+
								'<div class="float-right action" id = "'+data+'"><a href ="#" class="done-action">Mark as Done </a>|<a href ="#" class="delete-action"> Delete</a></div></li>');
	}
});