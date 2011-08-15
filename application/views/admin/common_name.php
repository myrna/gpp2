<div id="content" class="admin">
    <h2>GPP Database Administration: Add Common Name</h2>
    <p class="nav"><?php
       echo anchor('admin/crud/edit_record/'.$plant_id, 'Return to Plant Record');
    ?></p>
    <?php echo display_full_botanical_name($plant_data); ?>
    <?php
        $attributes = array('class' => 'data-entry');
        echo form_open('admin/crud/save_common_name', $attributes);
        echo form_hidden('plant_id', $plant_id);
    ?>
    <?php echo $this->session->flashdata('status'); ?>
    <ul>
    <?php foreach ($row as $key => $value) {
        echo "<li>";
        echo "<span class='labelname'>";
        echo field_to_label($key);
        echo "</span>";
        echo build_form_control($key, $value);
        echo "</li>";
    } ?>
    </ul>
    <?php echo form_submit('save_common_name', 'Add Common Name'); ?>
      <div class="clear"></div>
</div>