<h1><?=$content['main']['title'];?></h1>

<p class="date"> <?=$content['main']['date'];?></p>

<p class="blurb"> <?=$content['main']['blurb'];?></p>

<p class="bodyCopy"> <?=$content['main']['bodyCopy'];?></p>

<?if(is_object($content['main']['image'])):?>
 <img id="image" src="<?=latticeurl::site($content['main']['image']->original->fullpath);?>" width="<?=$content['main']['image']->original->width;?>" height="<?=$content['main']['image']->original->height;?>" alt="<?=$content['main']['image']->original->filename;?>" />
<?endif;?>

<p class="imageDescription"> <?=$content['main']['imageDescription'];?></p>

<p class="link"> <?=$content['main']['link'];?></p>

