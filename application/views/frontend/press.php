<div class="container_12">

	<?foreach($content['pressItem'] as $pressItemItem):?>
	<div class="pressitem clearfix">

		<?if(is_object($pressItemItem['image'])):?>
		<img id="image" class="grid_3 suffix_1 alpha thumb" src="<?=latticeurl::site($pressItemItem['image']->pressImage->fullpath);?>" width="<?=$pressItemItem['image']->pressImage->width;?>" height="<?=$pressItemItem['image']->pressImage->height;?>" alt="<?=$pressItemItem['image']->pressImage->filename;?>" />
		<?endif;?>
	
		<div class="grid_8 omega">
			<h3><?=$pressItemItem['title'];?></h3>
			<h3 class="date"> <?=$pressItemItem['date'];?></h3>
			<p class="blurb"> <?=$pressItemItem['blurb'];?></p>
	  </div>
	</div>
	<?endforeach;?>

</div>
