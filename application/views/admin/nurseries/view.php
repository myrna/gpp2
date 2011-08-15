<!-- Database Administration View and Edit Nursery Directory -->
<div id="content" class="admin">
    <h2>GPP Database Administration: Edit Nursery Directory</h2>
    <p class="nav"><?php
       echo anchor('admin/nurseries/add_new', 'Add New Nursery Record');
    ?></p>
    <?php echo $this->session->flashdata('status'); ?>
<?php
if(!empty($nurseries)) echo $this->table->generate($nurseries);
?>


</div><!-- end content -->