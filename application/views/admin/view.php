<!-- Database Administration View Single Record -->
    <h1><?php echo $title ?></h1>
    <?php
    if($row == FALSE)
    {
        echo "The record does not exist";
    }
 else
    {
     ?>
    <ul>
        <li>Plant ID: <?php echo $row->id; ?></li>
        <li>Plant Family: <?php echo $row->family; ?></li>
        <li>Genus: <?php echo $row->genus; ?></li>
        <li>&#935; Genus: <?php echo $row->cross_genus; ?></li>
        <li>Specific epithet: <?php echo $row->specific_epithet; ?></li>
        <li>Infraspecific epithet designator (ssp., f., var.): <?php echo $row->infraspecific_epithet_designator; ?></li>
        <li>Infraspecific epithet: <?php echo $row->infraspecific_epithet; ?></li>
        <li>&times; species: <?php echo $row->cross_species; ?></li>
        <li>Plant Group: <?php echo $row->plantname_group; ?></li>
        <li>Cultivar: <?php echo $row->cultivar; ?></li>
        <li>Trade Name: <?php echo $row->trade_name; ?></li>
        <li>Registered: <?php echo $row->registered; ?></li>
        <li>Trademark: <?php echo $row->trademark; ?></li>
        <li>Plant Patent Number: <?php echo $row->plant_patent_number; ?></li>
        <li>Plant Patent Applied For (PPAF): <?php echo $row->plant_patent_number_applied_for; ?></li>
        <li>Plant Breeders Rights: <?php echo $row->plant_breeders_rights; ?></li>
        <li>Origin: <?php echo $row->plant_origin; ?></li>
        <li>Native to GPP region: <?php echo $row->native_to_gpp_region; ?></li>
        <li>Plant Type: <?php echo $row->plant_type; ?></li>
        <li>Foliage Type: <?php echo $row->foliage_type; ?></li>
        <li>Growth Habit: <?php echo $row->growth_habit; ?></li>
        <li>Growth Rate: <?php echo $row->growth_rate; ?></li>
        <li>Foliage Texture: <?php echo $row->foliage_texture; ?></li>
        <li>Foliage Notes: <?php echo $row->foliage_notes; ?></li>
        <li>Flower Showy: <?php echo $row->flower_showy; ?></li>
        <li>Flower Time: <?php echo $row->flower_time; ?></li>
        <li>Flower Time Length: <?php echo $row->flower_time_length; ?></li>
        <li>Fruit/Seedhead Attractive: <?php echo $row->fruit_seedhead_attractive; ?></li>
        <li>Fragrance: <?php echo $row->fragrance; ?></li>
        <li>Seasonal Interest: <?php echo $row->seasonal_interest; ?></li>
        <li>Bark Interest: <?php echo $row->bark_interest; ?></li>
        <li>Plant Width at 10: <?php echo $row->plant_width_at_10; ?></li>
        <li>Plant Height at 10: <?php echo $row->plant_height_at_10; ?></li>
        <li>Plant Width Maximum: <?php echo $row->plant_width_max; ?></li>
        <li>Plant Height Maximum: <?php echo  $row->plant_height_max; ?></li>
        <li>Zone (Low): <?php echo $row->zone_low; ?></li>
        <li>Zone (High): <?php echo $row->zone_high; ?></li>
        <li>Growing Notes: <?php echo $row->growing_notes; ?></li>
        <li>Culture Notes: <?php echo $row->culture_notes; ?></li>
        <li>Qualities: <?php echo $row->qualities; ?></li>
        <li>Plant Combinations: <?php echo  $row->plant_combinations; ?></li>
        <li>Nominated By: <?php echo $row->nominator; ?></li>
        <li>Nominated For Year: <?php echo $row->nominated_for_year; ?></li>
        <li>Committee: <?php echo $row->committee; ?></li>
        <li>Advisory Group: <?php echo $row->advisory_group; ?></li>
        <li>Plant Evaluation or Trial:  <?php echo $row->eval_trial; ?></li>
        <li>References/Name Validation:  <?php echo $row->gpp_references; ?></li>
        <li>Status: <?php echo $row->status; ?></li>
        <li>Evalution Available: <?php echo $row->evaluation_available; ?></li>
        <li>GPP History: <?php echo $row->gpp_history; ?></li>
        <li>GPP Year: <?php echo $row->gpp_year; ?></li>
        <li>Theme: <?php echo $row->theme; ?></li>
        <li>Programmed Search: <?php echo $row->programmed_search; ?></li>
        <li>Geek Notes: <?php echo $row->geek_notes; ?></li>
        <li>Publish: <?php echo $row->publish; ?></li>
        <li>Sort: <?php echo  $row->sort; ?></li>
    </ul>
    <?php
    }
    ?>
<a href="javascript:history.back()">Back</a>

