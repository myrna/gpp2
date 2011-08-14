<!-- display for PUBLIC plant list and search function -->
<script type="text/javascript">
$(document).ready(function() {
        $("#imageview li img").click(function(){
		$('#main-img').attr('src',$(this).attr('src').replace('thumbs/', ''));
	});
	var imgSwap = [];
	 $("#imageview li img").each(function(){
		imgUrl = this.src.replace('thumbs/', '');
		imgSwap.push(imgUrl);
	});
	$(imgSwap).preload();
});
$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
}
</script>
<div id="content" class="view">

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
   <img src="<?php echo image_url($image['filename']) ?>" alt="" id="main-img" />
         <ul>
<?php
        foreach ($images as $image) {
        echo "<li>" . image_view_link($image['filename']) . "</li>";        
}
?>             
         </ul>    
    </div><!-- end image view -->
    <div class="plantinfo">
    <?php
        echo "<p><em>" . $details->plant_type . "</em>";
        if (!empty($common_names)) {
            echo ", <em>Common Name(s):</em> ";
            foreach ($common_names as $common_name) {
                echo $common_name['common_name']." ";
                }
        echo "</p>";
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
        echo "<dl><dt>Outstanding Qualities</dt><dd>";
        echo $details->qualities;
        echo "</dd></dl>";
        echo "<h3>Plant Characteristics</h3>";

        /* trying to get metric conversion on feet -- not working -- */
        echo "<p><em>Plant Height:</em> " . $details->plant_height_at_10 . " ft. (";
        $feet = $details->plant_height_at_10;  // this doesn't work, producing 0, but view is seeing the conversion helper
        echo feet_to_meters($plant_height_at_10) . " meters)</p>";
        echo "<p><em>Plant Width/Spread:</em> " . $details->plant_width_at_10 . " ft. (";
        $feet = $details->plant_width_at_10;  // this doesn't work, producing 0, but view is seeing the conversion helper
        echo feet_to_meters($plant_width_at_10) . " meters)</p>";
        echo "<p><em>Growth Habit:</em> " . $details->growth_habit . "</p>";

        /* get list of foliage color(s) --- not working ----*/
        if (!empty($plant_attributes['foliage_color']))
            echo "<p><em>Foliage Color:</em> ";
            echo implode($plant_attributes['foliage_color'], ', ');
        
        
        /* end foliage color ---- */

        /* need flower color(s) here --- */
        echo "<p><em>Flowering Time:</em> " . $details->flower_time . "</p>";
        echo "<h3>Plant Culture</h3>";
        echo "<p><em>Hardiness:</em> USDA Zones " . $details->zone_low . " to " . $details->zone_high;
        echo "<p><em>Seasonal Interest:</em> " . $details->seasonal_interest;
        echo "<p><em>Plant Combinations:</em> " . $details->plant_combinations;
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

