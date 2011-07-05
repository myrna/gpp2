<div id="content" class="display">
<h1>Shrubs and Vines</h1>
<?php
echo "<h4>".$heading."</h4>";
 if (!empty($shrubs_by_name)) echo $this->table->generate($shrubs_by_name);
     
 ?>
</div><!-- end content -->
