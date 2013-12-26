<h1>Films</h1>

<div style='padding: 10px 0px 10px 0px; width: 80%'>

	<a href='/film'>Add Film</a>

</div>

<? if( count( $controller->films ) ): ?>

<table id='default-table' class="table table-striped table-condensed">

	<thead>
    	<tr>
        	<th>&nbsp;</th>
            <th>Title</th>
            <th>Release Date</th>
            <th>Featured</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    
    <tbody>
    
    	<? foreach( $controller->films as $r ): ?>
                
        <tr>
        	<td>
				<? if( $r['film_image'] ): ?>
    
                    <img src="<?=$controller->site_url ?>/images/uploads/films/thumbnails/<?=$r['film_image'] ?>" class="img-rounded"/>
                    
               <? endif; ?>
            </td>
            <td><?=$r['title'] ?></td>
            <td><?=date( 'm/d/Y', strtotime( $r['release_date'] ) ) ?></td>
            <td><?=$r['featured']?'Yes':'' ?></td>
            <td><a href='/film?id=<?=$r['id'] ?>'>edit</a> - <a href='/delete?id=<?=$r['id'] ?>&model=films' onclick="return confirm( 'Are you sure?' )">delete</a></td>
        </tr>
        
        <? endforeach; ?>
        
    </tbody>

</table>

<? else: ?>

	<p>No films are in the system.</p>
    
<? endif; ?>