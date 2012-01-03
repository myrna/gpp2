<!-- list plants view -->

<div id="content" class="admin">

<?php

    echo "<h4>$heading: $total_rows records</h4>";
    echo $this->session->flashdata('status');
    echo "<p class='nav'>".anchor('admin/crud/add_record', 'Add new record')."</p>";
  ?>

    <form method="get" id="searchform" accept-charset="utf-8" action="<?php echo base_url();?>admin/listplants/search" />
    <input type="text" name="searchterms" id="searchterms">
       
    <input type="submit" value="Search">
 
    <?php
    echo "<span class='clear-search'>".anchor('/admin/listplants', "Clear Search")."</span>"; ?>
    <div class="clear"></div>
    <p class='note'>*Search by plant name, or to list plants by status, enter gpp, evaluated, nominated, or eliminated into search box.</p>
    <?php
    
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