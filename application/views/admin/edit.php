<!-- Database Administration Edit Individual Record View -->

    <h1><?php echo $title ?></h1>
    <?php
    if($row == FALSE)
    {
        echo "The record does not exist"; ?>
        <a href="javascript:history.back()">Back</a>
        <?php
    }
 else
    {
     ?>
    <?php echo form_open('crud/edit','',array('id' => $row->id));
    ?>
    <ul>
        <li>Plant ID: <?php echo form_input('id', $row->id); ?></li>
         <li>Plant Family: <?php echo form_input('family', $row->family); ?></li>
        <li>Genus: <?php echo form_input('genus', $row->genus); ?></li>
        <li>&#935; Genus: <?php echo form_input('cross_genus', $row->cross_genus); ?></li>
        <li>Specific epithet: <?php echo form_input('specific_epithet', $row->specific_epithet); ?></li>
        <li>Infraspecific epithet designator (ssp., f., var.): <?php echo form_input('infraspecific_epithet_designator', $row->infraspecific_epithet_designator); ?></li>
        <li>Infraspecific epithet: <?php echo form_input('infraspecific_epithet', $row->infraspecific_epithet); ?></li>
        <li>&times; species: <?php echo form_input('cross_species', $row->cross_species); ?></li>
        <li>Plant Group: <?php echo form_input('plantname_group', $row->plantname_group); ?></li>
        <li>Cultivar: <?php echo form_input('cultivar', $row->cultivar); ?></li>
        <li>Trade Name: <?php echo form_input('trade_name', $row->trade_name); ?></li>
        <li>Registered: <?php echo form_input('registered', $row->registered); ?></li>
        <li>Trademark: <?php echo form_input('trademark', $row->trademark); ?></li>
        <li>Plant Patent Number: <?php echo form_input('plant_patent_number', $row->plant_patent_number); ?></li>
        <li>Plant Patent Applied For (PPAF): <?php echo form_input('plant_patent_number_applied_for', $row->plant_patent_number_applied_for); ?></li>
        <li>Plant Breeders Rights: <?php echo form_input('plant_breeders_rights', $row->plant_breeders_rights); ?></li>
        <li>Origin: <?php echo form_input('plant_origin', $row->plant_origin); ?></li>
        <li>Native to GPP region: <?php echo form_input('native_to_gpp_region', $row->native_to_gpp_region); ?></li>
        <li>Plant Type: <?php echo form_input('plant_type', $row->plant_type); ?></li>
        <li>Foliage Type: <?php echo form_input('foliage_type', $row->foliage_type); ?></li>
        <li>Growth Habit: <?php echo form_input('growth_habit', $row->growth_habit); ?></li>
        <li>Growth Rate: <?php echo form_input('growth_rate', $row->growth_rate); ?></li>
        <li>Foliage Texture: <?php echo form_input('foliage_texture', $row->foliage_texture); ?></li>
        <li>Foliage Notes: <?php echo form_input('foliage_notes', $row->foliage_notes); ?></li>
        <li>Flower Showy: <?php echo form_input('flower_showy', $row->flower_showy); ?></li>
        <li>Flower Time: <?php echo form_input('flower_time', $row->flower_time); ?></li>
        <li>Flower Time Length: <?php echo form_input('flower_time_length', $row->flower_time_length); ?></li>
        <li>Fruit/Seedhead Attractive: <?php echo form_input('fruit_seedhead_attractive', $row->fruit_seedhead_attractive); ?></li>
        <li>Fragrance: <?php echo form_input('fragrance', $row->fragrance); ?></li>
        <li>Seasonal Interest: <?php echo form_input('seasonal_interest', $row->seasonal_interest); ?></li>
        <li>Bark Interest: <?php echo form_input('bark_interest', $row->bark_interest); ?></li>
        <li>Plant Width at 10: <?php echo form_input('plant_width_at_10', $row->plant_width_at_10); ?></li>
        <li>Plant Height at 10: <?php echo form_input('plant_height_at_10', $row->plant_height_at_10); ?></li>
        <li>Plant Width Maximum: <?php echo form_input('plant_width_max', $row->plant_width_max); ?></li>
        <li>Plant Height Maximum: <?php echo form_input('plant_height_max', $row->plant_height_max); ?></li>
        <li>Zone (Low): <?php echo form_input('zone_low', $row->zone_low); ?></li>
        <li>Zone (High): <?php echo form_input('zone_high', $row->zone_high); ?></li>
        <li>Growing Notes: <?php echo form_input('growing_notes', $row->growing_notes); ?></li>
        <li>Culture Notes: <?php echo form_input('culture_notes', $row->culture_notes); ?></li>
        <li>Qualities: <?php echo form_input('qualities', $row->qualities); ?></li>
        <li>Plant Combinations: <?php echo form_input('plant_combinations', $row->plant_combinations); ?></li>
        <li>Nominated By: <?php echo form_input('nominator', $row->nominator); ?></li>
        <li>Nominated For Year: <?php echo form_input('nominated_for_year', $row->nominated_for_year); ?></li>
        <li>Committee: <?php echo form_input('committee', $row->committee); ?></li>
        <li>Advisory Group: <?php echo form_input('advisory_group', $row->advisory_group); ?></li>
        <li>Plant Evaluation or Trial:  <?php echo form_input('eval_trial', $row->eval_trial); ?></li>
        <li>References/Name Validation:  <?php echo form_input('gpp_references', $row->gpp_references); ?></li>
        <li>Status: <?php echo form_input('status', $row->status); ?></li>
        <li>Evalution Available: <?php echo form_input('evaluation_available', $row->evaluation_available); ?></li>
        <li>GPP History: <?php echo form_input('gpp_history', $row->gpp_history); ?></li>
        <li>GPP Year: <?php echo form_input('gpp_year', $row->gpp_year); ?></li>
        <li>Theme: <?php echo form_input('theme', $row->theme); ?></li>
        <li>Programmed Search: <?php echo form_input('programmed_search', $row->programmed_search); ?></li>
        <li>Geek Notes: <?php echo form_input('geek_notes', $row->geek_notes); ?></li>
        <li>Publish: <?php echo form_input('publish', $row->publish); ?></li>
        <li>Sort: <?php echo form_input('sort', $row->sort); ?></li>
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
