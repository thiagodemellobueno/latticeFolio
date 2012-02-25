<div class="container_12">

<h2><?=$content['main']['title'];?></h2>

</div>

    <div id="gallery" class="slideshow clearFix">
      <div class="slideshowPrev"><a href="#" style="opacity: 0.75; ">Prev</a></div>
      <div class="slideshowNext"><a href="#" style="opacity: 0.75; ">Next</a></div>
      <div class="pane">
        <div class="images" style="width: 6622px;">
          <?foreach($content['works'] as $worksItem):?>
            <?if(is_object($worksItem['image'])):?>
                  <img class="galleryImage" src="<?=latticeurl::site($worksItem['image']->original->fullpath);?>" width="<?=$worksItem['image']->original->width;?>" height="<?=$worksItem['image']->original->height;?>" alt="<?=$worksItem['image']->original->filename;?>" />
            <?endif;?>
            <h2><?=$worksItem['title'];?></h2>

            <p class="media"> <?=$worksItem['media'];?></p>

             <p class="dimensions"> <?=$worksItem['dimensions'];?></p>


          <?endforeach;?>

       
        </div>
      </div>
    </div>



<div class="container_12">

<div class="grid_6"
<p class="bio"> <?=$content['main']['bio'];?></p>

<?if(is_object($content['main']['cv'])):?>
<a href="<?=$content['main']['cv']->fullpath;?>"><?=$content['main']['cv']->filename;?></a>

<?endif;?>

</div>

<div class="grid_5 push_1">
<h2>links</h2>

<div id="links" >
<?foreach($content['main']['links'] as $linksItem):?>
  
   <h2><?=$linksItem['title'];?></h2>

   <p class="link"> <?=$linksItem['link'];?></p>


<?endforeach;?>



<h2>cvListing</h2>

<ul id="cvListing" >
<?foreach($content['cvListing'] as $cvListingItem):?>
 <?=latticeview::Factory($cvListingItem)->view()->render();?>
<?endforeach;?>
</ul>
</div>
</div>

