<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="css/gppstyles.css">
	<title></title>
</head>
<body>
    <a href="/">Home</a> | <a href="/plantdata/">Plant Data</a> |  <a href="/auth/login/">Login</a> | <a href="/auth/create_user/">Register</a>
<h1>Forgot Password</h1>
<p>Please enter your email address so we can send you an email to reset your password.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>Email Address:<br />
      <?php echo form_input($email);?>
      </p>
      
      <p><?php echo form_submit('submit', 'Submit');?></p>
      
<?php echo form_close();?>
<?php $this->load->view('includes/footer'); ?>