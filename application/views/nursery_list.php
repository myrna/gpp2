<!-- Nursery Directory -->
<?php
echo "<h1>".$heading."</h1>";

if(!empty($nurseries)) echo $this->table->generate($nurseries);

?>
