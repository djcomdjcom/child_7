<?php
//LP追加の際は、カスタム投稿タイプ「LP」で新規追加
//スラッグ名は「lp年月」とする　（例「pl201801」）　

//このテンプレートファイルを複製して編集
//複製したファイルは「スラッグ名.php」として「html」に格納する（例「pl201801.php」）


//サンクスページは投稿タイプ「サンクスページ」で新規追加
//スラッグ名は「LP名-tnx」とする（例「pl201801-tnx」）

;?>



<?php $slug_name = $post->post_name; ?>

<!--削除禁止ここから-->
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '<?php echo home_url(); ?>/tnx/<?php echo( $slug_name) ;?>-tnx';
}, false );
</script>

<?php if ( is_user_logged_in() ) : ?>

<p>
サンクスページ<br>
<?php echo home_url(); ?>/tnx/<?php echo( $slug_name) ;?>-tnx
</p>
<?php endif; ?>


<h1 class="w100">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/sec01-title01.png" alt="落差8mのすごい擁壁お見せします！地盤、擁壁、耐震が心配な人集まれ！"/>
</h1>

<div class="inbox">
<p class="w100"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/sec01-title02.png" alt="建替のタイミングで擁壁をやり替えたい！子世代が一生安心に住める、高耐震高耐久の家にしたい！省エネで支出を抑えられる家づくりを知りたい！"/></p>

<p class="w100"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/sec01-img01.jpg" alt=""/></p>

<p>明けましておめでとうございます。宮城建設の宮城健志です。本年もよろしくお願い申し上げます。</p>
<p>ただいま習志野市中央公園のかけ上がりの土地に落差８Ｍの擁壁工事を施した建物の建築中です。習志野市は高低差のある土地が多いので、擁壁のある住宅多く建ち並びます。
永く住み続けるために擁壁をやり替えたり、二世帯住宅に建替えるタイミングで擁壁も工事したい方も多いのではないでしょうか。今回はそんな方々の参考になる構造見学会を開催いたします。</p>
<p>中央公園の最高の景観にたたずむ、高耐震、高性能住宅の建物構造をご見学いただけます。擁壁をやり替えたいけど費用が心配な方、耐震補強したいけど信頼できる地元工務店が見つけられない方は、この構造見学会で宮城建設の施工力を確かめにきてください。当社は構造的な安心と健康的な暮しをテーマに家づくりをしております。</p>
<p>特に身体を冷さないことが健康と密接に関係していると考え、冬暖かい家づくりをしています。</p>
<p>構造現場の段階から、暖かい家づくりであることがご体感いただけますので、ご来場いただける方は楽しみにお越しください。</p>
<p>新年はじめの構造見学会で土地と建物の両方の悩みをスッキリ解決していただけます。</p>
<p>中央公園を散歩しながら、ぜひお立ち寄りください。</p>


<p class="w100 center" style="max-width: 650px;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/sec01-img02.jpg" alt="宮城建設社長：宮城健志"/></p>
<h2 class="title-image w100">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/sec02-title01.png" alt="プロが教える擁壁と耐震建物の急所！高性能住宅の温熱環境体験ができる、構造見学会！"/>
	</h2>
<ul class="check red">
	<li>擁壁と建物の耐震の両方をご相談いただけます。</li>
	<li>二世帯住宅への建替など新たな発想でご提案します。</li>
	<li>ゼロエネルギー住宅で家計の支出を抑えた家づくりができます。</li>
	<li>売却や賃貸併用住宅など不動産の側面からのご提案もできます。</li>
	<li>今、住居で問題になっていることは解決します。</li>
	<li>さらに、20年後の未来も視野にいれたご提案をします。</li>
</ul>




</div>

<h2 class="title-image w100">
	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/sec03-title01.png" width="1000" height="544" alt="擁壁と耐震建物 構造見学会開催!!"/></h2>
<div class="inbox">
<p class="w100"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/sec03-title02.png" alt="構造見学会であなたの家のお悩みをご相談いただけます。"/></p>

<img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/sec03-img01.png" alt="構造見学会であなたの家のお悩みをご相談いただけます。"/>

<h3 class="title-image w100 center" style="margin: 2em auto 1em;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/sec03-title03.png" alt="擁壁と耐震建物、構造見学会開催!!"/></h3>


<div class="outline">

	<p><span class="title">【開催場所】</span><span>習志野市本大久保 3-13-17（<a href="https://goo.gl/maps/k7mVepsCvfp" target="_blank">Google Map</a>）</span></p>

	<p><span class="title">【日程】</span><span>2018年<span style="display: inline-block"> <b style="font-size: 1.5em">1 / 20</b><span style="color: dodgerblue;">（土）</span>・<b style="font-size: 1.7em">1 / 21</b><span style="color: crimson">（日）</span></span></span>

</p>
	<p><span class="title">【時間】</span><span>10:00～16:00（ご予約不要。見学会場に直接お越しください。）<br>
	※<a href="#form">事前にご予約</a>いただきますと、当日スムーズにご案内できます。</span></p>
<p><span class="title">【内容】</span><span>擁壁と耐震＋制震の構造を学ぶ<br>
	家の建替やリフォームをするためのはじめの一歩。</span></p>
　　　　
</div>
　　　　
<p class="w100"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/sec03-img02.png"  alt="現地開催「地震対策」セミナー（第1回:AM11:00～ 第2回:PM1:30～ 第3回:PM3:00～）"/></p>
　　　　　　　　
<ul class="check">
	<li>良い整骨院や良い処方せんより、<span class="red ul">良い住環境が元気の秘訣</span></li>
	<li>やりたい事で仲間が自然と集まる家づくり</li>
	<li>五感が気持ちいい家で豊かな人生を過す</li>
	<li><span class="ul">擁壁と建物の悩み</span>を<span class="red ul">地元工務店が解決する安心</span></li>
	<li>元気に暮らすために身体を冷さない家づくり</li>
</ul>

<p class="aligncenter">
ご予約は不要です。構造見学会現地に直接お越しください。<br>
<a href="#form">事前にご予約</a>いただきますと、当日スムーズにご案内できます。</p>

<p class="btn jizenyoyaku"><a href="#form"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/btn-jizenyoyaku.png" alt="事前予約はこちら"/></a></p>
</div>
<div id="map" class="movie-wrap" >
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.7273061951632!2d140.0431631152588!3d35.68371598019384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x602281b3937037bd%3A0x676c8af2c8454ca6!2z44CSMjc1LTAwMTIg5Y2D6JGJ55yM57-S5b-X6YeO5biC5pys5aSn5LmF5L-d77yT5LiB55uu77yR77yT4oiS77yR77yX!5e0!3m2!1sja!2sjp!4v1515476187786" width="800" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<div class="inbox">

<p class="w100"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/sec04-img01.jpg" alt="ご来場特典・健康住宅資料+グラス"/></p>

<p>&nbsp;</p>
<div id="sec_voice" class="clearfix">
<div class="r-box w66">



<h3>お客さまの声</h3>

	<span style="font-weight: bold;display: block;">A.Sさま</span>
<p style="font-size: 0.85em; line-height: 1.5em;">セミナーに参加する前には、高齢になった時に使いやすい家づくりとは何か？を考えていましたが、セミナーに参加してみて、これからの生活を老後に向けて、具体的に考えて行かなければいけないと、感じました。</p>

</div><!--R-->
<div class="l-box w33">
<p class="w100 center" style="max-width: 300px;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/voice-img01.jpg" alt="アンケート"/>
</p></div><!--L-->
</div>

<div id="sec_yoyakuannai" class="clearfix" style="max-width: 700px; margin:2em auto;">
<span class="w100">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/yoyakuannai.png" alt="ご予約は不要です。 構造見学会現地に直接お越しください。お電話でご予約頂きますとよりスムーズにご案内できます。"/>
</span>

	<a class="w100" href="tel:0120-14-2292"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/freedial.png" alt="0120-14-2292"/></a>

<p>
※電話口の担当者に構造見学会の予約とお話しください。<br>
※フォームからのご予約も承ります。<a href="#form">予約フォームはこちら。</a> </p>




	</div>




<ul>
  <li>構造見学会は30分程でご案内できます。</li>
	<li>お出かけついでにお立ち寄りください。</li>
	<li>お子様連れの方もご見学いただけます。</li>
	<li>お車で来場の方は来場直前にお電話ください。<br>駐車スペースをご案内いたします。</li>
	<li>車で自宅へお迎えに行くこともできますので、電話にてご予約ください。</li>
</ul>

<p class="btn jizenyoyaku"><a href="#form"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/btn-jizenyoyaku.png" alt="事前予約はこちら"/></a></p>

</div>
　
<div id="form" class="anchor">
<h2>事前予約フォーム</h2>
<?php echo do_shortcode('[contact-form-7 id="310" title="イベント申し込み"]');?>
</div>

　
　　　
<span class="w100" style="display: none;">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/lp/lp-201801/lp-201801.jpg" width="1000" height="8020" alt=""/>
</span>
