<div class="container_12">

<div class="workHeader"
<p id="exHeadline" style="float:left;"><?=$content['main']['title'];?></p>
</div>
<div class="shareLinks">

<a target="blank" rel="nofollow" href="http://twitter.com/home?status=<?=urlencode( $content['main']['slug'] );?>%20<?=urlencode(url::base('http'));?>exhibitions"  class="<?echo latticeview::withinSubtree('exhibitions') ? "active" : "";?>"> <img src="<?=url::base();?>application/views/images/twitter.png"/></a>


<a target="blank" rel="nofollow" href="http://www.facebook.com/sharer/sharer.php?u=<?=urlencode(url::base('http'));?>exhibitions"  class="<?echo latticeview::withinSubtree('artists') ? "exhibitions" : "";?>"><img src="<?=url::base();?>application/views/images/facebook.png"/></a>


</div>

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
        <a href="<?=url::base('http').$workItem['slug'];?>">
                  <img class="" src="<?=latticeurl::site($workItem['image']->original->fullpath);?>" width="<?=$workItem['image']->original->width;?>" height="<?=$workItem['image']->original->height;?>" alt="<?=$workItem['image']->original->filename;?>" />
</a>
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
<div class="linksHeader">
<?if(is_object($content['main']['bioPDF'])):?>
<a href="<?=$content['main']['bioPDF']->fullpath;?>"><?=$content['main']['bioPDF']->filename;?><h3 style="float:left;">Download Bio</h3><img style="float:right;" id="pdf" src="<?=url::base();?>application/views/images/icon_pdf.gif"/></a>
</div>
<?endif;?>


<h3>Links and other Media</h3>
<div id="links" >
<?foreach($content['main']['links'] as $linksItem):?>
  
  <a href="<?=$linksItem['link'];?>"><?=$linksItem['linkLabel'];?></a>

<?endforeach;?>

</div>
</div>

