<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="css/gppstyles.css">
	<title></title>
</head>
<body>
    <a href="/">Home</a> | <a href="/dbadmin/">Database Administration</a> | <a href="/gallery/">Upload Image</a> | <a href="/listplants/display/">Advanced Search</a> |
<?php if ($logged_in) :?>
  <a href="/auth/logout/">Logout</a>
<?php else :  ?>
  <a href="/auth/login/">Login</a> | <a href="/auth/create_user/">Register</a>
<?php endif ?>

