<!-- display for PUBLIC plant list and search function -->
<script type="text/javascript">
var thumbs = document.getElementById('thumbs'),
    links = thumbs.getElementsByTagName('a'),
    i;
for (i = 0; i < links.length; i += 1) {
    links[i].onclick = imageHandler;
}
function imageHandler() {
    var large = document.getElementById('large');
    large.style.backgroundImage = 'url(' + this.href + ')';
    return false;
    setActiveLink(this);
    return false;
}
function setActiveLink(link) {
    var links = link.parentNode.getElementsByTagName('a'),
    i;
    for (i = 0; i < links.length; i += 1) {
        links[i].className = '';
    }
    link.className = 'active';
}
</script>
<div id="content" class="view">

    <?php
    if($row == FALSE)
    {
        echo "The record does not exist"; ?>
        <?php
    }
 else
    {
     ?>

    <h4><?php echo $title ?><?php
        echo display_full_botanical_name($row);
    ?></h4>
<?php } ?>
    <div class="large">
 <!-- still working on image swap function -->
    </div>
     <div class="thumb">
<?php foreach ($images as $image) {
     echo image_view_link($image['filename']);

}
?>

     </div>

</div><!-- end content -->
