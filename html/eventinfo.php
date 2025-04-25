	
<section id="home-event" class="home-content ">


<div id='js-iemiru-cms-index-page'></div>
<script src='https://www.ie-miru.jp/cms/yoyaku/****.js' defer></script>
<style>
#iemiru-cms-index-page	{max-width: none;}
</style>
<p class="arrow btn"><a class="to_index" href="https://www.ie-miru.jp/cms/yoyaku/****" target="_blank" title="イベント情報">イベント一覧</a></p> </section>	

<section id="home-event2" class="home-content  mx-auto py-4 py-md-5 ">
    <header class="content_header text-sm-center mb-3 mb-md-4">
      <h2 class="ttl ">近日開催イベントのご案内</h2>
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
    <div class="posts row justify-content-between wrapper mx-auto">
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
<style>
h1.entry-title{
font-size: clamp(1.5rem, 1.432rem + 0.34vw, 1.688rem);
margin-bottom: 1em;
margin-top: 1em;
color: var(--col_key02);
text-align: center;
}


</style>