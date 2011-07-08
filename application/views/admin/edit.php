<!-- Database Administration Edit Individual Record View -->

<div id="content" class="admin">
    
<?php
    if($row == FALSE)
    {
        echo "The record does not exist"; ?>
        <?php
    }
 else
    {
     ?>
   
    <h4><?php echo $title ?><?php
        echo display_full_botanical_name($row);
    ?></h4>

<?php
    echo "<p class='nav'>".anchor('crud/add_record', 'Add new record')." | ";

    echo anchor('/listplants', 'Return to Main List')."</p>";
    ?>
    <div class="gallery-thumbs">
<?php foreach ($images as $image) {
     echo image_thumb_link($image['filename']);
     foreach ($image['categories'] as $category) {
		echo "<div class='category'><p>" . $category . "</p></div>";
     }
}
?>
    </div><!-- end gallery thumbs -->

     <?php
        $attributes = array('class' => 'data-entry', 'id' => $row['id']);
        echo form_open('crud/edit',$attributes);
    ?>
    <ul>
    <?php foreach ($row as $key => $value) {
        echo "<li>";
        echo form_label(field_to_label($key), $key);
        echo build_form_control($key, $value);
        //form_input($key, $value);
        echo "</li>";
        
    } ?>
    
    
    <?php
        foreach ($plant_attributes as $row => $values) {
            echo "<li><p>" . field_to_label($row) . ":</p>";
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
        echo "</li>";
    ?>
    </ul>
    <?php echo form_submit('edit','Edit Record'); ?>
    <?php
    }
    ?>
</div><!-- end content -->
