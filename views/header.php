<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administration: <?=ucwords( $action ) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
    
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
  </head>
  <body>
  
  	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">Theater Manager</a>
          <div class="nav-collapse collapse">
           
            <? if( $controller->auth->logged_in() ): ?>
            
            <ul class="nav">
              <li><a href="/">Home</a></li>
              
              <?=$controller->auth->navigation() ?>
              
              <li><a href="/logout">Logout</a></li>
            </ul>
            
            	<? if( in_array( $_GET['url'], $controller->auth->show_search ) ): ?>
                
                    <form class="navbar-form pull-right" action='/<?=$_GET['url'] ?>'>
                      <input name='search' class="span2" type="text" placeholder="Search" value="<?=$_GET['search'] ?>">
                    </form>
                
                <? endif; ?>
                        
            <? endif; ?>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div id='main-content' class="container">
    
    	<? if( $_GET['search'] ): ?>
        
            <div class="alert alert-info">
              
              <a class="close" data-dismiss="alert" href='/<?=$_GET['url'] ?>'>×</a>  
              
              Results for "<?=$_GET['search'] ?>"  
              
            </div> 
        
        <? endif; ?>

        <? if( $controller->message ): ?>
        
        	<div class='alert alert-error'>
            
            	<?=$controller->message ?>
            
            </div>
        
        <? endif; ?>
        
        <? //print_r( $_SESSION ) ?>