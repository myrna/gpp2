<!-- display for PUBLIC plant list and search function -->

<div id="content" class="view">
    <h4>Find Your Plant</h4>
<p class="center">Found <?php echo $stats; ?> plants (click column to sort)</p>
    <?php
    echo form_open('plantlists', $attributes); ?>

    <input type="text" name="searchterms" id="searchterms">
    <input type="submit" value="Search">
    
    <?php
    echo "<span class='clear-search'>".anchor('/plantlists/search', "Clear Search", 'refresh'). " | "
            . anchor('/plantlists/advanced/', "Advanced Search") . " | " . anchor('/plantlists/search', "Back to Lists") . "</span>";
        ?>
    <div class="clear"></div>
    <p class='note'>*Search by plant name</p>
    <table id="display" class="tablesorter display">
        <thead> 
            <th>Plant Name (Click to sort)</th>
            <th>Family (Common)</th>
            <th>Height</th>
        </thead>
        <tbody>
            <?php foreach($records as $plant): ?>
            <tr>
                
            <td class="plantname">
                <?php echo anchor('plantlists/view/'.$plant['id'], $plant['name']); ?>
            </td>
            <td class="common-name">
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
