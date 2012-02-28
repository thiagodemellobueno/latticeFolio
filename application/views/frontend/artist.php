<div class="container_12">

<h2><?=$content['main']['title'];?></h2>

</div>

<?foreach($content['works'] as $worksItem):?>
    <div id="gallery" class="slideshow clearFix">
      <div class="slideshowPrev"><a href="#" style="opacity: 0.75; ">Prev</a></div>
      <div class="slideshowNext"><a href="#" style="opacity: 0.75; ">Next</a></div>
      <div class="pane">
        <div class="images" style="width: 6622px;">
          <?foreach($worksItem['work'] as $workItem):?>
            <?if(is_object($workItem['image'])):?>
                  <img class="galleryImage" src="<?=latticeurl::site($workItem['image']->original->fullpath);?>" width="<?=$workItem['image']->original->width;?>" height="<?=$workItem['image']->original->height;?>" alt="<?=$workItem['image']->original->filename;?>" />
            <?endif;?>
<!--            <h2><?=$workItem['title'];?></h2>

            <p class="media"> <?=$workItem['media'];?></p>

             <p class="dimensions"> <?=$workItem['dimensions'];?></p>
-->

          <?endforeach;?>

       
        </div>
      </div>
    </div>
<?endforeach;?>



<div class="container_12">

<div class="grid_6"
<p class="bio"> <?=$content['main']['bio'];?></p>

<div id="cvListing" class="clearfix" >
<?foreach($content['cvListing'] as $cvListingItem):?>
 <?=latticeview::Factory($cvListingItem)->view()->render();?>
<?endforeach;?>
</div>
</div>




<div class="grid_5 push_1">


<?if(is_object($content['main']['cv'])):?>
<a href="<?=$content['main']['cv']->fullpath;?>"><?=$content['main']['cv']->filename;?></a>

<?endif;?>


<h2>links</h2>

<div id="links" >
<?foreach($content['main']['links'] as $linksItem):?>
  
   <h2><?=$linksItem['title'];?></h2>

   <p class="link"> <?=$linksItem['link'];?></p>


<?endforeach;?>

</div>
</div>

