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
        if (!empty($common_names)) {
            echo "<p><em>Common Name(s):</em> ";
            foreach ($common_names as $common_name) {
                echo $common_name['common_name']." ";
                echo "</p>";
            }
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
        echo "<p>" . $details->plant_type . "</p>";
        echo "<p><em>Plant Height:</em> " . $details->plant_height_at_10 . " ft. (";
        $feet = $details->plant_height_at_10;  // this doesn't work, producing 0, but view is seeing the conversion helper
        echo feet_to_meters($plant_height_at_10) . " meters)</p>";
       
        echo "<dl><dt>Culture</dt><dd>";
        echo $details->culture_notes;
        echo "</dd><dt>Growing Habit</dt><dd>";
        echo $details->growing_notes;
        echo "</dd>";
        echo "</dl>";
    ?>

    </div><!-- end plantinfo -->
    <div class="clear"></div>
</div><!-- end content -->

