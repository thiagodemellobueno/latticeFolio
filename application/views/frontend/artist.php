
<div class="container_12">
	<h2 class="artist-name page-title"><?=$content['main']['title'];?></h2>
</div>

<?foreach($content['works'] as $worksItem):?>
<div id="gallery" class="slideshow clearFix">
	
	<div class="slideshowPrev"><a href="#" style="opacity: 0.75; ">Prev</a></div>
	<div class="slideshowNext"><a href="#" style="opacity: 0.75; ">Next</a></div>
	
	<div class="pane">
		<div class="images" style="width: 6622px;">
		<?foreach($worksItem['work'] as $workItem):?>
			<div class="galleryImage">   
			<?if(is_object($workItem['image'])):?>
				<a title="<?=htmlentities($workItem['title'] . " " . $workItem['title'] . " " . $workItem['media'] . " " . $workItem['dimensions']);?>" href="<?=url::base('http').$workItem['slug'];?>">
					<img src="<?=latticeurl::site($workItem['image']->workImage->fullpath );?>" width="<?=$workItem['image']->workImage->width;?>" height="<?=$workItem['image']->workImage->height;?>" alt="<?=htmlentities( $workItem['title'] . " " . $workItem['title'] . " " . $workItem['media'] . " " . $workItem['dimensions'] );?>" />
				</a>
			<?endif;?>
			</div>
		<?endforeach;?>
		</div>      
	</div>

</div>
<?endforeach;?>

<div class="container_12">

	<div class="grid_6">
		<div class="shareLinks">
			<a target="blank" rel="nofollow" href="http://twitter.com/home?status=<?=urlencode( $content['main']['slug'] );?>%20<?=urlencode(url::base('http'));?>exhibitions"  class="<?echo latticeview::withinSubtree('exhibitions') ? "active" : "";?>"> <img src="<?=url::base();?>application/resources/images/twitter.png" alt="twitter logo"/></a>
			<a target="blank" rel="nofollow" href="http://www.facebook.com/sharer/sharer.php?u=<?=urlencode(url::base('http'));?>exhibitions"  class="<?echo latticeview::withinSubtree('artists') ? "exhibitions" : "";?>"><img src="<?=url::base();?>application/resources/images/facebook.png" alt="facebook logo" /></a>
		</div>

		<p class="bio"> <?=$content['main']['bio'];?></p>

		<div id="cvListing" >
			<?if(count($content['cvListing']) > 0 ):?>
			<?foreach($content['cvListing'] as $cvListingItem):?>
 			<div class="cvListing">
				<h3><?=$cvListingItem['title'];?></h3>
				<div>
					<?=$cvListingItem['bodyCopy'];?>
				</div>
 			</div>
			<?endforeach;?>
			<?endif;?>
		</div>
	</div>

	<div class="grid_5 push_1">

		<?if( $content['main']['bioPDF']->filename && is_object($content['main']['bioPDF']) ):?>
			<h3><a class="pdflink" href="<?=$content['main']['bioPDF']->fullpath;?>" target="_blank">Bio PDF</a></h3>
		<?endif;?>

		<?if(count( $content['main']['links'] ) ):?>
		<div id="links" class="clearFix">
		<h3>Links and other Media</h3>
		<ul>
		<?foreach($content['main']['links'] as $linksItem):?>
			<li><a href="<?=$linksItem['link'];?>"><?=$linksItem['linkLabel'];?></a></li>
		<?endforeach;?>
		</ul>
		</div>
		<?endif;?>
	</div>

</div>
