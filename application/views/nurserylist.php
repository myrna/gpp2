<!-- Nursery Directory View -->
<div id="content" class="display">
<?php
echo "<h1>".$heading."</h1>";
echo "<h4>Washington State Nurseries</h4>";
if(!empty($nurseries_wa)) echo $this->table->generate($nurseries_wa);
echo "<h4>Oregon State Nurseries</h4>";
if(!empty($nurseries_or)) echo $this->table->generate($nurseries_or);
echo "<h4>British Columbia Nurseries</h4>";
if(!empty($nurseries_bc)) echo $this->table->generate($nurseries_bc);
echo "<h4>Other Nurseries</h4>";
if(!empty($nurseries_other)) echo $this->table->generate($nurseries_other);
?>
</div><!-- end content -->