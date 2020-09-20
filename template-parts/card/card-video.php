<article <?php post_class(array('class' => 'secondary')); ?>>
	<div class="card card-cascade">
		
		<div class="view">
			<div class="icon-absolute" style="position: absolute; width: 40px; height: 40px; background-color: white; border-radius: 3px 0;">
				<i class="fa fa-play-circle" style="font-size: 32px; margin-left: 6px; margin-top: 4px;"></i>
			</div>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?></a>
		</div>

		<div class="card-body">
			<h5 class="category"><?php the_category(' '); ?></h5>
			<h4 class="font-weight-bold card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		</div>
	</div>
</article>