<div id="newsItems" class="container_12">
	

<?foreach($content['newsItem'] as $key=>$newsItemItem):?>

<?if($key<2):?>
<!-- show big -->
<!--
SIZE IMAGES OR IMAGE WRAPPERS IN CSS WITH OVERFLOW HIDDEN
-->
<div class="newsItem large grid_6">
	<?if(is_object($newsItemItem['image'])):?>
  <div class="img">
		<img id="image" class="thumb" src="<?=latticeurl::site($newsItemItem['image']->large->fullpath);?>" width="<?=$newsItemItem['image']->large->width;?>" height="<?=$newsItemItem['image']->large->height;?>" alt="<?=$newsItemItem['image']->large->filename;?>" />
	</div>
	<?endif;?>
	<div>
		<h3><?=$newsItemItem['title'];?></h3>
		<h3 class="date"> <?=$newsItemItem['date'];?></h3>
		<p class="blurb"> <?=$newsItemItem['blurb'];?></p>
	</div>
</div>
<?elseif($key<8):?>
<div class="newsItem medium grid_4">
	<?if(is_object($newsItemItem['image'])):?>
  <div class="img">
		<img id="image" class="thumb" src="<?=latticeurl::site($newsItemItem['image']->med->fullpath);?>" width="<?=$newsItemItem['image']->med->width;?>" height="<?=$newsItemItem['image']->med->height;?>" alt="<?=$newsItemItem['image']->med->filename;?>" />
	</div>
	<?endif;?>
	<div>
		<h3><?=$newsItemItem['title'];?></h3>
		<h3 class="date"> <?=$newsItemItem['date'];?></h3>
		<p class="blurb"> <?=$newsItemItem['blurb'];?></p>
	</div>
</div>
<?else:?>
<div class="newsItem small grid_2">
	<div>
		<h3><?=$newsItemItem['title'];?></h3>
		<h3 class="date"> <?=$newsItemItem['date'];?></h3>
		<p class="blurb"> <?=$newsItemItem['blurb'];?></p>
	</div>
</div>
<?endif;?>
<?endforeach;?>
</div>