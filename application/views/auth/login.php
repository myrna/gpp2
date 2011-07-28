<div id="content" class="admin">
<div id="login_form">
    <h2>Administrative Login</h2>
	<p>Please log in with your email address and password below.</p>

	<div id="infoMessage"><?php echo $message;?></div>
    <p>
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

 <!--    <p>
	      <label for="remember">Remember Me:</label>
	      <?php echo form_checkbox('remember', '1', FALSE);?>
	  </p> -->


      <p><?php echo form_submit('submit', 'Login');?></p>

          <?php echo form_close();?>

  <!--   <p><a href="/auth/forgot_password">Forgot your password?  Reset.</a></p>-->
</div><!-- end form -->


