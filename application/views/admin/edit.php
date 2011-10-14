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
    
       <p class="nav">
<?php
    echo anchor('admin/crud/add_record', 'Add new record')." | ";
    echo anchor("admin/crud/synonym/".$id, 'Add Synonym')." | ";
    echo anchor("admin/crud/common_name/".$id, 'Add Common Name')." | ";
    echo anchor('admin/listplants', 'Return to Main List')." | "; ?>
    <a href="javascript:history.go(-1);"> [Back]</a></p>
 <?php
        if (!empty($synonyms)) {
            echo "<h5>Synonyms</h5><p>";
            foreach ($synonyms as $synonym) {
                echo display_full_botanical_name($synonym);
                echo anchor('admin/crud/delete_synonym/'.$synonym['id'], '(Delete Synonym)');
                echo "</p>";
            }
        }
    ?>
    <?php
        if (!empty($common_names)) {
            echo "<h5>Common Names</h5><p>";
            foreach ($common_names as $common_name) {
                echo $common_name['common_name']." ";
                echo anchor('admin/crud/delete_common_name/'.$common_name['id'], '(Delete Common Name)');
                echo "</p>";
            }
        }
    ?>

       
<?php foreach ($images as $image) {

     echo "<div class='thumb'>" . image_thumb_link($image['filename']);
     foreach ($image['categories'] as $category) {
		echo "<p class='category'>Image: " . $category . "</p></div>";
     }
}
?>
    

     <?php
        $attributes = array('class' => 'data-entry', 'id' => $row['id']);
        echo form_open('admin/crud/edit',$attributes);
    ?>
    <ul>
    <?php foreach ($row as $key => $value) {
        echo "<li>";
        echo "<span class='labelname'>";
        echo form_label(field_to_label($key), $key);
        echo "</span>";
        echo build_form_control($key, $value);
        echo "</li>";
        form_input($key, $value);      //this was commented out can't recall why
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
    <?php echo form_submit('edit','Edit Record'); ?>
    <?php
     echo form_close();
    }
    ?>
         <div class="clear"></div>
</div><!-- end content -->
