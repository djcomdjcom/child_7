<?php
/**
 * Template Name: AI生成ページ埋め込み
 *
 * AI generated HTML/CSS/JavaScript embed template.
 */

if ( have_posts() ) {
	the_post();
}

$ai_embed_source = (string) get_post_field( 'post_content', get_the_ID(), 'raw' );
$ai_embed_iframe_id = 'hublog7-ai-embed-' . get_the_ID();

$ai_embed_resize_script = str_replace(
	'__HUBLOG7_AI_EMBED_FRAME_ID__',
	wp_json_encode( $ai_embed_iframe_id ),
	<<<'HTML'
<style>
html,
body {
	height: auto !important;
	min-height: 0 !important;
	margin: 0;
}

body {
	overflow: visible;
}
</style>
<script>
(function() {
	var frameId = __HUBLOG7_AI_EMBED_FRAME_ID__;
	var lastHeight = 0;
	var ticking = false;

	function getHeight() {
		var body = document.body;
		var html = document.documentElement;
		var maxBottom = 0;
		if (!body || !html) {
			return 0;
		}

		var bodyRect = body.getBoundingClientRect();
		Array.prototype.forEach.call(body.children, function(child) {
			var tagName = child.tagName ? child.tagName.toLowerCase() : '';
			var rect;
			var style;
			var marginBottom;

			if (tagName === 'script' || tagName === 'style' || tagName === 'link' || tagName === 'meta') {
				return;
			}

			style = window.getComputedStyle(child);
			if (style.display === 'none' || style.position === 'fixed') {
				return;
			}

			rect = child.getBoundingClientRect();
			marginBottom = parseFloat(style.marginBottom) || 0;
			maxBottom = Math.max(maxBottom, rect.bottom - bodyRect.top + marginBottom);
		});

		return Math.max(
			Math.ceil(maxBottom),
			Math.ceil(body.scrollHeight),
			Math.ceil(html.scrollHeight)
		);
	}

	function sendHeight() {
		ticking = false;
		var height = getHeight();
		if (!height || Math.abs(height - lastHeight) < 2) {
			return;
		}

		lastHeight = height;
		window.parent.postMessage({
			type: 'hublog7-ai-embed-height',
			frameId: frameId,
			height: height
		}, '*');
	}

	function scheduleHeight() {
		if (ticking) {
			return;
		}
		ticking = true;
		window.requestAnimationFrame(sendHeight);
	}

	window.addEventListener('load', scheduleHeight);
	window.addEventListener('resize', scheduleHeight);
	document.addEventListener('DOMContentLoaded', scheduleHeight);

	if ('ResizeObserver' in window) {
		var resizeObserver = new ResizeObserver(scheduleHeight);
		resizeObserver.observe(document.documentElement);
		document.addEventListener('DOMContentLoaded', function() {
			if (document.body) {
				resizeObserver.observe(document.body);
				Array.prototype.forEach.call(document.body.children, function(child) {
					resizeObserver.observe(child);
				});
			}
		});
	}

	if ('MutationObserver' in window) {
		var mutationObserver = new MutationObserver(scheduleHeight);
		document.addEventListener('DOMContentLoaded', function() {
			if (document.body) {
				mutationObserver.observe(document.body, {
					attributes: true,
					childList: true,
					subtree: true
				});
			}
		});
	}

	function watchImages() {
		Array.prototype.forEach.call(document.images || [], function(image) {
			if (image.complete) {
				return;
			}

			image.addEventListener('load', scheduleHeight, { once: true });
			image.addEventListener('error', scheduleHeight, { once: true });
		});
	}

	document.addEventListener('DOMContentLoaded', watchImages);

	if (document.fonts && document.fonts.ready) {
		document.fonts.ready.then(scheduleHeight);
	}

	window.setTimeout(scheduleHeight, 100);
	window.setTimeout(scheduleHeight, 500);
	window.setTimeout(scheduleHeight, 1500);
	window.setTimeout(scheduleHeight, 3000);
})();
</script>
HTML
);

if ( preg_match( '/<html[\s>]/i', $ai_embed_source ) || preg_match( '/<!doctype/i', $ai_embed_source ) ) {
	if ( ! preg_match( '/<meta\s+name=["\']viewport["\']/i', $ai_embed_source ) && preg_match( '/<head[^>]*>/i', $ai_embed_source ) ) {
		$ai_embed_source = preg_replace(
			'/(<head[^>]*>)/i',
			'$1' . "\n" . '<meta name="viewport" content="width=device-width, initial-scale=1">',
			$ai_embed_source,
			1
		);
	}

	if ( preg_match( '/<\/body\s*>/i', $ai_embed_source ) ) {
		$ai_embed_srcdoc = preg_replace( '/<\/body\s*>/i', $ai_embed_resize_script . "\n</body>", $ai_embed_source, 1 );
	} else {
		$ai_embed_srcdoc = $ai_embed_source . "\n" . $ai_embed_resize_script;
	}
} else {
	$ai_embed_srcdoc = '<!doctype html>
<html lang="ja">
<head>
<meta charset="' . esc_attr( get_bloginfo( 'charset' ) ) . '">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
' . $ai_embed_source . '
' . $ai_embed_resize_script . '
</body>
</html>';
}
?>
<?php get_header(); ?>

<main id="hublog7-ai-embed-page" class="hublog7-ai-embed-page">
	<iframe
		id="<?php echo esc_attr( $ai_embed_iframe_id ); ?>"
		class="hublog7-ai-embed-frame"
		title="<?php echo esc_attr( get_the_title() ); ?>"
		srcdoc="<?php echo esc_attr( $ai_embed_srcdoc ); ?>"
		sandbox="allow-scripts allow-forms allow-popups allow-popups-to-escape-sandbox"
		loading="eager"
		referrerpolicy="no-referrer"
	></iframe>
</main>

<style>
.hublog7-ai-embed-page {
	width: 100%;
	margin: 0;
	padding: 0;
	overflow: hidden;
}

.hublog7-ai-embed-frame {
	display: block;
	width: 100%;
	min-height: 90vh;
	min-height: 90dvh;
	border: 0;
	overflow: auto;
	background: transparent;
}

body.page-template-page-ai-embed main#main,
body.page-template-page-ai-embed .hublog7-ai-embed-page {
	padding-left: 0 !important;
	padding-right: 0 !important;
}
</style>

<script>
(function() {
	var iframe = document.getElementById(<?php echo wp_json_encode( $ai_embed_iframe_id ); ?>);

	if (!iframe) {
		return;
	}

	function getMinimumHeight() {
		var viewportHeight = window.innerHeight || document.documentElement.clientHeight || 0;
		return Math.max(320, Math.ceil(viewportHeight * 0.9));
	}

	function updateHeight(height) {
		var nextHeight = Math.max(getMinimumHeight(), Math.ceil(Number(height) || 0));
		iframe.style.height = nextHeight + 'px';
	}

	window.addEventListener('message', function(event) {
		var data = event.data;

		if (event.source !== iframe.contentWindow || !data || data.type !== 'hublog7-ai-embed-height') {
			return;
		}

		if (data.frameId !== iframe.id) {
			return;
		}

		updateHeight(data.height);
	});

	iframe.addEventListener('load', function() {
		updateHeight(iframe.getAttribute('height'));
	});

	window.addEventListener('resize', function() {
		updateHeight(parseFloat(iframe.style.height));
	});
})();
</script>

<?php get_footer(); ?>
