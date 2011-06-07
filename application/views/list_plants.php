
   <!-- List Plants public display view -->
    <div class="main">
        <?php echo form_open('listplants/search'); ?>
        <div>
            <?php echo form_label('Genus:', 'genus'); ?>
            <?php echo form_input('genus', set_value('genus'), 'id="genus"'); ?>
        </div>
       
                <div>
            <?php echo form_label('Plant Type:', 'plant_type'); ?>
            <?php echo form_dropdown('plant_type', $planttype_options,
                    set_value('plant_type'), 'id="plant_type"'); ?>
        </div>
         <div>
            <?php echo form_label('Plant Height:', 'plant_height_at_10'); ?>
            <?php echo form_dropdown('height_comparison',
                    array('gt' => '>', 'gte' => '>=', 'eq' => '=', 'lte' => '<=', 'lt' => '<'),
                    set_value('height_comparison'), 'id="height_comparison"'); ?>
            <?php echo form_input('plant_height_at_10', set_value('plant_height_at_10'), 'id="plant_height_at_10"'); ?>
        </div>
        <div>
            <?php echo form_submit('action', 'Search'); ?>
        </div>
       <?php echo form_close(); ?>
        <div>
        <p>Found <?php echo $num_results; ?> plants</p>
        </div>
        <table>
           <thead>
			<?php foreach($fields as $field_name => $field_display): ?>
			<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
				<?php echo anchor("/listplants/display/$query_id/$field_name/" .
					(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc') ,
					$field_display); ?>
			</th>
			<?php endforeach; ?>
		</thead>
        <tbody>
              <?php foreach($plants as $plant): ?>
                <tr>
                   <?php foreach($fields as $field_name => $field_display): ?>
			<td> <?php echo $plant->$field_name; ?>
			</td>
			<?php endforeach; ?>
                                       </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
<?php if (strlen($pagination)): ?> 
	<div id="pages">
		Pages: <?php echo $pagination; ?>
	</div>
	<?php endif; ?>
    </div>

