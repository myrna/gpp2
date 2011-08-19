<!-- PUBLIC plantlists and search page -->

<div id="content" class="main">
    <h4>Advanced Search</h4>
    
    <div class="simplesearch">
        <p>Search by plant name</p>
    <?php
    echo form_open('plantlists', $attributes); ?>
    <input type="submit" value="Search" target="/plantlists/results/">
    <input type="text" name="searchterms" id="searchterms" value="<?php echo $query; ?>">
    </div>
    <p>Search by plant attributes</p>
     <?php
    echo form_open('advancedsearch', $attributes); ?>
    <fieldset>
        <?php echo form_label('Plant Type:','plant_type'); ?>
        <?php echo form_radio('plant_type', $plant_type_options,
                set_value('plant_type'), 'id="plant_type"'); ?>    <!-- in theory this creates radio buttons to select tree, shrub, etc. -->
    </fieldset>
    <fieldset>
        <?php echo form_label('Foliage Type:','foliage_type'); ?>
        <?php echo form_radio('foliage_type', $foliage_type_options,
                set_value('foliage_type'), 'id="foliage_type"'); ?>    <!-- radio buttons to select deciduous, evergreen, etc. -->
    </fieldset>
     <fieldset>
        <?php echo form_label('Mature Plant Height:','plant_height_max'); ?>
    </fieldset>
     <fieldset>
        <?php echo form_label('Growth Habit:','growth_habit'); ?>
    </fieldset>
     <fieldset>
        <?php echo form_label('Flower Time:','flower_time'); ?>
    </fieldset>
     <fieldset>
        <?php echo form_label('Flower Color:','flower_color'); ?>
    </fieldset>
    <fieldset>
        <?php echo form_label('Foliage Color:','foliage_color'); ?>
    </fieldset>
    <fieldset>
        <?php echo form_label('Sun Requirements:','sun'); ?>
    </fieldset>
    <fieldset>
        <?php echo form_label('Soil Requirements:','soil'); ?>
    </fieldset>
    <fieldset>
        <?php echo form_label('Water Requirements:','water'); ?>
    </fieldset>
    <div>
        <input type="submit" value="Search" target="/plantlists/results/">
    </div>

    <?php echo form_close() ?>

</div>