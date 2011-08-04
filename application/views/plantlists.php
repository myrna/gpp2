<!-- list plants view -->
<div id="content" class="main">
    <?php echo form_open('plantlists/search'); ?>
    <div>
        <?php echo form_label('Plant Name:', 'name'); ?>
        <?php echo form_input('name', set_value('name'), "id='name'"); ?>
    </div>
    <div>
        <?php echo form_label('Type:', 'plant_type'); ?>
        <?php echo form_dropdown('plant_type', $options, set_value('plant_type'), "id='plant_type'"); ?>
    </div>
    <div>
        <?php echo form_label('Height:', 'plant_height_at_10'); ?>
        <?php echo form_dropdown('height_comparison',
          array('gt' => '>', 'gte' => '>=', 'eq' => '=', 'lte' => '<=', 'lt' => '<') ,
	  set_value('height_comparison'), 'id="height_comparison"'); ?>
        <?php echo form_input('plant_height_at_10', set_value('plant_height_at_10'), 'id="plant_height_at_10"'); ?>
    </div>
    <div>
        <?php echo form_submit('action', 'Search'); ?>
    </div>

    <?php echo form_close() ?>

</div><!-- end content -->