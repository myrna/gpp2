<?php $this->load->view('includes/header'); ?>
<?php
echo "<h1>".$heading."</h1>";

if(!empty($nurseries)) echo $this->table->generate($nurseries);

?>
<?php $this->load->view('includes/footer'); ?>