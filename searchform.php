<form id="searchform" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" class="form-control" name="s" placeholder="Search our products" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo get_search_query(); ?>">
</form>