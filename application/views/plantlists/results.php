<!-- display for PUBLIC plant search results -->

<div id="content" class="view">
 
    <h2>Great Plant Picks Search Results</h2>
<p class="center">Found <?php echo $stats; ?> total plants <span class="click">(click column to sort)</span></p>
 <?php
    echo "<span class='clear-search'>".anchor('/plantlists/advanced/', "Back to Advanced Search") . " | " . anchor('/plantlists/search', "Back to Lists") . "</span>";
        ?>
    <div class="simplesearch">
    <?php
     	$attributes = array('class' => 'searchform');
      	echo form_open('plantlists', $attributes);
	?>
   <p>Search by plant name:
    <input type="text" name="searchterms" id="searchterms" value="Enter botanical or common name">
   <input type="submit" value="Search"></p>
   <?php echo form_close(); ?>
    </div><!-- end searchform -->
   
   
   
    <p class="mail"> <a class="email" href="mailto:?subject=Great Plant Picks Plant List&body=[sub]"
           onclick="this.href = this.href.replace('[sub]',window.location)">Email this list</a>
        or copy and paste the address at the top of your browser into your favorite email program to share it</p>

    <table id="display" class="tablesorter display">
        <thead>
            <th title="Click to Sort">Plant Name</th>
            <th title="Click to Sort">Common Name(s)</th>
            <th title="Click to Sort">Height (ft.)</th>
            </thead>
       
        <tbody>
            <?php foreach($records as $plant): ?>
            <tr>
                
            <td class="plantname">
                <?php echo anchor('plantlists/view/'.$plant['id'], $plant['name']); ?>
            </td>
            <td class="common-name">
                <?php 
               if (!empty($plant['common_names'])) {
                echo anchor('plantlists/view/'.$plant['id'], $plant['common_names']);
               } ?>
            </td>
            <td>
                <?php echo $plant['height'] . "'"; ?>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div><!-- end content -->
