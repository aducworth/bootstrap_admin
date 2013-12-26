<h1><?=$_GET['id']?'Edit':'Add' ?> Photo</h1>

<form action='/photo' id='data-form' method='post' enctype="multipart/form-data">

<? if( $_GET['id'] ): ?>

	<input type='hidden' id='id' name='id' value='<?=$_GET['id'] ?>'/>
    
    <? if( $controller->result['image'] ): ?>
    
    	<img src="<?=$controller->site_url ?>/images/uploads/banners/<?=$controller->result['image'] ?>" class=""/>
        
   <? endif; ?>

<? endif; ?>

<p><label>Image ( Please restrict photos to jpgs. The image will automatically be resized to 1120px x 473px. ):</label><input type='file' name='image' class='<?=$controller->result['image']?'':'required' ?>'/></p>

<p class='action-buttons'>

	<input type='submit' class="btn pull-right" value='Save'/>

	<? if( $_GET['id'] ): ?>

		<button id='delete-photo' class="btn btn-danger pull-left delete-item">Delete</button>
        
    <? else: ?>
    
    	<button id='cancel-photo' class="btn btn-danger pull-left cancel-item">Cancel</button>
        
    <? endif; ?>

</p>

</form>