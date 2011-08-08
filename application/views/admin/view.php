<!-- Database Administration View Single Record -->
<div id="content" class="main">
       <?php
    if($row == FALSE)
    {
        echo "The record does not exist";
    }
 else
    {
     ?>
    <h4><?php echo $title ?><?php
        echo display_full_botanical_name($row);
    ?></h4>
<?php
    echo "<p>".anchor('crud/add_record', 'Add new record')." | ";

    echo anchor('/listplants', 'Return to Main List')."</p>";
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
      <div class="clear"></div>
</div><!-- end content -->

