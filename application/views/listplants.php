<!-- list plants view -->
<div id="content" class="admin">
<?php

    echo "<h4>$heading: $total_rows records</h4>";

    echo "<p class='nav'>".anchor('crud/add_record', 'Add new record')."</p>";
    echo $this->session->flashdata('status');
    $attributes = array('id' => 'searchform');
    echo form_open('listplants/search', $attributes); ?>
    <input type="text" name="searchterms" >
    <input type="submit" value="Search">
    
    <?php
    echo "<span class='clear-search'>".anchor('/listplants', "Clear Search")."</span>";
    echo "<p class='note'>*Search by plant name, or to list plants by status, enter gpp, evaluated, nominated, or eliminated into search box.</p>";
    
    if ( !empty($records)) {
        echo $this->table->generate($records);  
    } else {
        echo "No records found.";
    }

?>
    
<div id="pages">
	<?php echo $this->pagination->create_links(); ?>
</div>
</div><!-- end content -->