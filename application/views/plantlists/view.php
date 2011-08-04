<!-- display for PUBLIC plant list and search function -->
<script type="text/JavaScript">
$(document).ready(function() {
        $("#imageview ul li:first").addClass("active");

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
   <img src="<?php echo image_url($filename) ?>" alt="" id="main-img" />  
         <ul>
<?php
    foreach ($images as $image) {
     echo "<li>" . image_view_link($image['filename']) . "</li>";
}
?>
         </ul>    
    </div><!-- end gallery -->
</div><!-- end content -->

