
<div id="gallery" class="slideshow clearFix">

	<div class="slideshowPrev"><a href="#" style="opacity: 0.75; ">Prev</a></div>
	<div class="slideshowNext"><a href="#" style="opacity: 0.75; ">Next</a></div>

	<div class="pane">
		<div class="images" style="width: 6622px;">
		<?foreach($content['main']['homeGallery'] as $homeGalleryItem):?>
			<?if($homeGalleryItem['image']->exhibitionThumb->fullpath):?>
			<img class="galleryImage" src="<?=latticeurl::site($homeGalleryItem['image']->exhibitionThumb->fullpath);?>" width="<?=$homeGalleryItem['image']->exhibitionThumb->width;?>" height="<?=$homeGalleryItem['image']->exhibitionThumb->height;?>" alt="<?=$homeGalleryItem['image']->exhibitionThumb->filename;?>" />
			<?endif;?>
		<?endforeach;?>
		</div>
	</div>

</div>

<div id="main" class="container_12">

	<h2 class="homeTitle">
		<a href="<?=$content['main']['link'];?>"><?=$content['main']['header'];?></a></h2>
	<h3>
		<a href="<?=$content['main']['link'];?>"><?=$content['main']['subtitle'];?></a>
	</h3>
	<p class="blurb grid_7">
		<a href="<?=$content['main']['link'];?>"><?=$content['main']['blurb'];?></a>
	</p>

	<div class="grid_7 alpha clearFix upcoming">
		<h3><a href="<?=$content['main']['upcomingLink'];?>"><?=$content['main']['upcomingTitle'];?></a></h3>

		<?if(is_object($content['main']['upcomingImage']->frontend->fullpath)):?>
		<img class="galleryImage" src="<?=latticeurl::site($content['main']['upcomingImage']->frontend->fullpath);?>" width="<?=$content['main']['upcomingImage']->frontend->width;?>" height="<?=$content['main']['upcomingImage']->frontend->height;?>" alt="$content['main']['title']" />
		<?endif;?>

		<p class="blurb grid_7"><a href="<?=$content['main']['upcomingLink'];?>"><?=$content['main']['upcomingBlurb'];?></a></p>
	</div>

</div>



