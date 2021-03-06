<!-- upload images, gallery view -->
<div id="content" class="gallery">
    <h1>GPP Database Administration: Add/Delete Images</h1>
    <?php
    echo "<p class='nav'>".anchor('admin/crud/add_record', 'Add new record')." | ";

    echo anchor('/admin/listplants', 'Return to Main List')."</p>";
    ?>
    <h4><?php echo "<div>" . display_full_botanical_name($plant_data) . "</div>"; ?></h4>
    <p><?php echo $this->session->flashdata('status'); ?></p>

    <div id="gallery">

	
    <?php if (isset($images) && count($images)):
    foreach($images as $image):	?>
    <div class="thumb">
    <?php
    echo form_open('admin/gallery/delete');
    echo form_hidden('image_id', $image['id']);
    echo form_hidden('plant_id', $image['plant_id']);
    echo form_submit('delete', "Delete");
    echo form_close();
    echo image_thumb_link($image['filename']);
	foreach ($image['categories'] as $category) {   
		echo "<p class='category'>Category: " . $category . "</p>";
                }
        
     ?>
</div>
<?php endforeach; else: ?>
<div id="blank_gallery">Please Upload an Image</div>
<?php endif; ?>
</div>

    <div id="upload">
       
    <?php
$attributes = array('class' => 'data-entry');
echo form_open_multipart('admin/gallery/add_image', $attributes);
echo form_upload('userfile');
if (isset($plant_id)) {
    echo form_hidden('plant_id', $plant_id);
}?>
        <ul>
        <fieldset>
            <li><span class='labelname'> <label for="description">Description</label></span>
             <?php echo form_input('description'); ?></li>
        </fieldset>
        <fieldset>
            <li><span class='labelname'><label for="copyright">Copyright</label></span>
             <?php echo form_input('copyright'); ?></li>
        </fieldset>
        <fieldset>
            <li><span class='labelname'> <label for="photographer">Photographer</label></span>
            <?php echo form_input('photographer'); ?></li>
        </fieldset>
            <fieldset>
                <li><span class='labelname'>
            <?php
        echo form_label('Season', 'season'); ?>
                    </span>
           <?php
        echo form_dropdown('season', $seasons, '');

?>
            </li></fieldset></ul>
<h3>Categories</h3>
<?php
foreach ($category_fields as $row) {
       $category_data = array(
            'name' => "category[]", 
            'id' => convert_to_id($row['category']), 
            'value' => $row['id']
        ); ?>

<?php
        echo "<span class='formcheck'>";
        echo form_checkbox($category_data);
        echo form_label($row['category'], $row['category']);
        echo "</span>";
    } ?>

<div class="clear"></div>
<input type="submit" class="submitimage" value="Submit">
<?php
echo form_close();
?>
    </div>
    <div class="clear"></div>
</div><!-- end content -->
