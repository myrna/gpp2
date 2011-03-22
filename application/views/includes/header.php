<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="css/gppstyles.css">
	<title></title>
</head>
<body>
    <a href="/">Home</a> | <a href="/plantdata/">Plant Data</a> |
<?php if ($logged_in) :?>
  <a href="/auth/logout/">Logout</a>
<?php else :  ?>
  <a href="/auth/login/">Login</a> | <a href="auth/create_user/">Register</a>
<?php endif ?>

