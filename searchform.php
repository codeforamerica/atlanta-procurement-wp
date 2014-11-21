<form action="<?php echo home_url(); ?>" method="get">
	<input class="form-control" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
	<input type="submit" class="submit button btn btn-success" name="submit" value="<?php _e('Search');?>" style="margin-top: 5px;"/>
</form>
