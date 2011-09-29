<!-- display for future great plant picks ADMIN and PROFESSIONAL access only -->

<div id="content" class="view">
   
    <h2>Future Great Plant Picks</h2>
    
<p class="center">Click column to sort</p>
  
    <table id="display" class="tablesorter display">
       <thead>
            <th>Plant Name</th>
            <th class="type">Type</th>
            <th>GPP Year</th>
            </thead>
        <tbody>
            <?php foreach($records as $plant): ?>
            <tr>
                
            <td class="plantname">
                <?php echo $plant['name']; ?>
            </td>
            <td class="type">
                <?php echo $plant['plant_type']; ?>
            </td>
            <td>
                <?php echo $plant['gpp_year']; ?>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div><!-- end content -->
