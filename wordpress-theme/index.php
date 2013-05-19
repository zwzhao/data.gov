<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->


<?php get_template_part('header'); ?>

<body>



	<!-- Header Background Color, Image, or Visualization
	================================================== -->
	
	<div class="next-header">
	</div>


	<!-- Navigation & Search
	================================================== -->

	<div class="container">
		<div class="next-top">

			<?php get_template_part('navigation'); ?>
			<?php get_template_part('primary-search'); ?>

		</div> <!-- top -->


	<!-- WordPress Content
	================================================== -->

		<div class="content">

			<div class="sixteen columns">
			<div id="posts">

				<!-- lead-image -->
				<!-- source -->
				<!-- title -->
				<!-- body -->
				<!-- timestamp -->
				<!-- topic -->


				<?php query_posts('meta_key=featured_datagov&meta_value=Yes'); ?>

				<?php if (have_posts()) : ?>  
				    <?php while (have_posts()) : the_post(); ?>

				    <?php if (get_post_format() == 'status'): ?>

				    	<!-- Content - Tweet -->
						<div class="post small tweet">
							<div class="core">
								<div class="tweet-author">
									<div class="author-image">
										<img src="<?php the_field('twitter_photo'); ?>" height="40" width="40">
									</div>
									<div class="author-details">
										<?php the_field('persons_name'); ?> - <a href="<?php the_field('link_to_tweet'); ?>">@<?php the_field('twitter_handle'); ?></a>
									</div>
								</div>
								<div class="body">
									<?php the_content('Read the rest of this entry »'); ?> 
								</div>
							</div>
							<div class="meta">
								<div class="timestamp"><?php the_time('F jS, Y') ?></div>
								<div class="corner <?php foreach( get_the_category() as $cat ) { echo $cat->slug . '  '; } ?>">
									<div class="block"></div>
									<div class="topic"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
								</div>
							</div>
						</div>

					<?php elseif (get_post_format() == 'link'): ?>

						<!-- Content - Link -->
						<div class="post small link">
							<div class="core">
								<div class="source"><a href="<?php the_field('link_to_url'); ?>"><?php the_field('source'); ?></a></div>
								<div class="body">
									<?php the_content('Read the rest of this entry »'); ?>
								</div>
							</div>
							<div class="meta">
								<div class="timestamp"><?php the_time('F jS, Y') ?></div>
								<div class="corner <?php foreach( get_the_category() as $cat ) { echo $cat->slug . '  '; } ?>">
									<div class="block"></div>
									<div class="topic"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
								</div>
							</div>
						</div>

					<?php elseif (get_post_format() == 'image'): ?>

						<!-- Content - dataset -->
						<div class="post small dataset">
							<div class="lead">
								<div class="lead-image"><a href="<?php the_field('link_to_dataset'); ?>"><img class="scale-with-grid" src="<?php the_field('dataset_image'); ?>"></a></div>
							</div>
							<div class="core">
								<div class="title"><?php the_title(); ?></div>
								<div class="body">
									<?php the_content('Read the rest of this entry »'); ?>
								</div>
							</div>
							<div class="meta">
								<div class="timestamp"><?php the_time('F jS, Y') ?></div>
								<div class="corner <?php foreach( get_the_category() as $cat ) { echo $cat->slug . '  '; } ?>">
									<div class="block"></div>
									<div class="topic"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
								</div>
							</div>
						</div>

					<?php elseif (get_post_format() == ''): ?>

						<!-- Content - Blog Post -->
					    <div class="post medium blog" id="post-<?php the_ID(); ?>">  

							<div class="core">
								<div class="title"><?php the_title(); ?></div>
								<div class="body">
									<?php the_content('Read the rest of this entry »'); ?>  
								</div>
							</div>
							<div class="meta">
								<div class="timestamp"><a href="<?php the_permalink(); ?>"><?php the_time('F jS, Y') ?></a></div>
								<div class="corner <?php foreach( get_the_category() as $cat ) { echo $cat->slug . '  '; } ?>">
									<div class="block"></div>
									<div class="topic"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
								</div>
							</div>
					    </div>  

					<?php endif; ?>

				    <?php endwhile; ?>  

				<?php else : ?>  
				    <h2 class="center">Not Found</h2>  
				    <p class="center">Sorry, but you are looking for something that isn't here.</p>  
				    <?php include (TEMPLATEPATH . "/searchform.php"); ?>  
				<?php endif; ?>  


			</div> <!-- posts -->
			</div> <!-- sixteen columns -->

		</div> <!-- content -->

	</div><!-- container -->

<script>
$(window).load(function(){
  $('#posts').masonry({
    // options
    columnWidth: 287,
    itemSelector : '.post',
    isResizable: true,
    isAnimated: true,
    gutterWidth: 25
  });
});
</script>


<script>
$(function () {
  var
    $demo = $('#rotate-stats'),
    strings = JSON.parse($demo.attr('data-strings')).targets,
     randomString;

  randomString = function () {
    return strings[Math.floor(Math.random() * strings.length)];
  };

  $demo.fadeTo(randomString());
  setInterval(function () {
    $demo.fadeTo(randomString());
  }, 5000);
});
</script>

<!-- End Document
================================================== -->
</body>


</html>