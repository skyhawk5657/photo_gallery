<?php
/**
 * App footer
 * 
 * Author: Hyview
 * 
 * Date created: 9/9/2015;  Last updated: 9/10/2015
 */
?>

		<footer>
			<div class="copyright">
				<span>Copyright &copy; <?php echo date("Y"); ?> 
				<a href="<?php echo $site["url"]; ?>">Hyview Softech</a></span> 
				<span class="xs-hide">All Rights Reserved</span>
			</div>
		</footer>
	</div><!-- /container -->
	
	<!-- Add jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../includes/jquery-2.1.4.min.js">\x3C/script>')</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="<?php echo $fb_url; ?>lib/jquery.mousewheel-3.0.6.pack.js"></script>	
	<script src="<?php echo $fb_url; ?>source/jquery.fancybox.pack.js"></script>
	<script src="<?php echo $fb_url; ?>source/helpers/jquery.fancybox-buttons.js"></script>
	<script src="<?php echo $fb_url; ?>source/helpers/jquery.fancybox-media.js"></script>
	<script src="<?php echo $fb_url; ?>source/helpers/jquery.fancybox-thumbs.js"></script>		
	<script type="text/javascript" src="<?php echo $js_url; ?>grids.js"></script>
	<script type="text/javascript">
		jQuery(function($) {
			$('.element').responsiveEqualHeightGrid();	
		});
	</script>
	<script>
		$(document).ready(function() { /* standard lightbox */
			$(".fancybox").fancybox({
				openEffect	: 'none',
				closeEffect	: 'none'
			});
		});

		$(document).ready(function() { /* lightbox with button helper */
			$(".fancybox-button").fancybox({
				prevEffect		: 'none',
				nextEffect		: 'none',
				closeBtn		: false,
				helpers		: {
					title	: { type : 'inside' },
					buttons	: {}
				}
			});
		});
		
		$(".fancybox").fancybox({
			helpers : {
				overlay : {
					css : {
						'background' : 'rgba(58, 42, 45, 0.95)'
					}
				}
			}
		});
	</script>