<div id="gallery" class="slideshow clearFix">
	<div class="slideshowPrev"><a href="#" style="opacity: 0.75; ">Prev</a></div>
	<div class="slideshowNext"><a href="#" style="opacity: 0.75; ">Next</a></div>
	<div class="pane">
		<div class="images">
			<?foreach($content['main']['exhibitionGallery'] as $exhibitionGalleryItem):?>
			<div class="galleryImage">  
				<?if(is_object($exhibitionGalleryItem['image'])):?>
				<img src="<?=latticeurl::site($exhibitionGalleryItem['image']->exhibitionThumb->fullpath);?>" width="<?=$exhibitionGalleryItem['image']->exhibitionThumb->width;?>" height="<?=$exhibitionGalleryItem['image']->exhibitionThumb->height;?>" alt="<?=$exhibitionGalleryItem['image']->exhibitionThumb->filename;?>" />
				<?endif;?>
			</div>
			<?endforeach;?>
		</div>
	</div>
</div>

<div id="exhibition" class="container_12">
	<h2 class="grid_7 alpha"> <?=$content['main']['title'];?></h2>
	<div class="shareLinks grid_4">
		<a target="blank" rel="nofollow" href="http://twitter.com/home?status=<?=urlencode( $content['main']['slug'] );?>%20<?=urlencode(url::base('http'));?>exhibitions"> <img src="<?=url::base();?>application/views/images/twitter.png"/></a>
		<a target="blank" rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?=urlencode(url::base('http').$content['main']['slug']);?>&t=<?=urlencode($content['main']['title']);?>"><img src="<?=url::base();?>application/views/images/facebook.png"/></a> 
	</div>
	<h3 class="dates grid_12 alpha"><?=date( "F j, Y", strtotime( $content['main']['startDate'] ) );?>-<?=date( "F j, Y", strtotime( $content['main']['endDate'] ) );?></h3>

	<div class="grid_6 alpha">
		<p class="blurb"><?=$content['main']['blurb'];?></p>
		<p class="bodyCopy"><?=$content['main']['bodyCopy'];?></p>
	</div>
	<div class="grid_5 push_1">
		<?if(is_object($content['main']['PDF'])):?>
		<h3><a class="pdflink" href="<?=$content['main']['PDF']->fullpath;?>">Press Release</a></h3>
		<?endif;?>
	</div>
</div>
