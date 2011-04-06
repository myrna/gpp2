<?php $this->load->view('includes/header'); ?>

<h2>Create New Record</h2>
<?php echo form_open('plantdata/create'); ?>
<p>
    <label for="family">Plant Family:</label>
    <input type="text" name="family" id="family" />
</p>
<p>
    <label for="genus">Genus:</label>
    <input type="text" name="genus" id="genus" />
</p>
<p>
    <label for="species">Species:</label>
    <input type="text" name="species" id="species" />
</p>
<p>
    <label for="PlantType">Type:</label>
    <input type="text" name="PlantType" id="PlantType" />
</p>
<p>
    <input type="submit" value="Add Record" />
</p>
<?php echo form_close(); ?>

<?php $this->load->view('includes/footer'); ?>