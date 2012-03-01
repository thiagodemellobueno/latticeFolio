<div class="container_12">

<p id="exHeadline"><?=$content['main']['title'];?></p>

</div>

<?foreach($content['works'] as $worksItem):?>
    <div id="gallery" class="slideshow clearFix">
      <div class="slideshowPrev"><a href="#" style="opacity: 0.75; ">Prev</a></div>
      <div class="slideshowNext"><a href="#" style="opacity: 0.75; ">Next</a></div>
      <div class="pane">
        <div class="images" style="width: 6622px;">

     <?foreach($worksItem['work'] as $workItem):?>
        <div class="galleryImage">   
         <?if(is_object($workItem['image'])):?>
                  <img class="" src="<?=latticeurl::site($workItem['image']->original->fullpath);?>" width="<?=$workItem['image']->original->width;?>" height="<?=$workItem['image']->original->height;?>" alt="<?=$workItem['image']->original->filename;?>" />

<?endif;?>
<div class="workMetaData">
  <p class="workTitle"><?=$workItem['title'];?></p>
<div class="mediaInfo">
  <p class="mediaUsed"> <?=$workItem['media'];?><br/>
  <?=$workItem['dimensions'];?></p>
</div>

</div>

</div>
          <?endforeach;?>


       </div>      
      </div>
    </div>
<?endforeach;?>



<div class="container_12">

<div class="grid_6"
<p class="bio"> <?=$content['main']['bio'];?></p>

<div id="cvListing" >
<?foreach($content['cvListing'] as $cvListingItem):?>
  <div class="cvListing">
   <h3><?=$cvListingItem['title'];?></h3>

<div id="cvListItem" >
<?foreach($cvListingItem['cvListItem'] as $cvListItemItem):?>
  

   <p class="entry"> <?=$cvListItemItem['entry'];?></p>

  
<?endforeach;?>
</div>


  </div>
<?endforeach;?>
</div>

</div>






<div class="grid_5 push_1">

<h3>Download Bio</h3>
<?if(is_object($content['main']['bioPDF'])):?>
<a href="<?=$content['main']['bioPDF']->fullpath;?>"><?=$content['main']['bioPDF']->filename;?></a>

<?endif;?>


<h3>Links and other Media</h3>
<div id="links" >
<?foreach($content['main']['links'] as $linksItem):?>
  
  <a href="<?=$linksItem['link'];?>"><?=$linksItem['linkLabel'];?></a>

<?endforeach;?>

</div>
</div>

