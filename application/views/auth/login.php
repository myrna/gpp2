<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="css/gppstyles.css">
	<title></title>
</head>
<body>
    <a href="/">Home</a> | <a href="/plantdata/">Plant Data</a> | <a href="/auth/create_user/">Register</a>
<div class='mainInfo'>

    <h2>Login</h2>
    <div class="pageTitleBorder"></div>
	<p>Please login with your email address and password below.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php echo form_open("auth/login");?>
    	
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
      <p><a href="/auth/forgot_password">Forgot your password?  Reset.</a></p>

</div>
<?php $this->load->view('includes/footer'); ?>