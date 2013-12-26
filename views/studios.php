<h1>Studios</h1>

<div style='padding: 10px 0px 10px 0px; width: 80%'>

	<a href='/studio'>Add Studio</a>

</div>

<? if( count( $controller->studios ) ): ?>

<table id='default-table' class="table table-striped table-condensed">

	<thead>
    	<tr>
        	<th>Title</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    
    <tbody>
    
    	<? foreach( $controller->studios as $r ): ?>
                
        <tr>
        	<td><?=$r['title'] ?></td>
            <td><a href='/studio?id=<?=$r['id'] ?>'>edit</a> - <a href='/delete?id=<?=$r['id'] ?>&model=studios' onclick="return confirm( 'Are you sure?' )">delete</a></td>
        </tr>
        
        <? endforeach; ?>
        
    </tbody>

</table>

<? else: ?>

	<p>No studios are in the system.</p>
    
<? endif; ?>