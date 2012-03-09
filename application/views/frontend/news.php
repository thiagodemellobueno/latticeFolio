<div class="theBottom">
<div class="container_12" id="newsItem" >
<?foreach($content['newsItem'] as $newsItemItem):?>

<div class="aBit">
  <div class="grid_4">
   <?if(is_object($newsItemItem['image'])):?>
       <img id="image" class="thumb" src="<?=latticeurl::site($newsItemItem['image']->newsImage->fullpath);?>" width="<?=$newsItemItem['image']->newsImage->width;?>" height="<?=$newsItemItem['image']->newsImage->height;?>" alt="<?=$newsItemItem['image']->newsImage->filename;?>" />
          <?endif;?>
</div>


  <div class="grid_7">
   <h3><?=$newsItemItem['title'];?></h3>

   <h3 class="date"> <?=$newsItemItem['date'];?></h3>

   <p class="blurb"> <?=$newsItemItem['blurb'];?></p>
  </div>

</div>
<div class="clearfix"></div>
<?endforeach;?>

</div>


<div class="clear"></div>
</div>
