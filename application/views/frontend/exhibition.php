<h1><?=$content['main']['title'];?></h1>

<p class="dateRange"> <?=$content['main']['dateRange'];?></p>

<p class="headline"> <?=$content['main']['headline'];?></p>

<p class="blurb"> <?=$content['main']['blurb'];?></p>

<p class="bodyCopy"> <?=$content['main']['bodyCopy'];?></p>

<?if(is_object($content['main']['PDF'])):?>
<a href="<?=$content['main']['PDF']->fullpath;?>"><?=$content['main']['PDF']->filename;?></a>

<?endif;?>

<h2>exhibitionGallery</h2>

<ul id="exhibitionGallery" >
<?foreach($content['main']['exhibitionGallery'] as $exhibitionGalleryItem):?>
  <li class="galleryImage">
   <h2><?=$exhibitionGalleryItem['title'];?></h2>

   <?if(is_object($exhibitionGalleryItem['image'])):?>
    <img id="image" src="<?=latticeurl::site($exhibitionGalleryItem['image']->original->fullpath);?>" width="<?=$exhibitionGalleryItem['image']->original->width;?>" height="<?=$exhibitionGalleryItem['image']->original->height;?>" alt="<?=$exhibitionGalleryItem['image']->original->filename;?>" />
   <?endif;?>

   <p class="header"> <?=$exhibitionGalleryItem['header'];?></p>

   <p class="description"> <?=$exhibitionGalleryItem['description'];?></p>

  </li>
<?endforeach;?>
</ul>

