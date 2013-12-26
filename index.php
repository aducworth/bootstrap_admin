<?

session_start();

//print_r( $_GET );

include( 'db.php' );
include( 'auth.php' );
include( 'controller.php' );
include( 'form.php' );
include( 'resize.php' );

$controller = new AppController;
$form 		= new Form;

$action = $_GET['url']?$_GET['url']:'index';

$controller->$action();

if( !$_GET['ajax'] ) {
	
	include( 'views/header.php' );
	
}

include( 'views/' . $action . '.php' );

if( !$_GET['ajax'] ) {

	include( 'views/footer.php' );

}

?>