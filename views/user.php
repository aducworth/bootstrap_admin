<h1><?=$_GET['id']?'Edit':'Add' ?> User</h1>

<form action='/user' id='data-form' method='post' enctype="multipart/form-data">

<? if( $_GET['id'] ): ?>

	<input type='hidden' id='id' name='id' value='<?=$_GET['id'] ?>'/>

<? endif; ?>

<?=$form->textbox( 'fname', array( 'label' => 'First Name', 'default' => $controller->result['fname'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'lname', array( 'label' => 'Last Name', 'default' => $controller->result['lname'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'email', array( 'label' => 'Email', 'default' => $controller->result['email'], 'class' => 'email' ) ) ?>
<?=$form->select( 'admin', $controller->auth->user_types, array( 'label' => 'Type', 'default' => $controller->result['admin'] ) ) ?>
<?=$form->password( 'password', array( 'label' => 'Password', 'class' => ($_GET['id']?'':'required') ) ) ?>
<?=$form->password( 'password_confirm', array( 'label' => 'Confirm Password' ) ) ?>

<p class='action-buttons'>

	<input type='submit' class="btn pull-left" value='Save'/>

	<? if( $_GET['id'] ): ?>

		<button id='delete-user' class="btn btn-danger pull-right delete-item">Delete</button>
        
    <? else: ?>
    
    	<button id='cancel-user' class="btn btn-danger pull-right cancel-item">Cancel</button>
        
    <? endif; ?>

</p>

</form>