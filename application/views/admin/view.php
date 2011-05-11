<!DOCTYPE html>
<html>
<head>
	<title>View Single Record</title>
         </head>
<body>
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
        <li>Cross Genus: <?php echo $row->cross_genus; ?></li>
        <li>Species: <?php echo $row->species; ?></li>
        <li>Subspecies: <?php echo $row->subspecies; ?></li>
        <li>Cross Species: <?php echo $row->cross_species; ?></li>
        <li>Variety: <?php echo $row->variety; ?></li>
        <li>Cultivar: <?php echo $row->cultivar; ?></li>
        <li>Trade Name: <?php echo $row->trade_name; ?></li>
        <li>Registered Name: <?php echo $row->registered_name; ?></li>
        <li>Plant Group: <?php echo $row->plantname_group; ?></li>
        <li>Synonym: <?php echo $row->synonym; ?></li>
        <li>Origin: <?php echo $row->plant_origin; ?></li>
        <li>Plant Type: <?php echo $row->plant_type; ?></li>
        <li>Foliage Type: <?php echo $row->foliage_type; ?></li>
        <li>Growth Habit: <?php echo $row->growth_habit; ?></li>
        <li>Foliage Color: <?php echo $row->foliage_color; ?></li>
        <li>Flower Color: <?php echo $row->flower_color; ?></li>
        <li>Flower Time: <?php echo $row->flower_time; ?></li>
        <li>Sun Requirements: <?php echo $row->sun; ?></li>
        <li>Soil Requirements: <?php echo $row->soil; ?></li>
        <li>Water Needs: <?php echo $row->water; ?></li>
        <li>Plant Width (feet): <?php echo $row->plant_width; ?></li>
        <li>Plant Height (feet): <?php echo $row->plant_height; ?></li>
        <li>Zone (Low): <?php echo $row->zone_low; ?></li>
        <li>Zone (High): <?php echo $row->zone_high; ?></li>
        <li>Culture: <?php echo $row->culture_notes; ?></li>
        <li>Qualities: <?php echo $row->qualities; ?></li>
        <li>Design Use: <?php echo $row->design_use; ?></li>
        <li>Wildlife: <?php echo $row->wildlife; ?></li>
        <li>Nominated By: <?php echo $row->nominator; ?></li>
        <li>Status: <?php echo $row->status; ?></li>
        <li>Year: <?php echo $row->gpp_year; ?></li>
        <li>Theme: <?php echo $row->theme; ?></li>
        <li>Publish: <?php echo $row->publish; ?></li>
        <li>Sort: <?php echo $row->sort; ?></li>
        <li>Images: <?php echo $row->image_id; ?></li>
    </ul>
    <?php
    }
    ?>
<a href="javascript:history.back()">Back</a>



</body>
</html>