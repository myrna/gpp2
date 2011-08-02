<div id="content" class="admin">
    <h2>GPP Database Administration: Add Synonym</h2>
    <p class="nav"><?php
       echo anchor('/crud/edit_record/'.$synonym_id, 'Return to Plant Record');
    ?></p>
    <?php
        $attributes = array('class' => 'data-entry');
        echo form_open('crud/save_synonym', $attributes);
        echo form_hidden('synonym_id', $synonym_id);
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
    <?php echo form_submit('save_synonym', 'Add Synonym'); ?>
</div>