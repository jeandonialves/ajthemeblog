<?php

/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div class="search-form-container">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
		<div class="container">
			<div class="col-12">
				<div class="input-group mb-3">
					<input type="search" class="form-control" placeholder="Digite aqui sua busca" value="<?php echo get_search_query(); ?>" name="s">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit">BUSCAR</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>