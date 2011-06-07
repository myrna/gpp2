<!-- Database Administration CRUD View All Records -->
    <?php

    echo "<h2>".$heading."</h2>";

    echo $this->session->flashdata('status');

    echo "<p>".anchor('crud/new_record', 'Add new record')."</p>";
    if(!empty($records)) echo $this->table->generate($records);

    ?>
<div id="pages">
	<?php echo $this->pagination->create_links(); ?>
</div>