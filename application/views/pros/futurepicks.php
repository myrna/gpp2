<!-- display for future great plant picks ADMIN and PROFESSIONAL access only -->

<div id="content" class="view">
   
    <h4>Future Great Plant Picks</h4>
    
<p class="center">Click column to sort</p>
  
    <table id="display" class="tablesorter display">
        <thead>
            <?php foreach($sortfields as $field_name => $field_display): ?>
        <th <?php if ($sort_by == $field_name) ?>>
                <?php echo anchor("plantlists/$field_name/" .
                (($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'),
                        $field_display); ?>
        </th>
            <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach($records as $plant): ?>
            <tr>
                
            <td class="plantname">
                <?php echo $plant['name']; ?>
            </td>
            <td>
                <?php echo $plant['plant_type']; ?>
            </td>
            <td>
                <?php echo $plant['gpp_year']; ?>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php if (strlen($pagination)): ?>
<div id="pages">
	<?php echo $this->pagination->create_links(); ?>
</div>
<?php endif; ?>

</div><!-- end content -->
