<!-- display for PUBLIC plant search results -->

<div id="content" class="view">
 
    <h2>Great Plant Picks Search Results</h2>
<p class="center">Found <?php echo $stats; ?> total plants (click column to sort)</p>
    <?php  $attributes = array('class' => 'advsearch');
    echo form_open('plantlists', $attributes); ?>
   <input type="text" name="searchterms" id="searchterms">
    <input type="submit" value="Search">
   
    <?php
    echo "<span class='clear-search'>".anchor('/plantlists/advanced/', "Back to Advanced Search") . " | " . anchor('/plantlists/search', "Back to Lists") . "</span>";
        ?>
    <div class="clear"></div>
    <p class="note">*Search by plant name</p>
      <div class="clear"></div>
    <p> <a href="mailto:?subject=Great Plant Picks Plant List&body=[sub]" onclick="this.href = this.href.replace('[sub]',window.location)">Email this link</a></p>

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

</div><!-- end content -->
