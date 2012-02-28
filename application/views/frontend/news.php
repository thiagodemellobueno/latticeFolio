<div class="theBottom">
<div class="container_12" id="newsItem" >
<?foreach($content['newsItem'] as $newsItemItem):?>

<div class="aBit">
  <div class="grid_4">
   <?if(is_object($newsItemItem['image'])):?>
       <img id="image" class="thumb" src="<?=latticeurl::site($newsItemItem['image']->newsImage->fullpath);?>" width="<?=$newsItemItem['image']->newsImage->width;?>" height="<?=$newsItemItem['image']->newsImage->height;?>" alt="<?=$newsItemItem['image']->newsImage->filename;?>" />
          <?endif;?>
</div>


  <div class="grid_7 push_1">
   <h2><?=$newsItemItem['title'];?></h2>

   <p class="date"> <?=$newsItemItem['date'];?></p>

   <p class="blurb"> <?=$newsItemItem['blurb'];?></p>
  </div>

</div>
<?endforeach;?>

</div>


<div class="clear"></div>
</div>
