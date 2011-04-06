
    <div class="main">
<?php echo form_open('plantdata/update/'); ?>

    <p>
        <?php echo form_input('family'); ?>
    </p>

    <p>
        <?php echo form_input('genus'); ?>
    </p>
 <p>
        <?php echo form_input('species'); ?>
    </p>
    <p>
        <?php echo form_input('PlantType'); ?>
    </p>
    <p>
        <?php echo form_submit('submit', 'Submit'); ?>
    </p>

<?php echo form_close(); ?>


