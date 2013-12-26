<h1><?=$_GET['id']?'Edit':'Add' ?> Studio</h1>

<form action='/studio' id='data-form' method='post'>

<? if( $_GET['id'] ): ?>

	<input type='hidden' id='id' name='id' value='<?=$_GET['id'] ?>'/>

<? endif; ?>

<?=$form->textbox( 'title', array( 'label' => 'Title', 'default' => $controller->result['title'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'studio_id', array( 'label' => 'Studio ID', 'default' => $controller->result['studio_id'], 'class' => 'required' ) ) ?>

<p class='action-buttons'>

	<input type='submit' class="btn pull-left" value='Save'/>

	<? if( $_GET['id'] ): ?>

		<button id='delete-studio' class="btn btn-danger pull-right delete-item">Delete</button>
        
    <? else: ?>
    
    	<button id='cancel-studio' class="btn btn-danger pull-right cancel-item">Cancel</button>
        
    <? endif; ?>

</p>

</form>