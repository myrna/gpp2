<div id="content" class="admin">
<div id="register_form" class="register">

	<h2>Create New User</h2>
	<p>Please enter information below.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php 
         $attributes = array('class' => 'login_form');
         echo form_open('auth/create_user',$attributes);?>

      <p><label for="first_name">First Name:</label>
      <?php echo form_input($first_name);?>
      </p>
      
       <p><label for="last_name">Last Name:</label>
      <?php echo form_input($last_name);?>
      </p>
      
       <p><label for="company">Business Name:</label>
      <?php echo form_input($company);?>
      </p>
      
      <p>
      	<label for="email">Email:</label>
      	<?php echo form_input($email);?>
      </p>
      
      <p><label for="group_id">User Group:</label>
     <input type="radio" name="group_id" value="1" <?php echo set_radio('group_id', '1'); ?> /> Administrative
<input type="radio" name="group_id" value="3" <?php echo set_radio('group_id', '3'); ?> /> Professional
      </p>
      
      <p><label for="password">Password:</label>
      <?php echo form_input($password);?>
      </p>
      
      <p><label for="password_confirm">Confirm Password:</label>
      <?php echo form_input($password_confirm);?>
      </p>
      
      
      <p><?php echo form_submit('submit', 'Create User');?></p>

      
    <?php echo form_close();?>

</div>
