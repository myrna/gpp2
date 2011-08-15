<!-- Database Administration Add New Nursery Record View -->
<div id="content" class="admin">
    <h2>GPP Database Administration: Add New Nursery Record</h2>
    <p class="nav"><?php
       echo anchor('admin/nurseries/view', 'Return to Main Nursery List');
    ?></p>
    <?php echo $this->session->flashdata('status'); ?>
<?php
$attributes = array('class' => 'data-entry');
 echo form_open('admin/nurseries/add', $attributes);
?>
    <ul>
        <li><span class='labelname'>Nursery Name:</span> <?php echo form_input('nursery_name'); ?></li>
        <li><span class='labelname'>Street Address:</span> <?php echo form_input('street_address'); ?></li>
        <li><span class='labelname'>City:</span> <?php echo form_input('city'); ?></li>
        <li><span class='labelname'>State/Province:</span> <?php echo form_input('state_province'); ?></li>
        <li><span class='labelname'>Zip/Postal Code:</span> <?php echo form_input('zip_postal_code'); ?></li>
        <li><span class='labelname'>Public Phone (Area Code):</span> <?php echo form_input('phone_area_code'); ?></li>
        <li><span class='labelname'>Public Phone (Prefix):</span> <?php echo form_input('phone_prefix'); ?></li>
        <li><span class='labelname'>Public Phone (Number):</span> <?php echo form_input('phone_number'); ?></li>
        <li><span class='labelname'>Retail:</span> <input type="radio" name="retail" value="yes">Yes <input type="radio" name="retail" value="no">No</li>
        <li><span class='labelname'>Wholesale:</span> <input type="radio" name="wholesale" value="yes">Yes <input type="radio" name="wholesale" value="no">No</li>
        <li><span class='labelname'>Website Address:</span> <?php echo form_input('website_url'); ?></li>
        <li><span class='labelname'>Contact Name:</span> <?php echo form_input('contact_name'); ?></li>
        <li><span class='labelname'>Contact Email:</span> <?php echo form_input('contact_email'); ?></li>
        <li><span class='labelname'>Contact Phone:</span> <?php echo form_input('contact_phone'); ?></li>
        <li><span class='labelname'>Publish:</span> <input type="radio" name="publish" value="yes">Yes <input type="radio" name="publish" value="no">No</li>
    </ul>
    <?php echo form_submit('add', 'Add Nursery'); ?>


</div><!-- end content -->