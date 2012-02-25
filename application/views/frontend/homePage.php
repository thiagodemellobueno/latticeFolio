
    <div id="gallery" class="slideshow clearFix">
      <div class="slideshowPrev"><a href="#" style="opacity: 0.75; ">Prev</a></div> 
      <div class="slideshowNext"><a href="#" style="opacity: 0.75; ">Next</a></div>
      <div class="pane">
        <div class="images" style="width: 6622px; ">
          <img class="galleryImage" src="media/jwinter-ambiflu.jpg" width="449" height="360" alt="J Winter - Ambi Flu">

          <img class="galleryImage" src="media/pole-dark.jpg" width="724" height="360" alt="pole-dark">
          <img class="galleryImage" src="media/paola-ochoa-second-nature.jpg" width="237" height="360" alt="paola-ochoa-second-nature">
          <img class="galleryImage" src="media/d.jpg" width="480" height="360" alt="">
          <img class="galleryImage" src="media/rss-coeficient.jpg" width="445" height="360" alt="rss-coeficient">
          <img class="galleryImage" src="media/jerry-185.jpg" width="240" height="360" alt="jerry-185">
        </div>
      </div>
    </div>


<ul id="homeGallery" >
<?foreach($content['main']['homeGallery'] as $homeGalleryItem):?>
  <li class="galleryImage">
   <h2><?=$homeGalleryItem['title'];?></h2>

   <?if(is_object($homeGalleryItem['image'])):?>
    <img id="image" src="<?=latticeurl::site($homeGalleryItem['image']->original->fullpath);?>" width="<?=$homeGalleryItem['image']->original->width;
    ?>" height="<?=$homeGalleryItem['image']->original->height;?>" alt="<?=$homeGalleryItem['image']->original->filename;?>" />
   <?endif;?>

       <p class="header"> <?=$homeGalleryItem['header'];?></p>

   <p class="description"> <?=$homeGalleryItem['description'];?></p>

  </li>
<?endforeach;?>
</ul>




<div id="main" class="container_12" role="main">
<h2 class="title"> <?=$content['main']['header'];?></h2>

<h3 class="date"> <?=$content['main']['subtitle'];?></h3>

<p class="blurb"> <?=$content['main']['blurb'];?></p>

<p class="link"> <?=$content['main']['link'];?></p>

</div>



