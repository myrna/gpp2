<!-- display for PUBLIC plant list and search function -->

<div id="content" class="main">
<p>Found <?php echo $num_results; ?> plants</p>
    <table>
        <thead>
            <?php foreach($fields as $field_name => $field_display): ?>
        <th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
                <?php echo anchor("plantlists/display/$field_name/" .
                (($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'),
                        $field_display); ?>
        </th>
            <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach($records as $record): ?>
            <tr>
                
            <td>
                <?php echo anchor('plantlists/view/'.$id, $record->genus); ?>
            </td>
            <td>
                <?php echo $record->plant_height_at_10; ?>
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
