

<?php
$terms = get_terms( array(
  'taxonomy' => 'video_cat',
  'parent' => 0,
  'hide_empty' => true,
) );
?>
<?php //define("PAGE_NAME", "security_category"); ?>
<?php
foreach ( $terms as $key => $term ) {
  ?>
<?php //echo $term->slug; ?>
<?php
query_posts( array(
  'post_type' => 'video', //カスタム投稿名
  'taxonomy' => 'video_cat',
  'term' => $term->slug,
  // 'orderby' => 'rand',
  'posts_per_page' => 8, ) );
?>
<?php if(have_posts()): ?>

<div id="" class="section clearfix posts_set <?php echo($term->slug);?>">
	
	
	<header class="video_cat-ttl center">
<h3 class=" noicon  txt-ll">
<?php echo $term->name; ?></h3>    

<p><?php echo (wpautop ($term->description)); ?>		
</p>
	</header>
	
	<div class="posts row">
	<?php while(have_posts()): the_post();?>
        <?php get_template_part('looppart', 'video'); ?>
	<?php endwhile; ?>
	</ul>
</div>
	
<?php endif; ?>
<?php wp_reset_query(); ?>
<?php }?>