<!-- upload images, gallery view -->
    <div id="gallery">
    <?php if (isset($images) && count($images)):
    foreach($images as $image):	?>
    <div class="thumb">
    <?php
    echo form_open('gallery/delete');
    echo form_hidden('image_id', $image['id']);
    echo form_hidden('plant_id', $image['plant_id']);
    echo form_submit('delete', "Delete");
    ?>
<img alt="<?php echo $image; ?>" src="<?php echo image_thumb_url($image['filename']); ?>" /></a>                                     				</a>
</div>
<?php endforeach; else: ?>
<div id="blank_gallery">Please Upload an Image</div>
<?php endif; ?>
</div>

    <div id="upload">
    <?php

echo form_open_multipart('gallery/add_image');
echo form_upload('userfile');
if (isset($plant_id)) {
    echo form_hidden('plant_id', $plant_id);
}
echo br();
echo form_label('Description', 'description');
echo form_textarea('description', "");
echo br();
echo form_label('Copyright', 'copyright');
echo form_input('copyright', '');
echo br();
echo form_label('Photographer', 'photographer');
echo form_input('credit', "");
echo br();
echo form_label('Season', 'season');
echo form_dropdown('season', $seasons, '');
echo br();
echo form_submit('upload', 'Upload');
echo form_close();
?>
    </div>

