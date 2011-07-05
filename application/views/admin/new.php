<!-- Database Administration Add New Record View -->
<div id="content" class="admin">
    <h2>GPP Database Administration: Add New Record</h2>
    <p class="nav"><?php
       echo anchor('/listplants', 'Return to Main List');
    ?></p>
    <?php
    $attributes = array('class' => 'data-entry');
   echo form_open('crud/add', $attributes);

    ?>
    <?php echo $this->session->flashdata('status'); ?>
    <ul>
         <li>Plant Family: <?php echo form_input('family'); ?></li>
        <li>Genus: <?php echo form_input('genus'); ?></li>
        <li>&#935; Genus: <?php echo form_input('cross_genus'); ?></li>
        <li>Specific epithet: <?php echo form_input('specific_epithet'); ?></li>
        <li>Infraspecific epithet designator (ssp., f., var.): <?php echo form_input('infraspecific_epithet_designator'); ?></li>
        <li>Infraspecific epithet: <?php echo form_input('infraspecific_epithet'); ?></li>
        <li>&times; species: <?php echo form_input('cross_species'); ?></li>
        <li>Plant Group: <?php echo form_input('plantname_group'); ?></li>
        <li>Cultivar: <?php echo form_input('cultivar'); ?></li>
        <li>Trade Name: <?php echo form_input('trade_name'); ?></li>
        <li>Registered: <?php echo form_input('registered'); ?></li>
        <li>Trademark: <?php echo form_input('trademark'); ?></li>
        <li>Plant Patent Number: <?php echo form_input('plant_patent_number'); ?></li>
        <li>Plant Patent Applied For (PPAF): <?php echo form_input('plant_patent_number_applied_for'); ?></li>
        <li>Plant Breeders Rights: <?php echo form_input('plant_breeders_rights'); ?></li>
        <li>Origin: <?php echo form_input('plant_origin'); ?></li>
        <li>Native to GPP region: <?php echo form_input('native_to_gpp_region'); ?></li>
        <li>Plant Type: <?php echo form_input('plant_type'); ?></li>
        <li>Foliage Type: <?php echo form_input('foliage_type'); ?></li>
        <li>Growth Habit: <?php echo form_input('growth_habit'); ?></li>
        <li>Growth Rate: <?php echo form_input('growth_rate'); ?></li>
        <li>Foliage Texture: <?php echo form_input('foliage_texture'); ?></li>
        <li>Foliage Notes: <?php echo form_input('foliage_notes'); ?></li>
        <li>Flower Showy: <?php echo form_input('flower_showy'); ?></li>
        <li>Flower Time: <?php echo form_input('flower_time'); ?></li>
        <li>Flower Time Length: <?php echo form_input('flower_time_length'); ?></li>
        <li>Fruit/Seedhead Attractive: <?php echo form_input('fruit_seedhead_attractive'); ?></li>
        <li>Fragrance: <?php echo form_input('fragrance'); ?></li>
        <li>Seasonal Interest: <?php echo form_input('seasonal_interest'); ?></li>
        <li>Bark Interest: <?php echo form_input('bark_interest'); ?></li>
        <li>Plant Width at 10: <?php echo form_input('plant_width_at_10'); ?></li>
        <li>Plant Height at 10: <?php echo form_input('plant_height_at_10'); ?></li>
        <li>Plant Width Maximum: <?php echo form_input('plant_width_max'); ?></li>
        <li>Plant Height Maximum: <?php echo form_input('plant_height_max'); ?></li>
        <li>Zone (Low): <?php echo form_input('zone_low'); ?></li>
        <li>Zone (High): <?php echo form_input('zone_high'); ?></li>
        <li>Growing Notes: <?php echo form_input('growing_notes'); ?></li>
        <li>Culture Notes: <?php echo form_input('culture_notes'); ?></li>
        <li>Qualities: <?php echo form_input('qualities'); ?></li>
        <li>Plant Combinations: <?php echo form_input('plant_combinations'); ?></li>
        <li>Nominated By: <?php echo form_input('nominator'); ?></li>
        <li>Nominated For Year: <?php echo form_input('nominated_for_year'); ?></li>
        <li>Committee: <?php echo form_input('committee'); ?></li>
        <li>Advisory Group: <?php echo form_input('advisory_group'); ?></li>
        <li>Plant Evaluation or Trial:  <?php echo form_input('eval_trial'); ?></li>
        <li>References/Name Validation:  <?php echo form_input('gpp_references'); ?></li>
        <li>Status: <?php echo form_input('status'); ?></li>
        <li>Evaluation Available: <?php echo form_input('evaluation_available'); ?></li>
        <li>GPP History: <?php echo form_input('gpp_history'); ?></li>
        <li>GPP Year: <?php echo form_input('gpp_year'); ?></li>
        <li>Theme: <?php echo form_input('theme'); ?></li>
        <li>Programmed Search: <?php echo form_input('programmed_search'); ?></li>
        <li>Geek Notes: <?php echo form_input('geek_notes'); ?></li>
        <li>Publish: <?php echo form_input('publish'); ?></li>
        <li>Sort: <?php echo form_input('sort'); ?></li>
        <li>Common Name: <?php echo form_input('common_name'); ?></li>
        <li><p>Flower Color:</p>
            <?php foreach ($flower_color_fields as $row) { ?>

            <?php
                $flower_color_data = array(
                    'name' => "flower_color[]",
                    'id' => $row->flower_color,
                    'value' => $row->id
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
                    'value' => $row->id
                );
                echo "<span class='formcheck'>";
                echo form_checkbox($design_use_data);
                echo form_label($row->design_use, $row->design_use);
                echo "</span>";
            } ?>
                </li>
        <li><p> Water:</p>
            <?php foreach ($water_fields as $row) { ?>
            
            <?php       $water_data = array(
                        'name' => "water[]",
                        'id' => $row->water,
                        'value' => $row->id
                    ); ?>
            
            <?php
                    echo "<span class='formcheck'>";
                    echo form_checkbox($water_data);
                    echo form_label($row->water, $row->water);
                    echo "</span>";
                } ?>
            </li>

        <li><p>Sun:</p>
            <?php foreach ($sun_fields as $row) { ?>
            
            <?php
                $sun_data = array(
                    'name' => "sun[]",
                    'id' => $row->sun,
                    'value' => $row->id
                     );
                echo "<span class='formcheck'>";
                echo form_checkbox($sun_data);
                echo form_label($row->sun, $row->sun);
                echo "</span>";
            } ?>
            </li>
        <li><p>Soil:</p>
            <?php foreach ($soil_fields as $row) { ?>
               
            <?php
                $soil_data = array(
                    'name' => "soil[]",
                    'id' => $row->soil,
                    'value' => $row->id
                     );
                echo "<span class='formcheck'>";
                echo form_checkbox($soil_data);
                echo form_label($row->soil, $row->soil);
                echo "</span>";
            } ?>

               </li>
        <li><p>Wildlife:</p>
            <?php foreach ($wildlife_fields as $row) { ?>
               
            <?php
                $wildlife_data = array(
                    'name' => "wildlife[]",
                    'id' => $row->wildlife,
                    'value' => $row->id
                   );
                echo "<span class='formcheck'>";
                echo form_checkbox($wildlife_data);
                echo form_label($row->wildlife, $row->wildlife);
                echo "</span>";
            } ?>

                </li>

        <li><p>Pest Resistance:</p>
            <?php foreach ($pest_resistance_fields as $row) { ?>
              
            <?php
                $pest_resistance_data = array(
                    'name' => "pest_resistance[]",
                    'id' => $row->pest_resistance,
                    'value' => $row->id
                      );
                echo "<span class='formcheck'>";
                echo form_checkbox($pest_resistance_data);
                echo form_label($row->pest_resistance, $row->pest_resistance);
                echo "</span>";
            } ?>

                </li>
        
    </ul>
    <?php echo form_submit('add', 'Add Record'); ?>
</div><!-- end content -->
