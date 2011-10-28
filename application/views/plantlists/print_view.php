<!-- print display for PUBLIC plant list and search function -->

<div id="content" class="view">
    <div id="printview"><?php echo anchor('plantlists/view/' . $id, "Back to Web View"); ?></div>
    <div id="printhead">
        <img src="../assets/logo-print.gif">
        <p class="logo first">&#169;2001-<?php echo date("Y"); ?></p>
        <p class="logo">Great Plant Picks</p>
        <p class="logo"><a href="http://www.greatplantpicks.org">www.greatplantpicks.org</a></p>
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
   
    <h2>
    <?php
        echo display_full_botanical_name($row);
        }
    ?></h2>
    <h2 class="common">
    <?php 
        if (!empty($common_names)) {
            foreach ($common_names as $common_name) {
                echo $common_name['common_name'];
                }
                }               
    ?>
    </h2>
    <div id="imageview">
        
   <?php if (!empty($primary_image)) echo "<img src=" . image_url($primary_image['filename']) . " alt='' />" ?>
   <?php if (!empty($primary_image['copyright'])) echo "<p class='copy'>&#169; " . $primary_image['copyright'] . "</p>" ?>
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
        echo "<p><em>Soil Requirements:</em> " . $details->soil_requirements . "</p>";

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
              
        echo "</div><!-- end plantinfo --><div class='plantdetails'><dl><dt>Culture Notes</dt><dd>";
        echo $details->culture_notes;
        echo "</dd><dt>Growing Habit</dt><dd>";
        echo $details->growing_notes;
        echo "</dd>";
        if (!empty($details->geek_notes)) {
            echo "<dt>Geek Notes</dt><dd>";
            echo $details->geek_notes;
            echo "</dd><dt>";
        }
       
    ?>
 
    </div><!-- end plantdetails -->
    <div class="pagebreak"></div>
</div><!-- end content -->

