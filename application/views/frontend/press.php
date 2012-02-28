<div class="theBottom">


<div id="pressItem" class="container_12" >
<?foreach($content['pressItem'] as $pressItemItem):?>
   
<div class="grid_4">
<?if(is_object($pressItemItem['image'])):?>
     <img id="image" class="thumb" src="<?=latticeurl::site($pressItemItem['image']->pressImage->fullpath);?>" width="<?=$pressItemItem['image']->pressImage->width;?>" height="<?=$pressItemItem['image']->pressImage->height;?>" alt="<?=$pressItemItem['image']->pressImage->filename;?>" />
      <?endif;?>
</div>


<div class="pressItem grid_7 push_1">
   <h3><?=$pressItemItem['title'];?></h3>

   <h3 class="date"> <?=$pressItemItem['date'];?></h3>

   <p class="blurb"> <?=$pressItemItem['blurb'];?></p>

  </div>
<?endforeach;?>
</div>


</div>
