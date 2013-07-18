<?php //display for PUBLIC plant search results see CONTROLLER plantlists.php and MODEL plantlists_model.php ?>
<div id="content" class="view">
 
    <h2>Great Plant Picks Search Results</h2>
   
<p class="center">Found <?php echo $stats; ?> total plants <span class="click">(click column to sort)</span></p>
 <?php
    echo "<span class='clear-search'>".anchor('/plantlists/advanced/', "Back to Advanced Search") . " | " . anchor('/plantlists/search', "Back to Lists") .
            " | <a href='#' onclick='window.print();return false;'>Print List</a></span>";
        ?>
    <div class="simplesearch">
    <?php
     	$attributes = array('class' => 'searchform');
      	echo form_open('plantlists', $attributes);
	?>
   <p>Search by plant name:
    <input type="text" name="searchterms" id="searchterms" value="Enter botanical or common name">
   <input type="submit" value="Search"></p>
   <?php echo form_close(); ?>
    </div><!-- end searchform -->
   
   
   
    <p class="mail"> <a class="email" href="mailto:?subject=Great Plant Picks Plant List&body=[sub]"
           onclick="this.href = this.href.replace('[sub]',window.location)">Email this list</a>
        or copy and paste the address at the top of your browser into your favorite email program to share it</p>
 <h5 class="results-head"><?php // customize heading to search terms 
        $sort = $this->uri->segment(2);
        $name = $this->uri->segment(3);
        if ($sort=="by_publish" && $name=="yes") echo "All Great Plant Picks";
        elseif ($sort=="by_plant_type") echo "All " . $name . "s";
        elseif ($sort=="by_year") echo "Great Plant Picks for " . $name;
        elseif ($sort=="by_theme" && $name=="shade") echo "Made in the Shade Plant Picks";
        elseif ($sort=="made_in_the_shade") echo "Made in the Shade: " . $name . "s";
        elseif ($name=="light_shade") echo "Plants for Light Shade";
        elseif ($name=="open_shade") echo "Plants for Open Shade";
        elseif ($name=="dappled_shade") echo "Plants for Dappled Shade";
        elseif ($name=="deep_shade") echo "Plants for Deep Shade";
        elseif ($sort=="dry_shade") echo "Plants for Dry Shade";
        elseif ($sort=="by_theme" && $name=="foliage") echo "Fantastic Foliage Plant Picks";
        elseif ($sort=="fantastic_foliage") echo "Fantastic " . $name . " Foliage";
        elseif ($sort=="fantastic_foliage_color") echo "Fantastic " . $name . " Foliage";
        elseif ($sort=="by_theme" && $name=="sun_drought") echo "Fun in the Sun Plant Picks";
        elseif ($sort=="fun_in_the_sun") echo "Fun in the Sun: " . $name . "s";
        elseif ($name=="rosa") echo "Roses";
        elseif ($name=="rhododendron") echo "Rhododendrons";
        elseif ($name=="clematis") echo "Clematis";
        elseif ($sort=="by_design_use") echo "Plants for " . $name;
        elseif ($sort=="by_pest_resistance") echo $name . " Resistant Plants";
        elseif ($sort=="evergreen_azalea") echo "Evergreen Azaleas";
        elseif ($sort=="small_tree") echo "Small Trees (Less Than 20 feet or 6.1 meters)";
        elseif ($sort=="nw_native" && $name=="yes") echo "GPP Northwest Native Plants";
        else ;
            ?>
        </h5>
    <table id="display" class="tablesorter display">
        <thead>
            <th title="Click to Sort">Plant Name</th>
            <th title="Click to Sort">Common Name(s)</th>
            <th title="Click to Sort">Height (ft.)</th>
            <th title="Click to Sort">(m.)</th>
             <th title="Click to Sort">Type</th>
            </thead>
       
        <tbody>
            <?php foreach($records as $plant): ?>
            <tr>
                
            <td class="plantname">
                <?php echo anchor('plantlists/view/'.$plant['id'], $plant['name']); ?>
            </td>
            <td class="common-name">
                <?php 
               if (!empty($plant['common_names'])) {
                echo anchor('plantlists/view/'.$plant['id'], $plant['common_names']);
               } ?>
            </td>
            <td class="height">
                <?php echo $plant['height'] . "'"; ?>
            </td>
          <td class="meters">
                <?php echo feet_to_meters($plant['height']); ?>
            </td>
            <td class="type">
                <?php echo $plant['type']; ?>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div><!-- end content -->
