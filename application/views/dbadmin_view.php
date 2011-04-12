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
    <label for="crossgenus">Cross Genus:</label>
    <input type="text" name="crossgenus" id="crossgenus" />
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
    <label for="crossSpecies">Cross Species:</label>
    <input type="text" name="crossSpecies" id="crossSpecies" />
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
    <label for="tradename">Trade Name:</label>
    <input type="text" name="tradename" id="tradename" />
</p>
<p>
    <label for="registeredname">Registered Name:</label>
    <input type="text" name="registeredname" id="registeredname" />
</p>
<p>
    <label for="plantgroup">Plant Group (e.g. Atropurpurea):</label>
    <input type="text" name="plantgroup" id="plantgroup" />
</p>
<p>
    <label for="synonym">Synonym:</label>
    <input type="text" name="synonym" id="synonym" />
</p>
<p>
    <label for="origin">Origin:</label>
    <input type="text" name="origin" id="origin" />
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