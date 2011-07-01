<!-- Database Administration View Single Record -->
       <?php
    if($row == FALSE)
    {
        echo "The record does not exist";
    }
 else
    {
     ?>
    <h4><?php echo $title ?></h4>
<?php
    echo "<p>".anchor('nursery_edit/new_record', 'Add new record')." | ";

    echo anchor('/nursery_edit', 'Return to Main List')."</p>";
    ?>
    <ul>
    <?php foreach ($row as $key => $value) {
        echo "<li>";
        echo field_to_label($key);
        echo ": " . $value;
        echo "</li>";
    } ?>
    </ul>
    <?php
    }
    ?>


