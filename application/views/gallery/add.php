<!-- upload images, gallery view -->
    <?php echo $this->session->flashdata('status'); ?>
	<?php echo "<div>" . display_full_botanical_name($plant_data) . "</div>"; ?>

    <div id="gallery">

	
    <?php if (isset($images) && count($images)):
    foreach($images as $image):	?>
    <div class="thumb">
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
<div id="blank_gallery">Please Upload an Image</div>
<?php endif; ?>
</div>

    <div id="upload">
    <?php
$attributes = array('id' => 'imageform');
echo form_open_multipart('gallery/add_image', $attributes);
echo form_upload('userfile');
if (isset($plant_id)) {
    echo form_hidden('plant_id', $plant_id);
}?>

        <fieldset>
            <label for="description">Description</label>
            <textarea id="description"></textarea>
        </fieldset>
        <fieldset>
            <label for="copyright">Copyright</label>
            <input id="copyright" type="text">
        </fieldset>
        <fieldset>
            <label for="photographer">Photographer</label>
            <input id="photographer" type="text">
        </fieldset>
<?php

        echo form_label('Season', 'season');
        echo form_dropdown('season', $seasons, '');

?>
<h3>Categories</h3>
<?php
foreach ($category_fields as $row) { 
       $category_data = array(
            'name' => "category[]", 
            'id' => $row->category, 
            'value' => $row->id
        ); ?>
<span class="check">
<?php
        echo form_checkbox($category_data);
        echo form_label($row->category, $row->category);
    } ?>
</span>

<input type="submit" class="submitimage" value="Submit">
<?php
echo form_close();
?>
    </div>

