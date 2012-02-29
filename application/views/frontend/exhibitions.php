<div class="theBottom2">
<div class="container_12">

<?foreach($content['exhibition'] as $exhibitionItem):?>
<a href="<?=url::base('http').$exhibitionItem['slug'];?>">
<div class="grid_4">
  <img class="thumb" width="221px" height="147"></img>
</div>

<div class="grid_7">

  <h3 class="headline"> <?=$exhibitionItem['headline'];?></h3>

  <h3 class="dates"> <?=$exhibitionItem['startDate'];?> - <?=$exhibitionItem['endDate'];?></h3>

     <p class="blurb"> <?=$exhibitionItem['blurb'];?></p>
</div>
<div class="clear"></div>


<?endforeach;?>
</a>
</div>
</div>

<div class="theBottom container_12">
<h2>Older Exhibitions</h2>

<div id="olderExhibitions" >
<?foreach($content['olderExhibitions'] as $olderExhibitionsItem):?>
  <div class="grid_4">
   
   <?if(is_object($olderExhibitionsItem['image'])):?>
       <img id="image" class="thumb" src="<?=latticeurl::site($olderExhibitionsItem['image']->archiveImage->fullpath);?>" width="<?=$olderExhibitionsItem['image']->archiveImage->width;?>" height="<?=$olderExhibitionsItem['image']->archiveImage->height;?>" alt="<?=$olderExhibitionsItem['image']->archiveImage->filename;?>" />
          <?endif;?>
</div>

<div class="grid_7">
    <h3><?=$olderExhibitionsItem['title'];?></h3>

   <h3 class="date"> <?=$olderExhibitionsItem['date'];?></h3>

   <p class="blurb"> <?=$olderExhibitionsItem['blurb'];?></p>

  </div>
<?endforeach;?>
</div>












</div>



<div class="clear"></div>
</div>
