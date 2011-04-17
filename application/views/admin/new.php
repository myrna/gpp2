<!DOCTYPE html>
<html>
<head>
	<title>GPP Database New Record</title>
</head>
<body>
    <h2>Add new record</h2>
    <?php

   echo form_open('crud/add');

    ?>
    <ul>
        <li>Plant Family: <?php echo form_input('family'); ?></li>
        <li>Genus: <?php echo form_input('genus'); ?></li>
        <li>Cross Genus: <?php echo form_input('cross_genus'); ?></li>
        <li>Species: <?php echo form_input('species'); ?></li>
        <li>Subspecies: <?php echo form_input('subspecies'); ?></li>
        <li>Cross Species: <?php echo form_input('cross_species'); ?></li>
        <li>Variety: <?php echo form_input('variety'); ?></li>
        <li>Cultivar: <?php echo form_input('cultivar'); ?></li>
        <li>Trade Name: <?php echo form_input('trade_name'); ?></li>
        <li>Registered Name: <?php echo form_input('registered_name'); ?></li>
        <li>Plant Group: <?php echo form_input('plantname_group'); ?></li>
        <li>Synonym: <?php echo form_input('synonym'); ?></li>
        <li>Origin: <?php echo form_input('plant_origin'); ?></li>
        <li>Plant Type: <?php echo form_input('plant_type'); ?></li>
        <li>Foliage Type: <?php echo form_input('foliage_type'); ?></li>
        <li>Growth Habit: <?php echo form_input('growth_habit'); ?></li>
        <li>Foliage Color: <?php echo form_input('foliage_color'); ?></li>
        <li>Flower Color: <?php echo form_input('flower_color'); ?></li>
        <li>Flower Time: <?php echo form_input('flower_time'); ?></li>
        <li>Sun Requirements: <?php echo form_input('sun'); ?></li>
        <li>Soil Requirements: <?php echo form_input('soil'); ?></li>
        <li>Water Needs: <?php echo form_input('water'); ?></li>
        <li>Plant Width (feet): <?php echo form_input('plant_width'); ?></li>
        <li>Plant Height (feet): <?php echo form_input('plant_height'); ?></li>
        <li>Zone (Low): <?php echo form_input('zone_low'); ?></li>
        <li>Zone (High): <?php echo form_input('zone_high'); ?></li>
        <li>Culture: <?php echo form_input('culture_notes'); ?></li>
        <li>Qualities: <?php echo form_input('qualities'); ?></li>
        <li>Design Use: <?php echo form_input('design_use'); ?></li>
        <li>Wildlife: <?php echo form_input('wildlife'); ?></li>
        <li>Nominated By: <?php echo form_input('nominator'); ?></li>
        <li>Status: <?php echo form_input('status'); ?></li>
        <li>Year: <?php echo form_input('gpp_year'); ?></li>
        <li>Theme: <?php echo form_input('theme'); ?></li>
        <li>Publish: <?php echo form_input('publish'); ?></li>
        <li>Sort: <?php echo form_input('sort'); ?></li>
    </ul>
    <?php echo form_submit('add', 'Add Record'); ?>

</body>
