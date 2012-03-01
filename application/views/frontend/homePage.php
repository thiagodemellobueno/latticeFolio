
    <div id="gallery" class="slideshow clearFix">
      <div class="slideshowPrev"><a href="#" style="opacity: 0.75; ">Prev</a></div>
      <div class="slideshowNext"><a href="#" style="opacity: 0.75; ">Next</a></div>
      <div class="pane">
        <div class="images" style="width: 6622px;">
          <?foreach($content['main']['homeGallery'] as $homeGalleryItem):?>
            <?if(is_object($homeGalleryItem['image'])):?>
                  <img class="galleryImage" src="<?=latticeurl::site($homeGalleryItem['image']->original->fullpath);?>" width="<?=$homeGalleryItem['image']->original->width;?>" height="<?=$homeGalleryItem['image']->original->height;?>" alt="<?=$homeGalleryItem['image']->original->filename;?>" />

            <?endif;?>

            <?endforeach;?>

            
            </div>
                    </div>
                        </div>




<div id="main" class="container_12" role="main">

<h2 class="homeTitle"> <?=$content['main']['header'];?></h2>
<h3 class="homeDate"> <?=$content['main']['subtitle'];?></h3>


<p class="blurb" id="home"> <?=$content['main']['blurb'];?></p>

<p class="link"> <?=$content['main']['link'];?></p>


</div>



