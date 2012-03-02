<div class="theBottom">
<div class="container_12">
<div class="workHeader">
<p id="exHeadline" style="float:left;"><?=$content['main']['slug'];?>-<?=$content['main']['title'];?></p>
</div>

<div class="shareLinks">

<a target="blank" rel="nofollow" href="http://twitter.com/home?status=<?=urlencode( $content['main']['slug'] );?>%20<?=urlencode(url::base('http'));?>exhibitions"  class="<?echo latticeview::withinSubtree('exhibitions') ? "active" : "";?>"> <img src="<?=url::base();?>application/views/images/twitter.png"/></a>


<a target="blank" rel="nofollow" href="http://www.facebook.com/sharer/sharer.php?u=<?=urlencode(url::base('http'));?>exhibitions "  class="<?echo latticeview::withinSubtree('exhibitions') ? "active" : "";?>"><img src="<?=url::base();?>application/views/images/facebook.png"/></a> 


</div>









<?if(is_object($content['main']['image'])):?>
 <img id="image" src="<?=latticeurl::site($content['main']['image']->workImageBig->fullpath);?>" width="<?=$content['main']['image']->workImageBig->width;?>" height="<?=$content['main']['image']->workImageBig->height;?>" alt="<?=$content['main']['image']->workImageBig->filename;?>" />
<?endif;?>


<div class="workMetaData">
<p class="media"> <?=$content['main']['media'];?></p>

</div><p class="dimensions"> <?=$content['main']['dimensions'];?></p>



</div>
</div>
