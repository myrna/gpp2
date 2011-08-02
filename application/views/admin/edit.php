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
        if (!empty($synonyms)) {
            echo "<h5>Synonyms</h5>";
            foreach ($synonyms as $synonym) {
                echo display_full_botanical_name($synonym);
                echo anchor('crud/delete_synonym/'.$synonym['id'], 'Delete');
                echo "<br />";
            }
        }
    ?>
    <?php
        if (!empty($common_names)) {
            echo "<h5>Common Names</h5>";
            foreach ($common_names as $common_name) {
                echo $common_name['common_name']." ";
                echo anchor('crud/delete_common_name/'.$common_name['id'], 'Delete');
                echo "<br />";
            }
        }
    ?>

    <p class="nav">
<?php
    echo anchor('crud/add_record', 'Add new record')." | ";
    echo anchor("crud/synonym/".$id, 'Add Synonym')." | ";
    echo anchor("crud/common_name/".$id, 'Add Common_Name')." | ";    
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
        echo "<span class='labelname'>";
        echo form_label(field_to_label($key), $key);
        echo "</span>";
        echo build_form_control($key, $value);
        echo "</li>";
        //form_input($key, $value);        
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
   
    <?php echo form_submit('edit','Edit Record'); ?>
    <?php
    }
    ?>
</div><!-- end content -->
