<div id="content" class="admin">
<?php

    echo "<h1>$heading: $total_rows records</h1>";


    echo $this->session->flashdata('status');
    $attributes = array('id' => 'searchform');
    echo form_open('plantlists/search', $attributes); ?>
    <input type="text" name="searchterms" >
    <input type="submit" value="Search">

    <?php
    echo "<span class='clear-search'>".anchor('/listplants', "Clear Search")."</span>";


    if ( !empty($records)) {
        echo $this->table->generate($records);
    } else {
        echo "Sorry, no records match your search.  Try again?";
    }

?>

<div id="pages">
	<?php echo $this->pagination->create_links(); ?>
</div>
</div><!-- end content -->