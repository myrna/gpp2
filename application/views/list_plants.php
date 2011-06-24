<?php

    echo "<h2>$heading: $total_rows records</h2>";


    echo $this->session->flashdata('status');

    echo form_open('listplants/search');
    echo form_input('searchterms', $searchterms);
    echo form_submit('search', 'Search');
    echo anchor('/listplants', "Clear Search");

    echo "<p>".anchor('crud/new_record', 'Add new record')."</p>";

    if ( !empty($records)) {
        echo $this->table->generate($records);  
    } else {
        echo "No records found.";
    }

?>
<div id="pages">
	<?php echo $this->pagination->create_links(); ?>
</div>
