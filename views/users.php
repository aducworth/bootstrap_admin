<h1>Users</h1>

<div style='padding: 10px 0px 10px 0px; width: 80%'>

	<a href='/user'>Add User</a>

</div>

<? if( count( $controller->users ) ): ?>

<table id='default-table' class="table table-striped table-condensed">

	<thead>
    	<tr>
        	<th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    
    <tbody>
    
    	<? foreach( $controller->users as $u ): ?>
                
        <tr>
        	<td><?=$u['fname'] ?> <?=$u['lname'] ?></td>
            <td><?=$u['email'] ?></td>
            <td><?=$controller->auth->user_types[ $u['admin'] ] ?></td>
            <td><a href='/user?id=<?=$u['id'] ?>'>edit</a> - <a href='/delete?id=<?=$u['id'] ?>&model=users' onclick="return confirm( 'Are you sure?' )">delete</a></td>
        </td>
        
        <? endforeach; ?>
        
    </tbody>

</table>

<? else: ?>

	<p>No users are in the system.</p>
    
<? endif; ?>