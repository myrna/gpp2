<!-- print display for PUBLIC plant list and search function -->
 <div class="printview"><input class="print-this" type="button" onClick="window.print()" value="Print Fact Sheet" />
     <input class="print-this" type="button" onClick="history.go(-1)" value="Back to Web View" />
</div>
<div id="content" class="view">  
    <div class="printhead">
        <div id="logo">
            <img src="../assets/logo-print.gif">
        </div><!-- end logo-->


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
    </div><!-- end head -->
    <div class="plantinfo">
  
     
<?php
        echo "<h3>Outstanding Qualities</h3>";
        echo "<p>". $details->qualities . "</p>";
        ?>
        <h3 class="drop">Colors &amp; Combos</h3>
 <?php
        if (!empty($details->plant_combinations))  {
        echo "<p><em>Great Plant Combinations:</em> " . $details->plant_combinations . "</p>";
        }
        if (!empty($details->color_contrast))  {
        echo "<p><em>Great Color Contrasts:</em> " . $details->color_contrast;
        }

        if (!empty($details->color_partners))  {
        echo "<p><em>Great Color Partners:</em> " . $details->color_partners;
        }
       ?>
        <h3 class="drop">Culture Notes</h3>
 <?php
        if (!empty($details->culture_notes))
        echo $details->culture_notes;
        ?>
        <div class="clear"></div>
 <div id="imageview">

   <?php if (!empty($primary_image)) echo "<img src=" . image_url($primary_image['filename']) . " alt='' />" ?>
   <?php if (!empty($primary_image['copyright'])) echo "<p class='copy'>&#169; " . $primary_image['copyright'] . "</p>" ?>
     </div><!-- end image view -->

     <div class="quickfacts"><h3>Quick Facts</h3>

      <?php
        echo "<p><em>Plant Type:</em> " . $details->growth_habit . " " . $details->plant_type . "</p>";
        echo "<p><em>Foliage Type:</em> " . $details->foliage_type . "</p>";
        echo "<p><em>Plant Height:</em> " . feet_to_feet_inches($details->plant_height_at_10) . " (";
        echo feet_to_meters2($details->plant_height_at_10) . " m.)</p>";
        echo "<p><em>Plant Width/Spread:</em> " . feet_to_feet_inches($details->plant_width_at_10) . " (";
        echo feet_to_meters2($details->plant_width_at_10) . " m.)</p>";
        $category = $details->plant_type;
        if ($category==tree || $category==shrub || $category==conifer || $category==bamboo || $category==vine) {
            echo "<p><em>Mature Plant Height:</em> " . feet_to_feet_inches($details->plant_height_max) . " (";
            echo feet_to_meters2($details->plant_height_max) . " meters)</p>";
            echo "<p><em>Mature Plant Width:</em> " . feet_to_feet_inches($details->plant_width_max) . " (";
            echo feet_to_meters2($details->plant_width_max) . " meters)</p>";
        }
        else {};
        echo "<p><em>Hardiness:</em> USDA Zones " . $details->zone_low . " to " . $details->zone_high . "</p>";
       
        if (!empty($plant_attributes['flower_color'])) {
            echo "<p><em>Flower Color:</em> ";
            echo implode($plant_attributes['flower_color'], ', ');
        }        
        echo "<p><em>Sun/Light Exposure:</em> " . $details->sun_exposure . "</p>";
        echo "<p><em>Water Requirements:</em> " . $details->water_requirements . "</p>";
        ?>
     </div><!-- end quickfacts -->
    </div><!-- end plantinfo -->
   
</div><!-- end content -->

