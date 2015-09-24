<?php
/**
 * Hyview Photo Gallery
 * 
 * This app will retrieve all image files from a given folder and display it as a gallery.
 *
 * Date created: 9/9/2015; Last updated: 9/22/2015; touch 6/16/2018
 */

require_once('config.php');
require_once('functions.php');

/*** settings ***/
$thumbs_width = 200;
$page_title = 'Photo Gallery';
$gallery_dir = "gallery";
$album_notes_file = "album_notes.php";

// check if an Album directory is passed
if ( isset($_GET["an"] ) && $_GET["an"] ) {
	$album_dir = $_GET["an"];
} else {
	// defult album
	$album_dir = "201506_LeoPark";
}

// build and check if such directoy exists
$images_dir = $gallery_dir."/".$album_dir."/";
if ( !file_exists($images_dir) ) {
	$html_gc = "<p style='color:white;text-align:center;'>Sorry, no such album (".$images_dir.") ...</p>";
	$album_title = "None";
} else {
	$thumbs_dir = $images_dir .'thumbs/';
	// retrieve album related info
	$album_notes = $images_dir.$album_notes_file;
	if (file_exists($album_notes)) {
		include $album_notes;
	} else {
		$album_title = "";
		$album_date = "";
	}	

	// build Gallery HTML codes
	$html_gc = ''; 
	$image_files = get_files($images_dir);
	sort($image_files); // sort file name in ascending order
	if(count($image_files)) {
		$index = 0;
		$html_gc = "";
		foreach($image_files as $index=>$file) {
			$index++;
			$thumbnail_image = $thumbs_dir.$file;
			if(!file_exists($thumbnail_image)) {
				$extension = get_file_extension($thumbnail_image);
				if($extension) {
					make_thumb($images_dir.$file,$thumbnail_image,$thumbs_width);
				}
			}
			$html_gc .= "<div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-3\"><div class=\"element\"><a href=\"".$images_dir.$file."\" class=\"fancybox\" rel=\"fancybox\"><img src=\"".$thumbnail_image."\" /></a></div></div>\r\n";
		}
		$html_gc .= "\r\n";
	} else {
		$html_gc = "<p style='color:white;text-align:center;'>There are no images in the specified album.</p>";
		$album_title = "None";
	}
}
				
// Include the header template:
require_once('header.php');
?>

<body>
	<div class="container">
		<header>
			<div class="row">
				<div class="col-xs-12 col-sm-3 site-logo">
					<a href="<?php echo $site["url"]; ?>"><img src="<?php echo $img_url; ?>logo.png"></a>
				</div>
				<div class="col-xs-12 col-sm-9 header-title">
					<div class="ht-content">
						<span><?php echo $page_title; ?></span>
					</div>
				</div>
			</div>
		</header>

		<div>
			<p>Name: <input type="text" ng-model="name"></p>
			<p ng-bind="name"></p>
		</div>

		<main class="gallery">
			<p class="album-title"><?php echo $album_title; ?></p>				
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#tab1" aria-controls="photos" role="tab" data-toggle="tab">Photos 相片</a></li>
				<li role="presentation"><a href="#tab2" aria-controls="notes" role="tab" data-toggle="tab">Notes 備註</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="tab1">
					<div class="row">
							<?php echo $html_gc; ?>
					</div>					
				</div>
				<div role="tabpanel" class="tab-pane" id="tab2">
					<div class="row">
						<?php
						if ( isset($album_description) ) {
							echo $album_description;
						} else {
							echo "N/A";
						}						
						?>
					</div>
				</div>
			</div>
		</main>		
		
		<?php
		require_once('footer.php');
		?>
		
</body>
</html>