  <section id="home-event" class="home-content maxw-1000 mx-auto py-4 py-md-5 ">
    <header class="content_header text-sm-center mb-3 mb-md-4">
      <h2 class="ttl mincho">近日開催イベントのご案内</h2>
</header>
    <?php
    $args = array(
      'post_type' => 'post',
      'category_name' => 'event',
      'posts_per_page' => 4,
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ):
      ?>
    <div class="posts row justify-content-between  mx-auto">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <?php get_template_part('looppart', 'event'); ?>
      <?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>
  </section>
  <!--home-event--> 


<script>
jQuery(function($){
$('.posts .post.style-event').addClass('my-3 col-md-6 ');
});		
</script>