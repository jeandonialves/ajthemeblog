<article <?php post_class(array('class' => 'secondary')); ?>>
	<div class="card card-cascade">

		<div class="view">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?></a>
		</div>

		<div class="card-body">
			<h5 class="category"><?php the_category(' '); ?></h5>
			<h4 class="font-weight-bold card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<p class="card-text"><?php the_excerpt(); ?></p>
		</div>
	</div>
</article>