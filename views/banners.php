<h1>Banners</h1>

<div style='padding: 10px 0px 10px 0px; width: 80%'>

	<a href='/banner'>Add Banner</a>

</div>

<? if( count( $controller->banners ) ): ?>

<table id='default-table' class="table table-striped table-condensed">

	<thead>
    	<tr>
        	<th>&nbsp;</th>
            <th>Title</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    
    <tbody>
    
    	<? foreach( $controller->banners as $r ): ?>
                
        <tr>
        	<td>
				<? if( $r['image'] ): ?>
    
                    <img src="<?=$controller->site_url ?>/images/uploads/banners/thumbnails/<?=$r['image'] ?>" class="img-rounded"/>
                    
               <? endif; ?>
            </td>
            <th><?=$r['title'] ?></th>
            <td><a href='/banner?id=<?=$r['id'] ?>'>edit</a> - <a href='/delete?id=<?=$r['id'] ?>&model=banners' onclick="return confirm( 'Are you sure?' )">delete</a></td>
        </tr>
        
        <? endforeach; ?>
        
    </tbody>

</table>

<? else: ?>

	<p>No banners are in the system.</p>
    
<? endif; ?>