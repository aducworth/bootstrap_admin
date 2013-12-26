<h1><?=$_GET['id']?'Edit':'Add' ?> Theater</h1>

<form action='/theater' id='data-form' method='post'>

<? if( $_GET['id'] ): ?>

	<input type='hidden' id='id' name='id' value='<?=$_GET['id'] ?>'/>

<? endif; ?>

<?=$form->textbox( 'name', array( 'label' => 'Name', 'default' => $controller->result['name'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'address', array( 'label' => 'Address', 'default' => $controller->result['address'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'city', array( 'label' => 'City', 'default' => $controller->result['city'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'state', array( 'label' => 'State', 'default' => $controller->result['state'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'zipcode', array( 'label' => 'Zipcode', 'default' => $controller->result['zipcode'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'email', array( 'label' => 'Email', 'default' => $controller->result['email'], 'class' => 'required email' ) ) ?>
<?=$form->textbox( 'phone', array( 'label' => 'Phone', 'default' => $controller->result['phone'], 'class' => 'required phone' ) ) ?>
<?=$form->textbox( 'events_manager', array( 'label' => 'Events Manager', 'default' => $controller->result['events_manager'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'events_manager_email', array( 'label' => 'Events Manager Email', 'default' => $controller->result['events_manager_email'], 'class' => 'required email' ) ) ?>
<?=$form->textbox( 'events_manager_phone', array( 'label' => 'Events Manager Phone', 'default' => $controller->result['events_manager_phone'], 'class' => 'required phone' ) ) ?>
<?=$form->textarea( 'accessibility_and_amenities', array( 'label' => 'Accessibility and Amenities', 'default' => $controller->result['accessibility_and_amenities'], 'class' => 'required' ) ) ?>
<?=$form->textarea( 'ticket_pricing', array( 'label' => 'Ticket Pricing', 'default' => $controller->result['ticket_pricing'], 'class' => 'required' ) ) ?>
<?=$form->textarea( 'special_notes', array( 'label' => 'Special Notes', 'default' => $controller->result['special_notes'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'twitter', array( 'label' => 'Twitter', 'default' => $controller->result['twitter'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'facebook', array( 'label' => 'Facebook', 'default' => $controller->result['facebook'], 'class' => 'required' ) ) ?>

<p class='action-buttons'>

	<input type='submit' class="btn pull-left" value='Save'/>

	<? if( $_GET['id'] ): ?>

		<button id='delete-theater' class="btn btn-danger pull-right delete-item">Delete</button>
        
    <? else: ?>
    
    	<button id='cancel-theater' class="btn btn-danger pull-right cancel-item">Cancel</button>
        
    <? endif; ?>

</p>

</form>