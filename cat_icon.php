
<?php
/**
 * cat_icon.php
 * カテゴリー名を表示するためのパーツ
 */

 	$category = get_the_category();
 	$cat_id   = $category[0]->cat_ID;
 	$cat_name = $category[0]->cat_name;
 	$cat_slug = $category[0]->category_nicename;


?>



<?php if (get_post_type() === 'example'): ?>

	<?php
	    if ($terms = get_the_terms($post->ID, 'ex_cat')) {
	        foreach ( $terms as $term ) {
	            $term_slug = $term -> slug;
	            echo ('<span class="') ;
	            echo esc_html($term_slug) ;
	            echo (' cat_icon">') ;
	            echo esc_html($term->name)  ;
	            echo ('</span>') ;
	        }
	    }
	?>
<?php elseif (is_category('event') || in_category('event')) :?>

<?php if ( post_custom('event-type') == '見学会' ) {
echo '<span class="kengakukai event_type_icon">','見学会','</span>' ;}

elseif ( post_custom('event-type') == '勉強会' ) {
echo '<span class="benkyoukai event_type_icon">','勉強会','</span>' ;}

elseif ( post_custom('event-type') == '相談会' ) {
echo '<span class="soudankai event_type_icon">','相談会','</span>' ;}

elseif ( post_custom('event-type') == 'カルチャー教室' ) {
echo '<span class="culture event_type_icon">','カルチャー教室','</span>' ;}

elseif ( post_custom('event-type') == 'オーナー様イベント' ) {
echo '<span class="owner event_type_icon">','オーナー様イベント','</span>' ;}

?>

<?php endif; ?>
