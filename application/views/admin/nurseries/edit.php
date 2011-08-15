<!-- Database Administration Edit Nursery Record View -->
<div id="content" class="admin">
    <h2>GPP Database Administration: Add New Nursery Record</h2>
    <p class="nav"><?php
       echo anchor('admin/nurseries/view', 'Return to Main Nursery List');
    ?></p>
    <?php echo $this->session->flashdata('status'); ?>
<?php
if($row == FALSE)
{
    echo "This record does not exist";
}
 else {

} ?>
<?php $attributes = array('class' => 'data-entry');
 echo form_open('admin/nurseries/edit', $attributes, array('id' => $row->id));
?>
    <ul>
        <li><span class='labelname'>Nursery Name:</span> <?php echo form_input('nursery_name', $row->nursery_name); ?></li>
        <li><span class='labelname'>Street Address:</span> <?php echo form_input('street_address', $row->street_address); ?></li>
        <li><span class='labelname'>City:</span> <?php echo form_input('city', $row->city); ?></li>
        <li><span class='labelname'>State/Province:</span> <?php echo form_input('state_province', $row->state_province); ?></li>
        <li><span class='labelname'>Zip/Postal Code:</span> <?php echo form_input('zip_postal_code', $row->zip_postal_code); ?></li>
        <li><span class='labelname'>Public Phone (Area Code):</span> <?php echo form_input('phone_area_code', $row->phone_area_code); ?></li>
        <li><span class='labelname'>Public Phone (Prefix):</span> <?php echo form_input('phone_prefix', $row->phone_prefix); ?></li>
        <li><span class='labelname'>Public Phone (Number):</span> <?php echo form_input('phone_number', $row->phone_number); ?></li>
        <li><span class='labelname'>Retail:</span> <?php echo form_input('retail', $row->retail); ?></li>
        <li><span class='labelname'>Wholesale:</span> <?php echo form_input('wholesale', $row->wholesale); ?></li>
        <li><span class='labelname'>Website Address:</span> <?php echo form_input('website_url', $row->website_url); ?></li>
        <li><span class='labelname'>Contact Name:</span> <?php echo form_input('contact_name', $row->contact_name); ?></li>
        <li><span class='labelname'>Contact Email:</span> <?php echo form_input('contact_email', $row->contact_email); ?></li>
        <li><span class='labelname'>Contact Phone:</span> <?php echo form_input('contact_phone', $row->contact_phone); ?></li>
        <li><span class='labelname'>Publish:</span> <?php echo form_input('publish', $row->publish); ?></li>
    </ul>
    <?php echo form_submit('edit', 'Edit Nursery'); ?>
    <div class="clear"></div>
</div><!-- end content -->