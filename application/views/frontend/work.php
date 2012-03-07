<div class="theBottom">

	<div class="container_12">
		
		<div class="workHeader">
			<p id="exHeadline" class="floatLeft"><?=$content['main']['title'];?></p>
		</div>

		<div class="shareLinks">
			<a target="blank" rel="nofollow" href="http://twitter.com/home?status=<?=urlencode( $content['main']['slug'] );?>%20<?=urlencode(url::base('http'));?>exhibitions"> <img src="<?=url::base();?>application/views/images/twitter.png"/></a>
			<a target="blank" rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?=urlencode(url::base('http').$content['main']['slug']);?>&t=<?=urlencode($content['main']['title']." ".$content['main']['media']." ".$content['main']['dimensions']);?>"><img src="<?=url::base();?>application/views/images/facebook.png"/></a> 
		</div>

		<?if(is_object($content['main']['image'])):?>
		<img id="image" class="workImage" src="<?=latticeurl::site($content['main']['image']->workImageBig->fullpath);?>" width="<?=$content['main']['image']->workImageBig->width;?>" height="<?=$content['main']['image']->workImageBig->height;?>" alt="<?=$content['main']['title'];?> <?=$content['main']['media'];?> <?=$content['main']['dimensions'];?>" />
		<?endif;?>

		<p class="media"><?=$content['main']['media'];?></p>
		<p class='dimensions'><?=$content['main']['dimensions'];?></p>

	</div>

</div>
