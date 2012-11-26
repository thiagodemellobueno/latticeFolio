<div id="newsItems" class="container_12">
	

<?foreach($content['newsItem'] as $key=>$item):?>

<?if($key<2):?>
<!-- show big -->
<!--
SIZE IMAGES OR IMAGE WRAPPERS IN CSS WITH OVERFLOW HIDDEN
-->
<div class="newsItem large grid_6">
	<?if(is_object($item['image'])):?>
  <div class="img">
		<img id="image" class="thumb" src="<?=latticeurl::site($item['image']->large->fullpath);?>" width="<?=$item['image']->large->width;?>" height="<?=$item['image']->large->height;?>" alt="<?=$item['image']->large->filename;?>" />
	</div>
	<?endif;?>
	<div>
		<h3><?=$item['title'];?></h3>
		<h3 class="date"> <?=$item['date'];?></h3>
		<p class="blurb"> <?=$item['blurb'];?></p>
	</div>
</div>
<?elseif($key<8):?>
<div class="newsItem medium grid_4">
	<?if(is_object($item['image'])):?>
  <div class="img">
		<img id="image" class="thumb" src="<?=latticeurl::site($item['image']->med->fullpath);?>" width="<?=$item['image']->med->width;?>" height="<?=$item['image']->med->height;?>" alt="<?=$item['image']->med->filename;?>" />
	</div>
	<?endif;?>
	<div>
		<h3><?=$item['title'];?></h3>
		<h3 class="date"> <?=$item['date'];?></h3>
		<p class="blurb"> <?=$item['blurb'];?></p>
	</div>
</div>
<?else:?>
<div class="newsItem small grid_2">
	<div>
		<h3><?=$item['title'];?></h3>
		<h3 class="date"> <?=$item['date'];?></h3>
		<p class="blurb"> <?=$item['blurb'];?></p>
	</div>
</div>
<?endif;?>
<?endforeach;?>
</div>