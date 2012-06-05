<!-- Nursery Directory View -->
<div id="content" class="display">
    <?php $this->load->view('includes/resources_breadcrumbs'); ?>
<?php
echo "<h1 id='start'>".$heading."</h1>"; ?>
<p class="intro">The following nurseries and retail centers have indicated to Great Plant Picks that they carry a number of GPP selections. As availability changes regularly throughout the year, it is wise to contact a nursery directly to check on plants for purchase.</p>
<p class="intro"><em>Note to Nurseries:</em> Listing in the GPP Nursery Directory is free.  If you would like to be added to the GPP Nursery Directory,
 please contact the GPP manager at <?php echo safe_mailto('info@greatplantpicks.org', 'info@greatplantpicks.org'); ?> or phone 206-362-8612.</p>
<?php
echo "<h4>Washington Nurseries</h4>";
if(!empty($nurseries_wa)) echo $this->table->generate($nurseries_wa);
echo "<h4>Oregon Nurseries</h4>";
if(!empty($nurseries_or)) echo $this->table->generate($nurseries_or);
echo "<h4>British Columbia Nurseries</h4>";
if(!empty($nurseries_bc)) echo $this->table->generate($nurseries_bc);
echo "<h4>Other Nurseries</h4>";
if(!empty($nurseries_other)) echo $this->table->generate($nurseries_other);
?>
<p class="toplink"><a href="/nurserylist/#start">Back to top</a></p>
</div><!-- end content -->