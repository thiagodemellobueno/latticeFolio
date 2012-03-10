<div class="container_12 theBottom">

	<div class="grid_6">
		<?if(is_object($content['main']['image'])):?>
		<img title="<?=$content['main']['imageDescription'];?>" id="image" src="<?=latticeurl::site($content['main']['image']->aboutImage->fullpath);?>" width="<?=$content['main']['image']->aboutImage->width;?>" height="<?=$content['main']['image']->aboutImage->height;?>" alt="<?=$content['main']['imageDescription'];?>" />
		<?endif;?>
		<p class="intro"><?=$content['main']['intro'];?></p>
		<p class="blurb"> <?=$content['main']['blurb'];?></p>
	</div>

	<div class="grid_5 push_1">
		<iframe width="379" height="360" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?client=safari&amp;q=J.+Cacciola+Gallery+info%40jcacciolagallery.com+537+West+23rd+Street++New+York,+NY+10011&amp;oe=UTF-8&amp;ie=UTF8&amp;hl=en&amp;hq=J.+Cacciola+Gallery+info%40jcacciolagallery.com&amp;hnear=537+W+23rd+St,+New+York,+10011&amp;t=m&amp;ll=40.751792,-74.003885&amp;spn=0.005852,0.008111&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe>
	</div>

</div>
