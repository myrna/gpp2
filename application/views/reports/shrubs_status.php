<div id="content" class="display">
<h1>Shrubs and Vines</h1>
<?php
echo "<h4>".$heading."</h4>";
 if (!empty($shrubs_status)) echo $this->table->generate($shrubs_status);
     
 ?>
</div><!-- end content -->
