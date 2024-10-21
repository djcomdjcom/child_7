<?php
/**
* side-shopinfo.php
*
* @テーマ名	hublog
* 全てのサイドバーに表示されるパーツ
* @更新日付	2012.04.06
*/
?>




<?php if (get_option('profile_corporate_name')) : ?>
<li id="side-foot_shopinfo" class="cleartype clearfix">

<div class="inbox">
		<span class="shopname w100">
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sitetitle.png" alt="<?php echo (get_option('profile_corporate_name')); ?>ロゴ"/>
    </span>

<?php if (get_option('profile_address')) : ?>

			<span class="profile_address">

			<?php if (get_option('profile_postcode')) : ?>
			<span class="postcode"><?php echo '〒' . get_option('profile_postcode'); ?></span>
			<?php endif; ?>
			<span class="address"><?php echo get_option('profile_address'); ?></span>
			</span>
			<?php if (get_option('profile_address_taetmono')) : ?>
			<span class="address_tatemono"><?php echo '〒' . get_option('profile_address_taetmono'); ?></span>
			<?php endif; ?>


<?php endif; ?>



<?php if (get_option('profile_inquiry_tel')) : ?>

		<span class="tel">
			<?php $profile_inquiry_tel = (get_option('profile_inquiry_tel')) ? get_option('profile_inquiry_tel') : get_option('profile_main_tel');
					if (!empty($profile_inquiry_tel)) : ?>
					<span class="title">TEL：</span><span class="number"><?php echo $profile_inquiry_tel; ?></span><?php endif; ?>
		</span>
<?php endif; ?>

	<?php if (get_option('profile_fax')) : ?>
		<span class="fax"><span class="title">FAX：</span><span class="number"><?php echo get_option('profile_fax'); ?></span></span>
<?php endif; ?>

<?php if (get_option('profile_opening_hours')) : ?>
		<span class="profile_opening_hours"><span class="title">営業時間：</span><?php echo (get_option('profile_opening_hours')) ?>
		</span>
<?php endif; ?>


	<div class="to_shiryou"><a href="/shiryou">資料請求</a></div>
<?php endif; ?>
</div><!--inbox-->


</li>
