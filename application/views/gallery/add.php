<!-- upload images, gallery view -->
    <?php echo $this->session->flashdata('status'); ?>

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
    ?>
<img alt="" title="<?php echo $image['description']; ?>" src="<?php echo image_thumb_url($image['filename']); ?>" /></a>
   
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
}

echo form_label('Description', 'description');
echo form_textarea('description', "");

echo form_label('Copyright', 'copyright');
echo form_input('copyright', '');

echo form_label('Photographer', 'photographer');
echo form_input('photographer', '');

echo form_label('Season', 'season');
echo form_dropdown('season', $seasons, '');

echo form_label('Rank', 'rank');
echo form_dropdown('rank', $rank, '');
?>
<input type="submit" class="submitimage" value="Submit">
<?php
echo form_close();
?>
    </div>
