<h1>Theaters</h1>

<div style='padding: 10px 0px 10px 0px; width: 80%'>

	<a href='/theater'>Add Theater</a>

</div>

<? if( count( $controller->theaters ) ): ?>

<table id='default-table' class="table table-striped table-condensed">

	<thead>
    	<tr>
        	<th>Name</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    
    <tbody>
    
    	<? foreach( $controller->theaters as $r ): ?>
                
        <tr>
        	<td><?=$r['name'] ?></td>
            <td><a href='/theater?id=<?=$r['id'] ?>'>edit</a> - <a href='/delete?id=<?=$r['id'] ?>&model=theaters' onclick="return confirm( 'Are you sure?' )">delete</a></td>
        </tr>
        
        <? endforeach; ?>
        
    </tbody>

</table>

<? else: ?>

	<p>No theaters are in the system.</p>
    
<? endif; ?>