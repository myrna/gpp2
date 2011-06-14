<!-- Database Administration View Single Record -->
    <h1><?php echo $title ?></h1>
    <?php
    if($row == FALSE)
    {
        echo "The record does not exist";
    }
 else
    {
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
<a href="javascript:history.back()">Back</a>

