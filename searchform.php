<?php
/*
* Search Form Template
*
*/
?>

<form action="<?php echo home_url( '/'); ?>" class="form-search" method="get">
	<div class="row">
		<div class="col-lg-12">
			<div class="input-group">
				<input type="text" class="form-control search-query" name="s" placeholder="<?php esc_attr_e('search here &hellip;', 'believeinc') ?>" />
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'believeinc') ?>">Search</button>
				</span>
			</div><!-- /input-group -->
		</div>
	</div>
</form>