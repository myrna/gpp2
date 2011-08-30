<div id="content" class="admin">
<div id="register_form" class="register">

	<h2>Edit User</h2>
	<p>Please enter information below.</p>

	<div id="infoMessage"><?php echo $message;?></div>
<!-- following will be moved to a model where it belongs :) -->
    
    <?php echo form_open("auth/edit_user/".$user_id); ?>
      <p>First Name:<br />
      <?php echo form_input($first_name);?>
      </p>
      
      <p>Last Name:<br />
      <?php echo form_input($last_name);?>
      </p>
      
      <p>Company Name:<br />
      <?php echo form_input($company);?>
      </p>
      
      <p>Email:<br />
      <?php echo form_input($email);?>
      </p>
      
      <p>Phone:<br />
      <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
      </p>

      <p>Group (1=admin, 3=professional):<br />
      <?php echo form_input($group_id);?>-<?php echo form_input($group_id);?>-<?php echo form_input($group_id);?>
      </p>
      
      <p>
      	<input type=checkbox name="reset_password"> <label for="reset_password">Reset Password</label>
      </p>
      
      <?php echo form_input($id); ?>
      <p><?php echo form_submit('submit', 'Update');?></p>

      
    <?php echo form_close();?>

</div>
</div>
