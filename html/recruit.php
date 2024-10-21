

<p>現在募集中の求人を掲載しています。</p>
<p>下記の応募<a href="#form">フォーム</a>よりお申込みください。</p>

<section class="recruit-table">
<?php if (post_custom('recruit01-title')) : ?>
	<h3 class="title"><?php remove_filter ('acf_the_content', 'wpautop'); the_field("recruit01-title", $post_id);?></h3>
<?php endif //01 ?>
<?php if (post_custom('recruit01-title')) : ?>
<div class="slide-table">
	<?php echo (post_custom('recruit01-table')); ?>
</div>
<?php endif //01 ?>



<?php if (post_custom('recruit02-title')) : ?>
	<h3 class="title"><?php remove_filter ('acf_the_content', 'wpautop'); the_field("recruit02-title", $post_id);?></h3>
<?php endif //02 ?>
<?php if (post_custom('recruit02-title')) : ?>
<div class="slide-table">
	<?php echo (post_custom('recruit02-table')); ?>
</div>
<?php endif //02 ?>


<?php if (post_custom('recruit03-title')) : ?>
	<h3 class="title"><?php remove_filter ('acf_the_content', 'wpautop'); the_field("recruit03-title", $post_id);?></h3>
<?php endif //03 ?>
<?php if (post_custom('recruit03-title')) : ?>
<div class="slide-table">
	<?php echo (post_custom('recruit03-table')); ?>
</div>
<?php endif //03 ?>

<?php if (post_custom('recruit04-title')) : ?>
	<h3 class="title"><?php remove_filter ('acf_the_content', 'wpautop'); the_field("recruit04-title", $post_id);?></h3>
<?php endif //04 ?>
<?php if (post_custom('recruit04-title')) : ?>
<div class="slide-table">
	<?php echo (post_custom('recruit04-table')); ?>
</div>
<?php endif //04 ?>

</section>

<article id="form" class="clearfix anchor">
<h2>求人申し込みフォーム</h2>
<?php echo do_shortcode('[contact-form-7 id="6165" title="求人のお問合わせ"]') ;?>
</article><!--0000-->
