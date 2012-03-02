
<div class="container_12"
<p id="exHeadline"> <?=$content['main']['headline'];?> <?=$content['main']['startDate'];?>-<?=$content['main']['endDate'];?></p>

</div>

    <div id="gallery" class="slideshow clearFix">
      <div class="slideshowPrev"><a href="#" style="opacity: 0.75; ">Prev</a></div>
      <div class="slideshowNext"><a href="#" style="opacity: 0.75; ">Next</a></div>
      <div class="pane">
        <div class="images" style="width: 6622px;">
<?foreach($content['main']['exhibitionGallery'] as $exhibitionGalleryItem):?>
            <?if(is_object($exhibitionGalleryItem['image'])):?>
                  <img id="image" class="galleryImage" src="<?=latticeurl::site($exhibitionGalleryItem['image']->original->fullpath);?>" width="<?=$exhibitionGalleryItem['image']->original->width;?>" height="<?=$exhibitionGalleryItem['image']->original->height;?>" alt="<?=$exhibitionGalleryItem['image']->original->filename;?>" />
            <?endif;?>


<!--         <p class="media"> <?=$exhibitionGalleryItem['header'];?></p>

             <p class="description"> <?=$exhibitionGalleryItem['description'];?></p>
-->

          <?endforeach;?>
</div>
</div>
</div>


<div class="container_12 theBottom">
<div class="grid_6">
<p class="blurb"> <?=$content['main']['blurb'];?></p>

<p class="bodyCopy"> <?=$content['main']['bodyCopy'];?></p>
</div>

<div class="grid_5 push_1">
<div class="linksHeader">
<?if(is_object($content['main']['PDF'])):?>
<a href="<?=$content['main']['PDF']->fullpath;?>"><?=$content['main']['PDF']->filename;?><h3 style="float:left;"> Press Release</h3><img style="float:right;" id="pdf" src="<?=url::base();?>application/views/images/icon_pdf.gif"/></a>
</div>
<?endif;?>
</div>
</div>
