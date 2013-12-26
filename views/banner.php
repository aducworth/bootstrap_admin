<h1><?=$_GET['id']?'Edit':'Add' ?> Banner</h1>

<form action='/banner' id='data-form' method='post' enctype="multipart/form-data">

<? if( $_GET['id'] ): ?>

	<input type='hidden' id='id' name='id' value='<?=$_GET['id'] ?>'/>
    
<? endif; ?>
<?=$form->textbox( 'title', array( 'label' => 'Title', 'default' => $controller->result['title'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'url', array( 'label' => 'URL', 'default' => $controller->result['url'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'url_title', array( 'label' => 'URL Title', 'default' => $controller->result['url_title'], 'class' => 'required' ) ) ?>
<?=$form->textarea( 'description', array( 'label' => 'Description', 'default' => $controller->result['description'], 'class' => 'required', 'maxlength' => 100 ) ) ?>

<? if( $controller->result['image'] ): ?>

	<p><a href="<?=$controller->site_url ?>/images/uploads/banners/<?=$controller->result['image'] ?>" target='_blank'>
		<img src="<?=$controller->site_url ?>/images/uploads/banners/thumbnails/<?=$controller->result['image'] ?>" class=""/>
    </a></p>
	
<? endif; ?>

<p><label>Image ( Please restrict photos to jpgs. The image will automatically be resized to 1200px x 415px. ):</label><input type='file' name='image' class='<?=$controller->result['image']?'':'required' ?>'/></p>

<p class='action-buttons'>

	<input type='submit' class="btn pull-left" value='Save'/>

	<? if( $_GET['id'] ): ?>

		<button id='delete-banner' class="btn btn-danger pull-right delete-item">Delete</button>
        
    <? else: ?>
    
    	<button id='cancel-banner' class="btn btn-danger pull-right cancel-item">Cancel</button>
        
    <? endif; ?>

</p>

</form>