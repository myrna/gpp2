<div id="content" class="display">
<h1>Perennials and Bulbs</h1>
<?php
echo "<h4>".$heading."</h4>";
 if (!empty($perennials)) echo $this->table->generate($perennials);
     
 ?>
</div><!-- end content -->
