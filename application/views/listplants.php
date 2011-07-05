<!-- list plants view -->
<div id="content" class="display">
<?php

    echo "<h1>$heading: $total_rows records</h1>";


    echo $this->session->flashdata('status');
    $attributes = array('id' => 'searchform');
    echo form_open('listplants/search', $attributes);
    echo form_input('searchterms', $searchterms); ?>
    <input type="submit" value="Search">

    <?php
    echo "<p>".anchor('/listplants', "Clear Search");

    echo "<p class='nav'>".anchor('crud/add_record', 'Add new record')."</p>";

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