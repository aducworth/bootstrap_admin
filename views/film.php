<h1><?=$_GET['id']?'Edit':'Add' ?> Film</h1>

<form action='/film' id='data-form' method='post' enctype="multipart/form-data">

<? if( $_GET['id'] ): ?>

	<input type='hidden' id='id' name='id' value='<?=$_GET['id'] ?>'/>
    
<? endif; ?>

<?=$form->textbox( 'film_id', array( 'label' => 'Film ID', 'default' => $controller->result['film_id'], 'class' => 'required' ) ) ?>
<?=$form->select( 'studio_id', $controller->studio_list, array( 'label' => 'Studio ID', 'default' => $controller->result['studio_id'], 'class' => 'required', 'empty' => 'Choose Studio ID', 'add_to_list' => array( 'model' => 'studios', 'fields' => array( 'title' => 'Title', ' studio_id' => 'ID' ), 'pair' => 'id,title' ) ) ) ?>
<?=$form->textbox( 'title', array( 'label' => 'Title', 'default' => $controller->result['title'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'release_date', array( 'label' => 'Release Date', 'default' => ($controller->result['release_date']?date( 'm/d/Y', strtotime( $controller->result['release_date'] ) ):''), 'class' => 'required' ) ) ?>
<?=$form->textbox( 'running_time', array( 'label' => 'Running Time ( minutes )', 'default' => $controller->result['running_time'], 'class' => 'required number' ) ) ?>
<?=$form->select( 'rating', $controller->rating_list, array( 'label' => 'Rating', 'default' => $controller->result['rating'], 'class' => 'required', 'empty' => 'Choose Rating' ) ) ?>
<?=$form->select( 'film_type', $controller->film_type_list, array( 'label' => 'Film Type', 'default' => $controller->result['film_type'], 'class' => 'required', 'empty' => 'Choose Film Type' ) ) ?>


<?=$form->textarea( 'synopsis', array( 'label' => 'Synopsis', 'default' => $controller->result['synopsis'], 'class' => 'required' ) ) ?>
<?=$form->textbox( 'director', array( 'label' => 'Director', 'default' => $controller->result['director'], 'class' => '' ) ) ?>
<?=$form->textbox( 'cast', array( 'label' => 'Cast', 'default' => $controller->result['cast'], 'class' => '' ) ) ?>
<?=$form->textbox( 'writer', array( 'label' => 'Writer', 'default' => $controller->result['writer'], 'class' => '' ) ) ?>
<?=$form->textbox( 'producer', array( 'label' => 'Producer', 'default' => $controller->result['producer'], 'class' => '' ) ) ?>

<?=$form->select( 'genre', $controller->genre_list, array( 'label' => 'Genre', 'default' => $controller->result['genre'], 'class' => 'required', 'empty' => 'Choose Genre' ) ) ?>

<?=$form->select( 'language', $controller->language_list, array( 'label' => 'Language', 'default' => $controller->result['language'], 'class' => 'required', 'empty' => 'Choose Language','add_to_list' => array( 'model' => 'languages', 'fields' => array( 'name' => 'Name' ), 'pair' => 'id,name' ) ) ) ?>

<?=$form->checkbox( 'subtitles', array( 1 => 'Subtitles' ), array( 'label' => false, 'default' => array( isset( $controller->result['subtitles'] )?$controller->result['subtitles']:0 ) ) ) ?>

<?=$form->textbox( 'awards', array( 'label' => 'Awards', 'default' => $controller->result['awards'], 'class' => '' ) ) ?>

<?=$form->checkbox( 'featured', array( 1 => 'Featured' ), array( 'label' => false, 'default' => array( isset( $controller->result['featured'] )?$controller->result['featured']:0 ) ) ) ?>

<?=$form->textbox( 'trailer', array( 'label' => 'Trailer', 'default' => $controller->result['trailer'], 'class' => '' ) ) ?>

<?=$form->textbox( 'website', array( 'label' => 'Website', 'default' => $controller->result['website'], 'class' => '' ) ) ?>


<? if( $controller->result['film_image'] ): ?>

	<a href="<?=$controller->site_url ?>/images/uploads/films/<?=$controller->result['film_image'] ?>" target='_blank'>
		<img src="<?=$controller->site_url ?>/images/uploads/films/thumbnails/<?=$controller->result['film_image'] ?>" class=""/>
    </a>
	
<? endif; ?>

<p><label>Image ( Please restrict photos to jpgs. The image will automatically be resized to 725px x 575px. ):</label><input type='file' name='film_image' class='<?=$controller->result['film_image']?'':'required' ?>'/></p>

<p class='action-buttons'>

	<input type='submit' class="btn pull-left" value='Save'/>

	<? if( $_GET['id'] ): ?>

		<button id='delete-film' class="btn btn-danger pull-right delete-item">Delete</button>
        
    <? else: ?>
    
    	<button id='cancel-film' class="btn btn-danger pull-right cancel-item">Cancel</button>
        
    <? endif; ?>

</p>

</form>