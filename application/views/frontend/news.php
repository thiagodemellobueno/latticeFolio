<div class="container_12">
	
<?foreach($content['newsItem'] as $key=>$newsItemItem):?>


<?if($key<2):?>
<!-- show big -->
<div class="newsItem grid_6">
  <div>
		<?if(is_object($newsItemItem['image'])):?>
		<img id="image" class="thumb" src="<?=latticeurl::site($newsItemItem['image']->small->fullpath);?>" width="<?=$newsItemItem['image']->small->width;?>" height="<?=$newsItemItem['image']->small->height;?>" alt="<?=$newsItemItem['image']->small->filename;?>" />
		<?endif;?>
	</div>
	<div>
		<h3><?=$newsItemItem['title'];?></h3>
		<h3 class="date"> <?=$newsItemItem['date'];?></h3>
		<p class="blurb"> <?=$newsItemItem['blurb'];?></p>
	</div>
</div>
<?elseif($key<8):?>
<div class="newsItem grid_4">
  <div>
		<?if(is_object($newsItemItem['image'])):?>
		<img id="image" class="thumb" src="<?=latticeurl::site($newsItemItem['image']->small->fullpath);?>" width="<?=$newsItemItem['image']->small->width;?>" height="<?=$newsItemItem['image']->small->height;?>" alt="<?=$newsItemItem['image']->small->filename;?>" />
		<?endif;?>
	</div>
	<div>
		<h3><?=$newsItemItem['title'];?></h3>
		<h3 class="date"> <?=$newsItemItem['date'];?></h3>
		<p class="blurb"> <?=$newsItemItem['blurb'];?></p>
	</div>
</div>

<?else:?>
<div class="newsItem grid_2">
	<div>
		<h3><?=$newsItemItem['title'];?></h3>
		<h3 class="date"> <?=$newsItemItem['date'];?></h3>
		<p class="blurb"> <?=$newsItemItem['blurb'];?></p>
	</div>
</div>
<?endif;?>
<?endforeach;?>
</div>