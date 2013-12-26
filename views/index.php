<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">
	<h1>Hello, <?=$_SESSION['logged_in_user']['fname'] ?> <?=$_SESSION['logged_in_user']['lname'] ?>!</h1>
</div>

<!-- Example row of columns -->
<div class="row">
<div class="span6">
  <h2>Recently Added Films</h2>
  <? if( count( $controller->recently_added_films ) ): ?>

        <table id='default-table' class="table table-striped table-condensed">
        
            <thead>
                <tr>
                    <th>Name</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            
            <tbody>
            
                <? foreach( $controller->recently_added_films as $p ): ?>
                        
                <tr>
                    <td>
						<a href='/film?id=<?=$p['id'] ?>'>
							<?=$p['title'] ?>
                        </a>
                    </td>
                    <td>Added <?=date( 'm/d/y g:ia', strtotime( $p['created'] ) ) ?></td>
                </td>
                
                <? endforeach; ?>
                
            </tbody>
        
        </table>
        
	<? else: ?>
    
        <p>No films have been added.</p>
        
    <? endif; ?>
</div>
<div class="span6">
  <h2>Recently Modified Films</h2>
  <? if( count( $controller->recently_modified_films ) ): ?>

        <table id='default-table' class="table table-striped table-condensed">
        
            <thead>
                <tr>
                    <th>Name</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            
            <tbody>
            
                <? foreach( $controller->recently_modified_films as $p ): ?>
                        
                <tr>
                    <td>
						<a href='/film?id=<?=$p['id'] ?>'>
							<?=$p['title'] ?>
                        </a>
                    </td>
                    <td>Modified <?=date( 'm/d/y g:ia', strtotime( $p['modified'] ) ) ?></td>
                </td>
                
                <? endforeach; ?>
                
            </tbody>
        
        </table>
        
	<? else: ?>
    
        <p>No films have been added.</p>
        
    <? endif; ?>
</div>
</div>