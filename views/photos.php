<h1>Photos</h1>

<div style='padding: 10px 0px 10px 0px; width: 80%'>

	<a href='/photo'>Add Photo</a>

</div>

<? if( count( $controller->photos ) ): ?>

<table id='default-table' class="table table-striped table-condensed">

	<thead>
    	<tr>
        	<th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    
    <tbody>
    
    	<? foreach( $controller->photos as $r ): ?>
                
        <tr>
        	<td>
				<? if( $r['image'] ): ?>
    
                    <img src="<?=$controller->site_url ?>/images/uploads/banners/thumbnails/<?=$r['image'] ?>" class="img-rounded"/>
                    
               <? endif; ?>
            </td>
            <td><a href='/photo?id=<?=$r['id'] ?>'>edit</a> - <a href='/delete?id=<?=$r['id'] ?>&model=photos' onclick="return confirm( 'Are you sure?' )">delete</a></td>
        </tr>
        
        <? endforeach; ?>
        
    </tbody>

</table>

<? else: ?>

	<p>No photos are in the system.</p>
    
<? endif; ?>