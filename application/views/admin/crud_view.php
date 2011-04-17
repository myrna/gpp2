<!DOCTYPE html>
<html>
<head>
	<title>GPP Database Administration</title>
         </head>
<body>
     <a href="/">Home</a> | <a href="/gallery/">Upload Image</a> | <a href="/listplants/display/">Advanced Search</a>
    <?php

    echo "<h2>".$heading."</h2>";

    echo $this->session->flashdata('status');

    echo "<p>".anchor('crud/new_record', 'Add new record')."</p>";
    if(!empty($records)) echo $this->table->generate($records);

    echo "".$this->pagination->create_links();
    ?>

</body>
