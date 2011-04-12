<!DOCTYPE html>
<html>
<head>
	<title>GPP Database Administration</title>
         </head>
<body>
    <?php

    echo "<h2>".$heading."</h1>";

    echo "<p>".anchor('crud/new_record', 'Add new record')."</p>";
    if(!empty($records)) echo $this->table->generate($records);

    ?>

</body>
