<h2>Create New Record</h2>
<?php echo form_open('dbadmin/create'); ?>
<p>
    <label for="family">Plant Family:</label>
    <input type="text" name="family" id="family" />
</p>
<p>
    <label for="genus">Genus:</label>
    <input type="text" name="genus" id="genus" />
</p>
<p>
    <label for="cross_genus">Cross Genus:</label>
    <input type="text" name="cross_genus" id="crossgenus" />
</p>
<p>
    <label for="species">Species:</label>
    <input type="text" name="species" id="species" />
</p>
<p>
    <label for="subspecies">Subspecies:</label>
    <input type="text" name="subspecies" id="subspecies" />
</p>
<p>
    <label for="cross_species">Cross Species:</label>
    <input type="text" name="cross_species" id="crossSpecies" />
</p>
<p>
    <label for="variety">Variety:</label>
    <input type="text" name="variety" id="variety" />
</p>
<p>
    <label for="cultivar">Cultivar:</label>
    <input type="text" name="cultivar" id="cultivar" />
</p>
<p>
    <label for="trade_name">Trade Name:</label>
    <input type="text" name="trade_name" id="trade_name" />
</p>
<p>
    <label for="registered_name">Registered Name:</label>
    <input type="text" name="registered_name" id="registered_name" />
</p>
<p>
    <label for="plantname_group">Plant Group (e.g. Atropurpurea):</label>
    <input type="text" name="plantname_group" id="plantname_group" />
</p>
<p>
    <label for="synonym">Synonym:</label>
    <input type="text" name="synonym" id="synonym" />
</p>
<p>
    <label for="plant_origin">Origin:</label>
    <input type="text" name="plant_origin" id="plant_origin" />
</p>
<p>
    <label for="plant_type">Type:</label>
    <input type="text" name="plant_type" id="plant_type" />
</p>
<p>
    <input type="submit" value="Add Record" />
</p>
<?php echo form_close(); ?>



<?php $this->load->view('includes/footer'); ?>