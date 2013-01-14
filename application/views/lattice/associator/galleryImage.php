<li class="associatorImage shadow" data-objectid="<?=$object->id;?>">
	<h4><?=$object->title;?></h4>
  <?if($object->image && $object->image->original):?>
  	<img src="<?=latticeurl::site($object->image->uithumb->fullpath);?>" width="<?=$object->image->uithumb->width;?>" height="<?=$object->image->uithumb->height?>" />
	<?endif;?>
  <div class="itemControls">
    <a class="associate" href="#">Associate This!</a>
    <a class="dissociate" href="#">Dissociate This!</a>
  </div>

</li>
