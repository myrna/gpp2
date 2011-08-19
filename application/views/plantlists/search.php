<!-- display for PUBLIC plant list and search function -->

<div id="content" class="view">
    <h4>Find Your Plant</h4>
    <div class="simplesearch">
    <?php
    echo form_open('plantlists', $attributes); ?>
    <input type="submit" value="Search" target="/plantlists/results/">
    <input type="text" name="searchterms" id="searchterms" value="<?php echo $query; ?>">
    </div>
    <?php echo anchor('plantlists/advancedsearch/','Advanced Search','title="Advanced Search"') ?>
    <h4>Popular Searches</h4>
    <ul>
        <li>2010 Great Plant Picks</li> <!-- link to URL of search result? -->

    </ul>
   
</div><!-- end content -->
