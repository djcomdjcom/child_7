<?php
/**
 * addcontent-event.php
 *
 * @テーマ名	hublog-c
 * @更新日付	2012.02.15
 *
 */
?>


    <?php if(post_custom('event-date')) :?>
<p class="addcontent-event-date"><span class="event-date"> 開催日：<?php echo post_custom('event-date'); ?> </span></p>
    <?php endif ;?>



<?php if (in_category('event-closed')) : ?>
<p class="event-closed text-center lead"> このイベントは終了しました。<br />
ありがとうございました。 </p>
<?php else  :?>
<?php if (post_custom('event-date')) :	?>
<div id="addcontent-event" class="row d-md-none">
  <div class="col-md-6 eyecatch"> <span class="w100">
    <?php if ( function_exists('the_post_image') ) :?>
    <a rel="lightbox" href="<?php echo (get_the_post_thumbnail_url( get_the_ID(), 'large') );?>">
    <?php ( the_post_image('large')  );?>
    </a>
    <?php else: ?>
    <img src="<?php echo get_template_image('noimage');?>" alt="No Image" />
    <?php endif;?>
    </span> </div>
  <div class="event-meta col-md-6 mt-2 mx-3 mt-md-0 mx-md-auto ">
    <p class="title"><strong>イベント開催情報</strong></p>
	  
	<?php get_template_part('cat_icon');//カテゴリーアイコン ?>
	  
    <?php if(post_custom('catchcopy')) :?>
    <p class="catchcopy txt-ll"> <?php echo nl2br ( post_custom('catchcopy') ); ?> </p>
    <?php endif ;?>
    <span class="event-date"> 開催日：<?php echo post_custom('event-date'); ?> </span> <span class="event-hour"> 開催時間：<?php echo post_custom('event-hour'); ?> </span> <span class="event-at"> 開催場所：<?php echo post_custom('event-at'); ?> </span> </div>
	<?php get_template_part('icon_status');//ステイタスアイコン ?>
	
</div>
<!--addcontent-event-->
<?php endif //event-date ;?>
<?php endif  ;?>
