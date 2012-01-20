<!-- display for PUBLIC plant list and search function -->

<div id="content" class="view">
    
<div id="printview"><?php echo anchor('plantlists/print_view/' . $id, "Printer-Friendly View"); ?></div>
    <?php
    if($row == FALSE)
    {
        echo "The record does not exist"; ?>
        <?php
    }
 else
    {
        ?>
    <div class="titles">
    <h5>
    <?php
        echo display_full_botanical_name($row);
        }
    ?></h5>
   
    <?php
        if (!empty($common_names)) {
            foreach ($common_names as $common_name) {
                echo "<h5 class='common'>" . $common_name['common_name'] . "</h5>";
                }
                }
    ?>
    </div>
    <div id="imageview">
        <ul>
    <?php  {
        if (!empty($primary_image)) {
        echo "<li><div class='thumbnail'>" . image_view_link($primary_image['filename']) .
         "<p>&#169; " . $primary_image['copyright'] . "</p></div></li>" ;
        }
        if (!empty($detail_image)) {
        echo "<li><div class='thumbnail'>" . image_view_link($detail_image['filename']) .
         "<p>&#169; " . $detail_image['copyright'] . "</p></div></li>";
        }
        if (!empty($landscape_image)) {
         echo "<li><div class='thumbnail'>" . image_view_link($landscape_image['filename']) .
         "<p>&#169; " . $landscape_image['copyright'] . "</p></div></li>";
        }
    }
    ?>
        </ul>
   <img class="<?php echo image_class($primary_image['filename']) ?>" src="<?php echo image_url($primary_image['filename']) ?>" alt="" id="main-img" />
     </div><!-- end image view -->
     
    <div class="plantinfo">
   
<?php
            if (!empty($synonyms)) {
            echo "<p><em>Synonyms:</em> ";
            foreach ($synonyms as $synonym) {
                echo display_full_botanical_name($synonym);
                echo "</p>";
            }
        }
    ?>
<?php
        echo "<h3>Outstanding Qualities</h3>";
        echo "<p>". $details->qualities . "</p>";

        echo "<div class='quickfacts'>";
        echo "<h3>Quick Facts</h3>";
        echo "<p><em>Plant Type:</em> " . $details->growth_habit . " " . $details->plant_type . "</p>";
        echo "<p><em>Foliage Type:</em> " . $details->foliage_type . "</p>";
        echo "<p><em>Plant Height:</em> " . $details->plant_height_at_10 . " ft. (";
        echo feet_to_meters($details->plant_height_at_10) . " meters)</p>";
        echo "<p><em>Plant Width/Spread:</em> " . $details->plant_width_at_10 . " ft. (";
        echo feet_to_meters($details->plant_width_at_10) . " meters)</p>";
        echo "<p><em>Hardiness:</em> USDA Zones " . $details->zone_low . " to " . $details->zone_high . "</p>";
       
        if (!empty($plant_attributes['flower_color'])) {
            echo "<p><em>Flower Color:</em> ";
            echo implode($plant_attributes['flower_color'], ', ');
        }        
        if (!empty($plant_attributes['flower_time'])) {
        echo "<p><em>Flowering Time:</em> " . $details->flower_time . "</p>";
        }
        echo "<p><em>Sun/Light Exposure:</em> " . $details->sun_exposure . "</p>";
        echo "<p><em>Water Requirements:</em> " . $details->water_requirements . "</p>";
        /*echo "<p><em>Soil Requirements:</em> " . $details->soil_requirements . "</p>";*/
        
        if (!empty($details->seasonal_interest))  {
             echo "<p><em>Seasonal Interest:</em> " . $details->seasonal_interest;
        }
        
       /* if (!empty($plant_attributes['design_use'])) {
            echo "<p><em>Design Use:</em> ";
            echo implode($plant_attributes['design_use'], ', ');
        }*/
        if (!empty($details->plant_combinations))  {
        echo "<p><em>Plant Partners:</em> " . $details->plant_combinations;
        }

        if (!empty($details->color_contrast))  {
        echo "<p><em>Contrasting Colors:</em> " . $details->color_contrast;
        }

         if (!empty($details->color_partners))  {
        echo "<p><em>Color Partners:</em> " . $details->color_partners;
        }

        if (!empty($plant_attributes['wildlife'])) {
            echo "<p><em>Wildlife Associations:</em> ";
            echo implode($plant_attributes['wildlife'], ', ');
        }

        if (!empty($plant_attributes['pest_resistance'])) {
            echo "<p><em>Resistant to:</em> ";
            echo implode($plant_attributes['pest_resistance'], ', ');
        }
              
        echo "</div><!-- end quickfacts --></div><!-- end plantinfo --><div class='plantdetails'><dl><dt>Culture Notes</dt><dd>";
        echo $details->culture_notes;
        echo "</dd>";
        if (!empty($details->geek_notes)) {
            echo "<dt>Geek Notes</dt><dd>";
            echo $details->geek_notes;
            echo "</dd><dt>";
        }
       
    ?>
 
   
    <div class="clear"></div>
</div><!-- end content -->

