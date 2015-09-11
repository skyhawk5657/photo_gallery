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

/** settings **/
$thumbs_width = 200;
$page_title = 'Photo Gallery';
$images_dir = 'gallery/201506_leoPark/';
$thumbs_dir = $images_dir .'thumbs/';
$album_title = 'Leo J. Ryan Memorial Park<br>San Mateo, CA';

// build Gallery HTML codes
$html_gc = ''; 
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
		$html_gc .= "<div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-3\"><div class=\"element\"><a href=\"".$images_dir.$file."\" class=\"fancybox-button\" rel=\"fancybox-button\" title=\"".$file."\"><img src=\"".$thumbnail_image."\" /></a></div></div>\r\n";
	}
	$html_gc .= "\r\n";
}
else {
	$html_gc = '<p>There are no images in this gallery.</p>';
}
					
// Include the header template:
require_once('header.php');
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
			<div class="gallery">
				<p class="album-title"><?php echo $album_title; ?></p>
				<div class="row">					
					
						<?php echo $html_gc; ?>
						
					</div>
				</div><!-- /gallery -->				
			</div><!-- /row -->
		</main>
		<div class="pg-divider"></div>
		
		<?php
		require_once('footer.php');
		?>
		
</body>
</html>