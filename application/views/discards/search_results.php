<?php $this->load->helper('form'); ?>

<?php echo form_open($this->uri->uri_string); ?>
<?php echo form_label('Search:', 'search-box'); ?>
<?php echo form_input(array('name' => 'q', 'id' => 'search-box', 'value' => $search_terms)); ?>
<?php echo form_submit('search', 'Search'); ?>
<?php echo form_close(); ?>

<?php if ( ! is_null($results)): ?>
    <?php if (count($results)): ?>
        <ul>
        <?php foreach ($results as $result): ?>
            <li><a href="<?php echo $result->genus; ?>"></a></li>
        <?php endforeach ?>
        </ul>
    <?php else: ?>
        <p><em>There are no results for your query.</em></p>
    <?php endif ?>
<?php endif ?>
