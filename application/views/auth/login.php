<div id="content" class="admin">
<div id="register_form" class="login">
    <h2>Professional Access</h2>
    <p>This area is accessible to nursery and garden professionals only.  To gain access,
        please contact <?php echo safe_mailto('info@greatplantpicks.org', 'info@greatplantpicks.org'); ?>
        with your name, business name and/or profession, email address and phone number.</p>
	<p>Please log in with your email address and password below.</p>

	<div id="infoMessage"><?php echo $message;?></div>
  
  <?php
     $attributes = array('class' => 'login_form');
     echo form_open('auth/login',$attributes);
     ?>

      <p>
      	<label for="email">Email:</label>
      	<?php echo form_input($email);?>
      </p>

      <p>
      	<label for="password">Password:</label>
      	<?php echo form_input($password);?>
      </p>

     <p>
	      <label for="remember">Remember Me:</label>
	      <?php echo form_checkbox('remember', '1', FALSE);?>
	  </p> 


      <p><?php echo form_submit('submit', 'Login');?></p>

          <?php echo form_close();?>

  <!--   <p><a href="/auth/forgot_password">Forgot your password?  Reset.</a></p>-->
</div><!-- end form -->


