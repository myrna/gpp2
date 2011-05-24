<!DOCTYPE html>
<html>
<head>
	<title>Edit Record</title>
         </head>
<body>
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
        <li>Cross Genus: <?php echo form_input('cross_genus', $row->cross_genus); ?></li>
        <li>Cross Species: <?php echo form_input('cross_species', $row->cross_species); ?></li>
        <li>Cultivar: <?php echo form_input('cultivar', $row->cultivar); ?></li>
        <li>Trade Name: <?php echo form_input('trade_name', $row->trade_name); ?></li>
        <li>Plant Group: <?php echo form_input('plantname_group', $row->plantname_group); ?></li>
        <li>Origin: <?php echo form_input('plant_origin', $row->plant_origin); ?></li>
        <li>Plant Type: <?php echo form_input('plant_type', $row->plant_type); ?></li>
        <li>Foliage Type: <?php echo form_input('foliage_type', $row->foliage_type); ?></li>
        <li>Growth Habit: <?php echo form_input('growth_habit', $row->growth_habit); ?></li>
        <li>Foliage Color: <?php echo form_input('foliage_color', $row->foliage_color); ?></li>
        <li>Flower Color: <?php echo form_input('flower_color', $row->flower_color); ?></li>
        <li>Flower Time: <?php echo form_input('flower_time', $row->flower_time); ?></li>
        <li>Zone (Low): <?php echo form_input('zone_low', $row->zone_low); ?></li>
        <li>Zone (High): <?php echo form_input('zone_high', $row->zone_high); ?></li>
        <li>Culture: <?php echo form_input('culture_notes', $row->culture_notes); ?></li>
        <li>Qualities: <?php echo form_input('qualities', $row->qualities); ?></li>
        <li>Nominated By: <?php echo form_input('nominator', $row->nominator); ?></li>
        <li>Status: <?php echo form_input('status', $row->status); ?></li>
        <li>Year: <?php echo form_input('gpp_year', $row->gpp_year); ?></li>
        <li>Theme: <?php echo form_input('theme', $row->theme); ?></li>
        <li>Publish: <?php echo form_input('publish', $row->publish); ?></li>
        <li>Sort: <?php echo form_input('sort', $row->sort); ?></li>
    </ul>
    <?php echo form_submit('edit','Edit Record'); ?>
    <?php
    }
    ?>
<a href="javascript:history.back()">Back</a>



</body>
</html>