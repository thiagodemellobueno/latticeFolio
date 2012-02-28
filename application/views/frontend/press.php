<h1><?=$content['main']['title'];?></h1>

<h2>pressItem</h2>

<ul id="pressItem" >
<?foreach($content['pressItem'] as $pressItemItem):?>
  <li class="pressItem">
   <h2><?=$pressItemItem['title'];?></h2>

   <p class="date"> <?=$pressItemItem['date'];?></p>

   <p class="blurb"> <?=$pressItemItem['blurb'];?></p>

   <p class="bodyCopy"> <?=$pressItemItem['bodyCopy'];?></p>

   <?if(is_object($pressItemItem['image'])):?>
    <img id="image" src="<?=latticeurl::site($pressItemItem['image']->original->fullpath);?>" width="<?=$pressItemItem['image']->original->width;?>" height="<?=$pressItemItem['image']->original->height;?>" alt="<?=$pressItemItem['image']->original->filename;?>" />
   <?endif;?>

   <p class="imageDescription"> <?=$pressItemItem['imageDescription'];?></p>

   <p class="link"> <?=$pressItemItem['link'];?></p>

  </li>
<?endforeach;?>
</ul>

