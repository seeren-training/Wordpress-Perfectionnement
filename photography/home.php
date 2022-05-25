<?php get_header() ?>


<?php $query = new WP_Query(['post_type' => 'photo']) ?>

<div class="container home mt-4">
	<div class="row ">


		<?php while ($query->have_posts()) : ?>
			<?php $query->the_post(); ?>
			<div class="col col-12 col-md-6 col-xl-4 mb-4" title="<?= get_the_excerpt() ?>">
				<div class=" h-75 p-4 bg-light">
					<div class="cover h-100 w-100" style="background-image: url(<?= the_post_thumbnail_url() ?>)"></div>
				</div>
				<div class="p-4 d-flex align-items-center h-25 bg-light">
					<span><?= get_post_meta(get_the_ID(), 'photo_price', true) ?>€</span>
					<a class="btn btn-lg btn-dark ms-auto" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
				</div>
			</div>

		<?php endwhile ?>
		<script>
			document
				.querySelectorAll('.home .col')
				.forEach((col) => col.style.height = `${col.offsetWidth}px`)
		</script>
	</div>
</div>
<?php get_footer('widget') ?>