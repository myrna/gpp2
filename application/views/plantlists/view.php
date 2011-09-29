<!-- display for PUBLIC plant list and search function -->

<div id="content" class="view">
    <div id="printhead">
        <img src="../assets/logo-print.gif">
        <p class="copy first">&#169;2001-<?php echo date("Y"); ?></p>
        <p class="copy">Great Plant Picks</p>
        <p class="copy"><a href="http://www.greatplantpicks.org">www.greatplantpicks.org</a></p>
    </div>
<div id="printview">
   <a class="print" href="javascript: void(0)" title="Back to Web View" id="gppstyles">Back to Web View</a>
   <a class="web" href="javascript: void(0)" title="Print View" id="gppstyles1">Print View</a>

  </div>
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
    
    <?php } ?>
    
    <div id="imageview">
    
    <?php  {
        if (!empty($primary_image)) {
        echo "<div class='thumbnail'>" . image_view_link($primary_image['filename']) .
         "<p>&#169; " . $primary_image['copyright'] . " " . $primary_image['photographer'] . "</p></div>" ;
        }
        if (!empty($detail_image)) {
        echo "<div class='thumbnail'>" . image_view_link($detail_image['filename']) .
         "<p>&#169; " . $detail_image['copyright'] . " " . $detail_image['photographer'] . "</p></div>";
        }
        if (!empty($landscape_image)) {
         echo "<div class='thumbnail'>" . image_view_link($landscape_image['filename']) .
         "<p>&#169; " . $landscape_image['copyright'] . " " . $landscape_image['photographer'] . "</p></div>";
        }
    }
    ?>
       
   <img class="<?php echo image_class($primary_image['filename']) ?>" src="<?php echo image_url($primary_image['filename']) ?>" alt="" id="main-img" />
     </div><!-- end image view -->
     
    <div class="plantinfo">
    <?php
        echo "<h3>" . $details->plant_type;
        if (!empty($common_names)) {
            echo ", Common Name(s): ";
            foreach ($common_names as $common_name) {
                echo $common_name['common_name']." ";
                }
        echo "</h3>";
        }
    ?>
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

        echo "<h3>Plant Characteristics</h3>";
        echo "<p><em>Plant Height:</em> " . $details->plant_height_at_10 . " ft. (";
        echo feet_to_meters($details->plant_height_at_10) . " meters)</p>";
        echo "<p><em>Plant Width/Spread:</em> " . $details->plant_width_at_10 . " ft. (";
        echo feet_to_meters($details->plant_width_at_10) . " meters)</p>";
        echo "<p><em>Growth Habit:</em> " . $details->growth_habit . "</p>";

        if (!empty($plant_attributes['foliage_color'])) {
            echo "<p><em>Foliage:</em> ";
            echo implode($plant_attributes['foliage_color'], ', ');
        }
        if (!empty($plant_attributes['foliage_texture'])) {
            echo ' ' . implode($plant_attributes['foliage_texture'], ', ');
        }

        if (!empty($plant_attributes['flower_color'])) {
            echo "<p><em>Flower Color:</em> ";
            echo implode($plant_attributes['flower_color'], ', ');
        }        

        echo "<p><em>Flowering Time:</em> " . $details->flower_time . "</p>";
        
        echo "<h3>Plant Culture</h3>";

        if (!empty($plant_attributes['sun'])) {
            echo "<p><em>Sun/Light Exposure:</em> ";
            echo implode($plant_attributes['sun'], ', ');
        }

        if (!empty($plant_attributes['water'])) {
            echo "<p><em>Water Requirements:</em> ";
            echo implode($plant_attributes['water'], ', ');
        }

        if (!empty($plant_attributes['soil'])) {
            echo "<p><em>Soil Requirements:</em> ";
            echo implode($plant_attributes['soil'], ', ');
        }

        if (!empty($details->seasonal_interest))  {
             echo "<p><em>Seasonal Interest:</em> " . $details->seasonal_interest;
        }
        
        if (!empty($plant_attributes['design_use'])) {
            echo "<p><em>Design Use:</em> ";
            echo implode($plant_attributes['design_use'], ', ');
        }

        echo "<p><em>Plant Combinations:</em> " . $details->plant_combinations;

        if (!empty($plant_attributes['wildlife'])) {
            echo "<p><em>Wildlife Associations:</em> ";
            echo implode($plant_attributes['wildlife'], ', ');
        }

        if (!empty($plant_attributes['pest_resistance'])) {
            echo "<p><em>Resistant to:</em> ";
            echo implode($plant_attributes['pest_resistance'], ', ');
        }

        echo "<p><em>Hardiness:</em> USDA Zones " . $details->zone_low . " to " . $details->zone_high;
                
        echo "<dl><dt>Culture Notes</dt><dd>";
        echo $details->culture_notes;
        echo "</dd><dt>Growing Habit</dt><dd>";
        echo $details->growing_notes;
        echo "</dd></dl>";
        if (!empty($details->geek_notes)) {
            echo "<h3>Geek Notes</h3>";
            echo $details->geek_notes;
        }
        if (!empty($details->plant_origin)) {
            echo "<p><em>Origin: " . $details->plant_origin . "</p>";
            }

    ?>
 
    </div><!-- end plantinfo -->
    <div class="clear"></div>
</div><!-- end content -->

