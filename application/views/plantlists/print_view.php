<!-- print display for PUBLIC plant list and search function -->
 <div class="printview"><input class="print-this" type="button" onClick="window.print()" value="Print Fact Sheet" />
     <input class="print-this" type="button" onClick="history.go(-1)" value="Back to Web View" />
</div>
<div id="content" class="view">  
 <div id="printhead">
        <div id="logo">
            <img src="../assets/logo-print.gif">
        </div>

    </div><!-- end logo -->
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
   
    <?php 
        if (!empty($common_names)) {
            foreach ($common_names as $common_name) {
                echo " <h2 class='common'>" . $common_name['common_name'] . "</h2>";
                }
                }               
    ?>
    <div class="plantinfo">
    <div id="imageview">
        
   <?php if (!empty($primary_image)) echo "<img src=" . image_url($primary_image['filename']) . " alt='' />" ?>
   <?php if (!empty($primary_image['copyright'])) echo "<p class='copy'>&#169; " . $primary_image['copyright'] . "</p>" ?>
     </div><!-- end image view -->
     
     
<?php
            if (!empty($synonyms)) {
            echo "<h6><em>Synonyms:</em> ";
            foreach ($synonyms as $synonym) {
                echo display_full_botanical_name($synonym);
                echo "</h6>";
            }
        }
    ?>
<?php
        echo "<h3>Outstanding Qualities</h3>";
        echo "<p>". $details->qualities . "</p>";

        echo "<div class='quickfacts'><h3>Quick Facts</h3>";
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
       
        if (!empty($details->seasonal_interest))  {
             echo "<p><em>Seasonal Interest:</em> " . $details->seasonal_interest . "</p>";
        }
         if (!empty($plant_attributes['wildlife'])) {
            echo "<p><em>Wildlife Associations:</em> ";
            echo implode($plant_attributes['wildlife'], ', ');
        }

        if (!empty($plant_attributes['pest_resistance'])) {
            echo "<p><em>Resistant to:</em> ";
            echo implode($plant_attributes['pest_resistance'], ', ');
        }
        echo "</div><!-- end quick facts -->
            <div class='clear'></div>
            <div class='quickfacts'><h3>Colors &amp; Combos</h3>";
        if (!empty($details->plant_combinations))  {
        echo "<p><em>Great Plant Combinations:</em> " . $details->plant_combinations . "</p>";
        }
        if (!empty($details->color_contrast))  {
        echo "<p><em>Great Color Contrasts:</em> " . $details->color_contrast;
        }

        if (!empty($details->color_partners))  {
        echo "<p><em>Great Color Partners:</em> " . $details->color_partners;
        }
       
              
        echo "</div><div class='plantdetails'><dl><dt class='lead'>Culture Notes</dt><dd>";
        echo $details->culture_notes;
        if (!empty($details->geek_notes)) {
            echo "<dt>Geek Notes</dt><dd>";
            echo $details->geek_notes;
            echo "</dd><dt>";
        }
       
    ?>
    </div><!-- end plant details -->
    </div><!-- end plantinfo -->
   
    <div class="pagebreak"></div>
</div><!-- end content -->

