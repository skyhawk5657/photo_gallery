<?php
/**
 * Hyview Photo Gallery
 * 
 * This app will retrieve all image files from a given folder and display it as a gallery.
 *
 * Date created: 9/9/2015; Last updated: 9/10/2015
 */

require_once('config.php');
require_once('functions.php');

$page_title = "Photo Gallery";

 // Include the header template:
require_once('header.php');

/******* Setting & HTML generation *******/
/** settings **/
$images_dir = 'gallery/201506_leoPark/';
$thumbs_dir = 'gallery/201506_leoPark/thumbs/';
$thumbs_width = 200;
?>

<body>
	<div class="container">
		<header>
			<div class="row">
				<div id="site-logo" class="col-sm-3">
					<a href="<?php echo $site["url"]; ?>"><img src="<?php echo $img_url; ?>logo.png"></a>
				</div>
				<div id="page-title" class="col-xs-12 col-sm-9">
					<h1><?php echo $page_title; ?></h1>
				</div>
			</div>
			<div class="pg-divider"></div>
		</header>

		<main>
			<div class="row">
				<div class="gallery">
					<p class="album-title">Leo J. Ryan Memorial Park<br>San Mateo, CA</p>
					<?php /** generate photo gallery **/
					$html_gc = ''; // initialize and start building Gallery HTML codes
					$image_files = get_files($images_dir);
					sort($image_files); // sort file name in ascending order
					if(count($image_files)) {
						$index = 0;
						foreach($image_files as $index=>$file) {
							$index++;
							$thumbnail_image = $thumbs_dir.$file;
							if(!file_exists($thumbnail_image)) {
								$extension = get_file_extension($thumbnail_image);
								if($extension) {
									make_thumb($images_dir.$file,$thumbnail_image,$thumbs_width);
								}
							}
							$html_gc .= "<div class=\"element\"><a href=\"".$images_dir.$file."\" class=\"fancybox-button\" rel=\"fancybox-button\" title=\"".$file."\"><img src=\"".$thumbnail_image."\" /></a></div>\r\n";
						}
						$html_gc .= "\r\n";
						echo $html_gc;
					}
					else {
						echo '<p>There are no images in this gallery.</p>';
					}
					?>
				</div><!-- /gallery -->				
			</div><!-- /row -->
		</main>
		<div class="pg-divider"></div>
		
		<?php
		require_once('footer.php');
		?>
	</div><!-- /container -->
	
</body>
</html>