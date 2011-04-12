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
        <li>Plant Family: <?php echo form_input('Family'); ?></li>
        <li>Genus: <?php echo form_input('Genus'); ?></li>
        <li>Cross Genus: <?php echo form_input('CrossGenus'); ?></li>
        <li>Species: <?php echo form_input('Species'); ?></li>
        <li>Subspecies: <?php echo form_input('Subspecies'); ?></li>
        <li>Cross Species: <?php echo form_input('CrossSpecies'); ?></li>
        <li>Variety: <?php echo form_input('Variety'); ?></li>
        <li>Cultivar: <?php echo form_input('Cultivar'); ?></li>
        <li>Trade Name: <?php echo form_input('TradeName'); ?></li>
        <li>Registered Name: <?php echo form_input('RegisteredName'); ?></li>
        <li>Plant Group: <?php echo form_input('PlantGroup'); ?></li>
        <li>Synonym: <?php echo form_input('Synonym'); ?></li>
        <li>Origin: <?php echo form_input('Origin'); ?></li>
        <li>Plant Type: <?php echo form_input('PlantType'); ?></li>
        <li>Foliage Type: <?php echo form_input('FoliageType'); ?></li>
        <li>Growth Habit: <?php echo form_input('GrowthHabit'); ?></li>
        <li>Foliage Color: <?php echo form_input('FoliageColor'); ?></li>
        <li>Flower Color: <?php echo form_input('FlowerColor'); ?></li>
        <li>Flower Time: <?php echo form_input('FlowerTime'); ?></li>
        <li>Sun Requirements: <?php echo form_input('Sun'); ?></li>
        <li>Soil Requirements: <?php echo form_input('Soil'); ?></li>
        <li>Water Needs: <?php echo form_input('Water'); ?></li>
        <li>Plant Width (feet): <?php echo form_input('PlantWidth'); ?></li>
        <li>Plant Height (feet): <?php echo form_input('PlantHeight'); ?></li>
        <li>Zone (Low): <?php echo form_input('ZoneLow'); ?></li>
        <li>Zone (High): <?php echo form_input('ZoneHigh'); ?></li>
        <li>Culture: <?php echo form_input('Culture'); ?></li>
        <li>Qualities: <?php echo form_input('Qualities'); ?></li>
        <li>Design Use: <?php echo form_input('DesignUse'); ?></li>
        <li>Wildlife: <?php echo form_input('Wildlife'); ?></li>
        <li>Nominated By: <?php echo form_input('NominatedBy'); ?></li>
        <li>Nominated For Year: <?php echo form_input('NominatedForYear'); ?></li>
        <li>Status: <?php echo form_input('Status'); ?></li>
        <li>Year: <?php echo form_input('Year'); ?></li>
        <li>Theme: <?php echo form_input('Theme'); ?></li>
        <li>Publish: <?php echo form_input('Publish'); ?></li>
        <li>Tag: <?php echo form_input('Tag'); ?></li>
    </ul>
    <?php echo form_submit('add', 'Add Record'); ?>

</body>
