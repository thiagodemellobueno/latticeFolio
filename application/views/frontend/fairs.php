<div id="fairItems" class="container_12">
	

<?foreach( $content['fairItem'] as $key=>$fair):?>

<?if($key<2):?>
<!-- show big -->
<!--
SIZE IMAGES OR IMAGE WRAPPERS IN CSS WITH OVERFLOW HIDDEN
-->
<div class="fairItem large grid_6">
	<?if(is_object($fair['image'])):?>
  <div class="img">
		<img id="image" class="thumb" src="<?=latticeurl::site($fair['image']->large->fullpath);?>" width="<?=$fair['image']->large->width;?>" height="<?=$fair['image']->large->height;?>" alt="<?=$fair['image']->large->filename;?>" />
	</div>
	<?endif;?>
	<div>
		<h3><?=$fair['title'];?></h3>
		<h3 class="date"> <?=$fair['date'];?></h3>
		<p class="blurb"> <?=$fair['blurb'];?></p>
	</div>
</div>
<?elseif($key<8):?>
<div class="fairItem medium grid_4">
	<?if(is_object($fair['image'])):?>
  <div class="img">
		<img id="image" class="thumb" src="<?=latticeurl::site($fair['image']->med->fullpath);?>" width="<?=$fair['image']->med->width;?>" height="<?=$fair['image']->med->height;?>" alt="<?=$fair['image']->med->filename;?>" />
	</div>
	<?endif;?>
	<div>
		<h3><?=$fair['title'];?></h3>
		<h3 class="date"> <?=$fair['date'];?></h3>
		<p class="blurb"> <?=$fair['blurb'];?></p>
	</div>
</div>
<?else:?>
<div class="fairItem small grid_2">
	<div>
		<h3><?=$fair['title'];?></h3>
		<h3 class="date"> <?=$fair['date'];?></h3>
		<p class="blurb"> <?=$fair['blurb'];?></p>
	</div>
</div>
<?endif;?>
<?endforeach;?>
</div>