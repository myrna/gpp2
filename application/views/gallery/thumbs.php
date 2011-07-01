<!-- thumbnail view -->

<div class="thumbs">
	
    <?php if (isset($images) && count($images)):
    foreach($images as $image):	?>
    
    <?php
    echo form_open('gallery/delete');
    echo form_hidden('image_id', $image['id']);
    echo form_hidden('plant_id', $image['plant_id']);
    echo form_submit('delete', "Delete");
    echo form_close();
    echo image_thumb_link($image['filename']);
	foreach ($image['categories'] as $category) {
		echo "<div class='category'>" . $category . "</div>";
	}
     ?>
</div>
<?php endforeach; else: ?>
<p>No image available</p>
<?php endif; ?>