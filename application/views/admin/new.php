<!-- Database Administration Add New Record View -->
<div id="content" class="admin">
    <h2>GPP Database Administration: Add New Record</h2>
    <p class="nav"><?php
       echo anchor('admin/listplants', 'Return to Main List');
    ?></p>
    <?php
    $attributes = array('class' => 'data-entry');
    echo form_open('admin/crud/add', $attributes);
    if (isset($id)) {
        // used by synonym records
        echo form_hidden('id', $id);
    }
    ?>
    <?php echo $this->session->flashdata('status'); ?>
    <ul>
    <?php foreach ($row as $key => $value) {
        echo "<li>";
        echo "<span class='labelname'>";
        echo field_to_label($key);
        echo "</span>";
        echo build_form_control($key, $value);
        //form_input($key, $value);
        echo "</li>";
    } ?>
    </ul>
    <?php
        foreach ($plant_attributes as $row => $values) {
            echo "<p>" . field_to_label($row) . ":</p>";
            foreach ($values['fields'] as $options) {
                $html_id = "$row-" . $options['id'];
                $data = array(
                    'name'  => "$row" . "[]",
                    'id'    => $html_id,
                    'value' => $options['id'],
                    'checked' => in_array($options['id'], $values['requirements'])
                );
                echo "<span class='formcheck'>";
                echo form_checkbox($data);
                echo form_label($options["$row"], $html_id);
                echo "</span>";
            };
        }
        
    ?>
    <div class="clear"></div>
    <?php echo form_submit('add', 'Add Record');
    echo form_close(); ?>
      <div class="clear"></div>
</div><!-- end content -->
