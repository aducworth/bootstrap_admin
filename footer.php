	</div><!--content--> 
				
	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/validate.js"></script>
    
    <script type="text/javascript">
		$(document).ready(function(){
			$("#data-form").validate({
			  rules: {
				password_confirm: {
				  equalTo: "#password-id"
				},
				checkbox: { 
					required: 'input[type="checkbox"]:checked'
				}
			  }
			});
			
			$('#name-id').change(function() {
				
		      var name = $(this).val();
			  
			  var formatted_name = name.replace(/\./g,'').replace(/,/g,'').replace(/,/g,'-').replace(/"/g,'').replace(/'/g,'').replace(/ /g,'-').replace(/&/g,'and').replace(/!/g,'').replace(/\$/g,'').replace(/\*/g,'').replace(/\//g,'').replace(/@/g,'').replace(/\(/g,'').replace(/\)/g,'').replace(/\[/g,'').replace(/\]/g,'').replace(/%/g,'').replace(/#/g,'');
			  
			  if( $('#practice_name-id').val() == '' ) {
				  
				  $('#practice_name-id').val( name );
				  
			  }
			  
			  if( $('#tag-id').val() == '' ) {
				  
				  $('#tag-id').val( formatted_name.toLowerCase() );
				  
			  }
			  
			});
			
			$('.update-tag').change(function() {
				
			  if( $('#fname-id').val() == '' || $('#lname-id').val() == '' ) {
				  
				  return;
			  }
			  
		      var name = $('#fname-id').val() + '-' + $('#lname-id').val();
			  
			  var formatted_name = name.replace(/\./g,'').replace(/,/g,'').replace(/,/g,'-').replace(/"/g,'').replace(/'/g,'').replace(/ /g,'-').replace(/&/g,'and').replace(/!/g,'').replace(/\$/g,'').replace(/\*/g,'').replace(/\//g,'').replace(/@/g,'').replace(/\(/g,'').replace(/\)/g,'').replace(/\[/g,'').replace(/\]/g,'').replace(/%/g,'').replace(/#/g,'');
			  
			  if( $('#url-id').val() == '' ) {
				  
				  $('#url-id').val( formatted_name.toLowerCase() );
				  
			  }
			  
			});
			
			$('.update-display-order').change(function() {
				
				$.ajax({
					url: '/update_display_order?update_id=' + $(this).attr('id') + '&order=' + $(this).val(),
					context: document.body
				}).done(function() {
					$('.alert').remove();
					$('#main-content').prepend('<div class="alert alert-success">Order Updated</div> ');
				});
			  			  
			});
			
			$('.photo-selector').click(function() {
				
				$('.photo-selector').removeClass('selected-photo');
				$(this).addClass('selected-photo');
				
				$('#photo').val( $(this).attr('id') );
			  			  
			});
			
			$('.add-to-list').click(function(e) {
				
				e.preventDefault();
				
				$( '#' + $(this).attr('data-item') ).toggle('slow');
							  			  
			});
			
			$('.add-list-item').click(function(e) {
				
				e.preventDefault();
				
				alert( 'submit' );
				
				//$( '#' + $(this).attr('data-item') ).toggle();
							  			  
			});
			
			$('.delete-item').click(function(e) {
				
				e.preventDefault();
				
				var to_delete = $(this).attr('id').replace('delete-','');
				
				if( confirm( 'Are you sure you want to delete this ' + to_delete + '?' ) ) {
					
					location.href = '/delete?id=' + $('#id').val() + '&model=' + to_delete + 's';
					
				}
			  			  
			});
			
			$('.cancel-item').click(function(e) {
				
				e.preventDefault();
				
				var to_cancel = $(this).attr('id').replace('cancel-','');
				
				location.href = '/' + to_cancel + 's';
			  			  
			});
			
			$('.booking-list-link').click(function(e) {
				
				e.preventDefault();
							  			  
			});
			
			$(function() {
				
				$( "#start_date-id" ).datepicker();
				$( "#end_date-id" ).datepicker();
			
			});
						
		});
		
		
	</script>
        
  </body>
</html>