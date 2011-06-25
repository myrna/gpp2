<!-- Database Administration Edit Individual Record View -->

    <?php
    if($row == FALSE)
    {
        echo "The record does not exist"; ?>
        <?php
    }
 else
    {
     ?>
    <?php 
        echo form_open('crud/edit','',array('id' => $row['id']));
    ?>
    <h4><?php echo $title ?><?php
        display_full_botanical_name($row);
    ?></h4>
<?php
    echo "<p>".anchor('crud/new_record', 'Add new record')." | ";

    echo anchor('/listplants', 'Return to Main List')."</p>";
    ?>
    <ul>
    <?php foreach ($row as $key => $value) {
        echo "<li>";
        echo field_to_label($key);
        echo form_input($key, $value);
        echo "</li>";
    } ?>
        <li>Water: 
        <?php // this could definitely be refactored into a loop, instead of doing each one by hand ?>
            <?php foreach ($water_fields as $row) { ?>
                <br />
            <?php
                $water_data = array(
                    'name' => "water[]", 
                    'id' => $row->water, 
                    'value' => $row->id,
                    'checked' => in_array($row->id, $water_requirements)
                );
                echo form_checkbox($water_data);
                echo form_label($row->water, $row->water);
            } ?>

        </li>
        <li>Sun: 
            <?php foreach ($sun_fields as $row) { ?>
                <br />
            <?php
                $sun_data = array(
                    'name' => "sun[]", 
                    'id' => $row->sun, 
                    'value' => $row->id,
                    'checked' => in_array($row->id, $sun_requirements)
                );
                echo form_checkbox($sun_data);
                echo form_label($row->sun, $row->sun);
            } ?>

        </li>        
        <li>Soil: 
            <?php foreach ($soil_fields as $row) { ?>
                <br />
            <?php
                $soil_data = array(
                    'name' => "soil[]", 
                    'id' => $row->soil, 
                    'value' => $row->id,
                    'checked' => in_array($row->id, $soil_requirements)
                );
                echo form_checkbox($soil_data);
                echo form_label($row->soil, $row->soil);
            } ?>

        </li>
        <li>Wildlife: 
            <?php foreach ($wildlife_fields as $row) { ?>
                <br />
            <?php
                $wildlife_data = array(
                    'name' => "wildlife[]", 
                    'id' => $row->wildlife, 
                    'value' => $row->id,
                    'checked' => in_array($row->id, $wildlife_requirements)
                );
                echo form_checkbox($wildlife_data);
                echo form_label($row->wildlife, $row->wildlife);
            } ?>

        </li>            

        <li>Pest Resistance: 
            <?php foreach ($pest_resistance_fields as $row) { ?>
                <br />
            <?php
                $pest_resistance_data = array(
                    'name' => "pest_resistance[]", 
                    'id' => $row->pest_resistance, 
                    'value' => $row->id,
                    'checked' => in_array($row->id, $pest_resistance_requirements)
                );
                echo form_checkbox($pest_resistance_data);
                echo form_label($row->pest_resistance, $row->pest_resistance);
            } ?>

        </li> 
        <li>Flower Color: 
            <?php foreach ($flower_color_fields as $row) { ?>
                <br />
            <?php
                $flower_color_data = array(
                    'name' => "flower_color[]", 
                    'id' => $row->flower_color, 
                    'value' => $row->id,
                    'checked' => in_array($row->id, $flower_color_requirements)
                );
                echo form_checkbox($flower_color_data);
                echo form_label($row->flower_color, $row->flower_color);
            } ?>

        </li>
        <li>Design Use:
            <?php foreach ($design_use_fields as $row) { ?>
                <br />
            <?php
                $design_use_data = array(
                    'name' => "design_use[]", 
                    'id' => $row->design_use, 
                    'value' => $row->id,
                    'checked' => in_array($row->id, $design_use_requirements)
                );
                echo form_checkbox($design_use_data);
                echo form_label($row->design_use, $row->design_use);
            } ?>

        </li> 
         
    </ul>
    <?php echo form_submit('edit','Edit Record'); ?>
    <?php
    }
    ?>
<a href="javascript:history.back()">Back</a>
