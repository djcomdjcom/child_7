<div class='yarpp yarpp-huglog'> 
	
      <script>
jQuery(function($){
$('.posts .post.style-example').addClass('col-12 col-sm-6 col-md-3');
});
</script>
	
  <!-- YARPP Thumbnails -->
	<header class="mt-5 pt-5 text-center border-bottom">
  <h3 class="ttl" style="font-size: 1.2rem">関連記事</h3>
		</header>
<?php if (have_posts()):?>
<div class="posts row border-bottom">
	<?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('looppart', 'example'); ?>
	<?php endwhile; ?>
</div>
<?php else: ?>
<p>記事が見つかりません</p>
<?php endif; ?>
</div>
