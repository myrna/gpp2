<!-- display for PUBLIC plant list and search function -->
<script type="text/JavaScript">
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
     <?php
        if (!empty($common_names)) {
            echo "<p>Common Name(s): ";
            foreach ($common_names as $common_name) {
                echo $common_name['common_name']." ";
                echo "</p>";
            }
        }
    ?>
<?php
        if (!empty($synonyms)) {
            echo "<p>Synonyms: ";
            foreach ($synonyms as $synonym) {
                echo display_full_botanical_name($synonym);
                echo anchor('crud/delete_synonym/'.$synonym['id'], 'Delete Synonym');
                echo "</p>";
            }
        }
    ?>
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
    </div><!-- end gallery -->

</div><!-- end content -->

