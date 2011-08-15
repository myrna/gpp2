<!-- display for PUBLIC plant list and search function -->

<div id="content" class="view">

<p class="center">Found <?php echo $stats; ?> plants (click column to sort)</p>
    <?php
    echo form_open('plantlists', $attributes); ?>
    <input type="submit" value="Search">
    <input type="text" name="searchterms" id="searchterms" value="<?php echo $query; ?>">

 
    <?php
    echo "<span class='clear-search'>".anchor('/plantlists/basic_search', "Clear Search")."</span>";
    echo "<p class='note'>*Search by plant name</p>";
    ?>
    <table class="display">
        <thead>
            <?php foreach($fields as $field_name => $field_display): ?>
        <th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
                <?php echo anchor("plantlists/home/$field_name/" .
                (($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'),
                        $field_display); ?>
        </th>
            <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach($records as $plant): ?>
            <tr>
                
            <td>
                <?php echo anchor('plantlists/view/'.$plant['id'], $plant['name']); ?>
            </td>
            <td>
                <?php echo $plant['common']; ?>
            </td>
            <td>
                <?php echo $plant['height'] . "'"; ?>
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
