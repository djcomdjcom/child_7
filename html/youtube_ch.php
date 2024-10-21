<div id="topinfo" class="page_header youtube_ch mb-0"> <span class="d-block"></span>
</div>


<div class="outer-wrap py-5">
  <h1 class="tweak01 ">
    <?php the_title(); ?>
  </h1>
  <figure class="w100 maxw-1050 mx-auto"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube_ch/youtube_ch001@2x.jpg" width="2048" height="1131" alt="youtube動画のイメージ"/> </figure>
  <div class="text-center bold pt-5">
    <p class="txt-ll">皆さんは、こんな疑問をお持ちになった事はありませんか？</p>
    <p>「工務店は何をするお店だろう…」</p>
    <p>「どんな人が働いているのだろう…」</p>
    <p>「どんな風に家が建つのだろう…」</p>
    <p>「資料請求をする前にこの会社のことがもっと知りたいな…」</p>
  </div>
  <span class="w100 maxw-650 mx-auto mt-5"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube_ch/youtube_ch002.png" width="650" height="325" alt="皆さんは、こんな疑問をお持ちになった事はありませんか？"/> </span>
</div>

	
<div class="text-center pt-5">
  <p class="txt-ll bold"> 皆さんにとって、もっと身近な存在になりたくて、<br>
   <u>弊社ではYouTubeを公開しています。</u></p>
  <span class="w100 maxw-320 mx-auto my-5" > <img src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube_ch/youtube_ch003@2x.png" width="318" height="134" alt=""/> </span>
  <ul class="check bold my-5 d-inline-block text-left txt-ll ml-0">
    <li class="mb-4">これから家づくりを始める方 </li>
    <li class="mb-4">リフォームをしてみたい方</li>
    <li class="mb-4">工務店に興味をお持ちの方</li>
  </ul>
  <p> 弊社の紹介・家づくりの様子・職人エピソード・活動内容・暮らしに役立つワンポイント<br>
    などの動画をアップしていきますので、日常のちょっとしたスキマ時間にぜひご覧になってみてください。</p>
</div>

</article><!--entry-content-->

<article class="entry-content clearfix">

<div class="text-center border px-4 pt-4 mb-5 mx-md-5 mt-5">
  <p class="lead">現場の様子やルームツアーなどを順次UPしていく予定ですので、ぜひご覧ください。</p>
  <?php if (get_option('profile_sns_ytch')): ?>
  <p class="text-right"><a href="<?php echo get_option('profile_sns_ytch'); ?>" title="<?php echo get_option('profile_corporate_name'); ?>のYou Tubeチャンネル" target="_blank">＞＞＞「YouTube一覧ページ」はコチラから</a></p>
  <?php else:?>
  <p class="text-center red">※youtubeチャンネルのURLが登録されていません。</p>
  <?php endif;?>
</div>

<div id="cta" class="pb-5"></div>
<script>
jQuery(function($){
	$('iframe[src*="youtube"]').wrap('<div class="mx-auto maxw-600"><div class="movie-wrap"></div></div>');
});
</script>
	
	
<!--CSS-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
#main{
	overflow: hidden;
/*	font-size: 1.1em;*/
}
#topinfo.page_header {
    background: url("images/pg_hdr-bg@2x.jpg") center no-repeat;
    background-size: cover;
    padding: 8%;
    color: #fff;
    text-align: center;
    font-weight: normal;
}
#topinfo.page_header {
	color: #fff;
    text-align: center;
    font-weight: normal;
}
h1.tweak01 {
    background: none;
    padding: 0.3em 1em;
    border: 1px solid #707070;
    text-align: center;
    font-size: 1.3em;
    margin-bottom: 2em;
}		
	
@media screen and (max-width: 1199px) {
	.entry-content,
	.entry-header{
	margin-left: 15px;
	margin-right: 15px;
	}
	#topinfo.page_header,
	.outer-wrap{
	margin-left: -15px;
	margin-right: -15px;
	padding-left: 15px;
	padding-right: 15px;
	}
}
.outer-wrap{
	position: relative;
	z-index: 1;
}
.outer-wrap:after{
	content: "";
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: -1;
	background: #eee;
}
	

.entry-content{
	overflow: visible !important;
}
.border{
	border-color:#707070 !important;
}

#topinfo.page_header .subttl {
    font-size: 15px;
    display: block;
}

.entry-content h2{
	border: none;
	font-weight: bold;
}
@media screen and (max-width: 1199px) {
	.entry-content{
	overflow: hidden;
	}
}
@media screen and (min-width: 1200px) {
	.entry-content{
	overflow: inherit !important;
	}
	#topinfo.page_header.youtube_ch {
	width: 100vw;
	position: relative;
	margin-left: calc(50% - 50vw);
	box-sizing: border-box;
	}
	
	.outer-wrap:after{
	margin-left: calc(50% - 50vw);
	width: 100vw;
	box-sizing: border-box;
	}
}

.ttl.checked{
	background: none;
	padding-left: 0;
}
.ttl.checked:before {
	content: "\f00c";
	font-family: FontAwesome;
	list-style: none !important;
	display: inline-block;
	margin-right: 0.5em;
}


ol.flow {
	counter-reset: number;
	overflow: hidden;
}
ol.flow li{
	list-style: none;
	border: none;
	font-size: 1.2em;
	font-weight: normal;
	padding:0 0 1em 5em;
	position: relative;
	border-bottom: 1px dotted #707070;
	margin-bottom: 4em;
}
ol.flow li::before {
	counter-increment: number;
	content: counter(number,decimal-leading-zero); 
	padding-right: 5px;
	display: inline-block;
	background: #81A550;
	color: #fff;
	border-radius: 3px;
	padding: 0.2em 1em;
	margin-right: 0.8em;
	position: absolute;
	left: 0;
	top: 0;
}
ol.flow li:after {
	content: "\f0d7";
	font-family: FontAwesome;
	display: block;
	font-size: 4em;
	position: absolute;
	bottom: -0.5em;
	left: 0;
	right: 0;
	text-align: center;
	transform: scale(1.5, 1);
	color: #E6CFB2;
}
ol.flow li:last-child:after {
	content:none !important;
}

dl.check{}	

dl.check dt{
	font-size: 1.2em;
	border-bottom: 0;
}	

dl.check dt:before{
	content: "\f00c";
	font-family: FontAwesome;
	display: inline;
	margin-right: 0.3em;
}

dl.check dd{
	margin-bottom: 2em;
	padding-left: 2em;
}
ul.square li,
ul.tweak03 li{
	list-style:none;
	position: relative;
}
ul.square li:before{
	content: '■';
	position: absolute;
	left: -1.2em;
}
.ttl.ribbon {
    background: #666;
    color: #fff;
    text-align: center;
    font-size: 1.5rem;
}
/*TWEAK*/
#topinfo.page_header.youtube_ch {
	background: url("<?php bloginfo('stylesheet_directory'); ?>/images/youtube_ch/pg_hdr-youtube_ch-bg@2x.jpg") center no-repeat;
	background-size: auto;
	background-size: cover;
}
	
#topinfo.page_header.youtube_ch > span{
	height: 9em;
}
.darkcyan{
	color: #018596;
}
.pink{
	color: #D62C77;
}
.ribbon.bg-pink{
	background: #D62C77;
}
	
.ttl.icon-point{
	background: none;
	padding-left: 0;
	border: none;
}
.ttl.icon-point:before{
	content: "";
	display: inline-block;
	vertical-align: bottom;
	width: 2.3em;
	height: 2.3em;
	background: url("<?php bloginfo('stylesheet_directory'); ?>/images/youtube_ch/icon_point@2x.png") no-repeat;
	background-size: contain;
}	
.outer-wrap:after{
	background:#FCF7E7;
}
.outer-wrap-blue:after{
	background:#E7F9FC;
}
.outer-wrap-pink:after{
	background:#FFEFF2;
}

#content{
display: flex;
flex-direction: column;
}
#content > *{
	width:calc( 100% - 30px);
}
	
#content > .entry-content:nth-child(1){
	order: 1;
	}
	
#content > .entry-content:nth-child(2){
	order: 3;
	}
#content > .entry-content:nth-child(3){
	order: 2;
	}
#content > .include-contact{
	order: 4;
	width: 100%;
}
#content > #zeh_achievement{
		order: 5;
	}
	
#content > footer.entry-utility{
	order: 6;
}
	
@media screen and (max-width:567px) {
.w100.maxw-320{
	width: 60%;
}	}
}	

</style>
