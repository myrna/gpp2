<div id="content" class="main">

	<h1>User List</h1>
		
	<div id="infoMessage"><?php echo $message;?></div>
	
	<table class="dblist">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Group</th>
			<th>Status</th>
                      <!--  <th>Edit</th> -->
		</tr>
		<?php foreach ($users as $user):?>
			<tr>
				<td><?php echo $user['first_name']?></td>
				<td><?php echo $user['last_name']?></td>
				<td><?php echo $user['email'];?></td>
				<td><?php echo $user['group_description'];?></td>
				<td><?php echo ($user['active']) ? anchor("auth/deactivate/".$user['id'], 'Active') : anchor("auth/activate/". $user['id'], 'Inactive');?></td>
                              <!--  <td><?php echo (anchor("auth/edit_user/".$user['id'], 'Edit'));?></td> -->
                        </tr>
		<?php endforeach;?>
	</table>
	
	<p class="center"><a href="<?php echo site_url('auth/create_user');?>">Create a new user</a></p>
	
</div>
