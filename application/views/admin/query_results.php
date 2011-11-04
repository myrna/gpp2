<!-- display for PUBLIC plant search results -->

<div id="content" class="view">
 
    <h2>Great Plant Picks Administrative Query Results</h2>
<p class="center">Found <?php echo $stats; ?> total plants (click column to sort)</p>
<p class="nav">
<?php
    echo anchor('admin/admin_search', 'Clear Search'); ?>
 | <a href="javascript:history.go(-1);"> Back</a></p>
    
        
  
    
    <table id="display" class="tablesorter display">
        <thead>
            <th>Plant Name <span>(Click to sort)</span></th>
            <th>Family (Common)</th>
            <th>Status</th>
            <th>Year</th>
            <th>Committee</th>
            </thead>
       
        <tbody>
            <?php foreach($records as $plant): ?>
            <tr>
                
            <td class="plantname">
                <?php echo $plant['name']; ?>
            </td>
            <td class="common-name">
                <?php echo $plant['common']; ?>
            </td>
            <td class="status">
                <?php echo $plant['status']; ?>
            </td>
            <td class="year">
                <?php echo $plant['year']; ?>
            </td>
            <td>
                <?php echo $plant['committee']; ?>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div><!-- end content -->
