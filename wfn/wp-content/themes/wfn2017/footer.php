<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordFes Nagoya 2015
 */
?>
	<?php //include get_stylesheet_directory() . '/template-parts/suporter.php'; ?>
	
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
		if ( is_single() ):
		/* シングルページ用のソーシャルボタン */
		get_template_part( 'template-parts/social', 'single' );
		else:
		/* サイト用のソーシャルボタン */
		get_template_part( 'template-parts/social' );
		endif;?>

		<div class="copyright-wrapper">
			<p class="copyright">Copyright &copy; WordFes Nagoya 2016 All Rights Reserved.</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
jQuery(document).ready(function(){
	
	jQuery('.schedule-inner').tile(3);
	

	jQuery(".menu-open").on("click", function() {
		jQuery('.navigation-menu ul').slideToggle();
		console.log( 'Menu Open.' );
	});
});

jQuery(window).resize(function(){
	
	mainImageAdjust();
	
});

jQuery("a img.swap").hover(function(){
	
	var url = jQuery(this).attr("src");
	jQuery(this).attr("src", url.replace(".png", "-over.png"));
	
},
function(){
	
	var url = jQuery(this).attr("src");
	jQuery(this).attr("src", url.replace("-over.png", ".png"));
	
});

jQuery("#tix-entry-form").submit(function(){
	
	jQuery("#error-message").html("&nbsp;");
	
	var checked = 0;
	
	jQuery(".ticket-quantity").each(function(){
		
		if ( jQuery(this).is(':checked') ) {
			
			checked++;
			
		}
		
	});
	
	if ( 0 == checked) {
		
		jQuery("#error-message").html("チケットを選択してください。");
		console.log("Error !");
		return false;
	
	} else {
		
		console.log("OK");
	
	}
	
});
</script>

<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-33186005-4', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>