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
        echo "<span class='labelname'>";
        echo field_to_label($key);
        echo "</span>";
        echo form_input($key, $value);
        echo "</li>";
    } ?>
        <li><p>Flower Color:</p>
            <?php foreach ($flower_color_fields as $row) { ?>
              
            <?php
                $flower_color_data = array(
                    'name' => "flower_color[]",
                    'id' => $row->flower_color,
                    'value' => $row->id,
                    'checked' => in_array($row->id, $flower_color_requirements)
                );
                echo "<span class='formcheck'>";
                echo form_checkbox($flower_color_data);
                echo form_label($row->flower_color, $row->flower_color);
                echo "</span>";
            } ?>

        </li>
        <li><p>Design Use:</p>
            <?php foreach ($design_use_fields as $row) { ?>
              
            <?php
                $design_use_data = array(
                    'name' => "design_use[]",
                    'id' => $row->design_use,
                    'value' => $row->id,
                    'checked' => in_array($row->id, $design_use_requirements)
                );
                echo "<span class='formcheck'>";
                echo form_checkbox($design_use_data);
                echo form_label($row->design_use, $row->design_use);
                echo "</span>";
            } ?>

        </li> 
        <li><p>Water Requirements:</p>
        <?php // this could definitely be refactored into a loop, instead of doing each one by hand ?>
            <?php foreach ($water_fields as $row) { ?>
              
            <?php
                $water_data = array(
                    'name' => "water[]", 
                    'id' => $row->water, 
                    'value' => $row->id,
                    'checked' => in_array($row->id, $water_requirements)
                );
                echo "<span class='formcheck'>";
                echo form_checkbox($water_data);
                echo form_label($row->water, $row->water);
                echo "</span>";
            } ?>

        </li>
        <li><p>Sun Requirements:</p>
            <?php foreach ($sun_fields as $row) { ?>
               
            <?php
                $sun_data = array(
                    'name' => "sun[]", 
                    'id' => $row->sun, 
                    'value' => $row->id,
                    'checked' => in_array($row->id, $sun_requirements)
                );
                echo "<span class='formcheck'>";
                echo form_checkbox($sun_data);
                echo form_label($row->sun, $row->sun);
                echo "</span>";
            } ?>

        </li>        
        <li><p>Soil Type(s):</p>
            <?php foreach ($soil_fields as $row) { ?>
                
            <?php
                $soil_data = array(
                    'name' => "soil[]", 
                    'id' => $row->soil, 
                    'value' => $row->id,
                    'checked' => in_array($row->id, $soil_requirements)
                );
                echo "<span class='formcheck'>";
                echo form_checkbox($soil_data);
                echo form_label($row->soil, $row->soil);
                echo "</span>";
            } ?>

        </li>
        <li><p>Wildlife Attraction:</p>
            <?php foreach ($wildlife_fields as $row) { ?>
               
            <?php
                $wildlife_data = array(
                    'name' => "wildlife[]", 
                    'id' => $row->wildlife, 
                    'value' => $row->id,
                    'checked' => in_array($row->id, $wildlife_requirements)
                );
                echo "<span class='formcheck'>";
                echo form_checkbox($wildlife_data);
                echo form_label($row->wildlife, $row->wildlife);
                echo "</span>";
            } ?>

        </li>            

        <li><p>Pest Resistance: </p>
            <?php foreach ($pest_resistance_fields as $row) { ?>
                
            <?php
                $pest_resistance_data = array(
                    'name' => "pest_resistance[]", 
                    'id' => $row->pest_resistance, 
                    'value' => $row->id,
                    'checked' => in_array($row->id, $pest_resistance_requirements)
                );
                echo "<span class='formcheck'>";
                echo form_checkbox($pest_resistance_data);
                echo form_label($row->pest_resistance, $row->pest_resistance);
                echo "</span>";
                } ?>

        </li> 
        
         
    </ul>
    <?php echo form_submit('edit','Edit Record'); ?>
    <?php
    }
    ?>
</div><!-- end content -->
