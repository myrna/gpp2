<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="css/gppstyles.css">
	<title>Plant List</title>
</head>
<body>
    <a href="/">Home</a> | <a href="/crud/">Database Administration</a> | <a href="/gallery/">Upload Image</a>
    <div class="main">
        <?php echo form_open('listplants/search'); ?>
        <div>
            <?php echo form_label('Genus:', 'genus'); ?>
            <?php echo form_input('genus', set_value('genus'), 'id="genus"'); ?>
        </div>
       
                <div>
            <?php echo form_label('Plant Type:', 'PlantType'); ?>
            <?php echo form_dropdown('PlantType', $planttype_options,
                    set_value('PlantType'), 'id="PlantType"'); ?>
        </div>
         <div>
            <?php echo form_label('Plant Height:', 'PlantHeight'); ?>
            <?php echo form_dropdown('height_comparison',
                    array('gt' => '>', 'gte' => '>=', 'eq' => '=', 'lte' => '<=', 'lt' => '<'),
                    set_value('height_comparison'), 'id="height_comparison"'); ?>
            <?php echo form_input('PlantHeight', set_value('PlantHeight'), 'id="PlantHeight"'); ?>
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
	<div>
		Pages: <?php echo $pagination; ?>
	</div>
	<?php endif; ?>
    </div>
<?php $this->load->view('includes/footer'); ?>
