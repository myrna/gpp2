<div id="content" class="display">
<h1>Shrubs and Vines</h1>
<?php
echo "<h4>".$heading."</h4>";
 if (!empty($shrubs)) echo $this->table->generate($shrubs);
     
 ?>
</div><!-- end content -->
