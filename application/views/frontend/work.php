<?if(is_object($content['main']['image'])):?>
<?php
	//find the right parent object for an artist (leave this at the top fo the page)
	//start our search for the parent object by loading a lattice object for what we have on the page
	$artist = Graph::object($content["main"]["id"]);

	//get the prev and next links from the collection
	//sortorder field isn't in this version of lattice? 
	//sorting on slug, which seems iffy.
	$parent = $artist->getLatticeParent();
	$collection = Graph::object()->latticeChildrenFilter($parent->id, 'lattice')->publishedFilter();
	$next_id =  $collection->next('sortorder',$content["main"]["id"],'lattice');
	$prev_id =  $collection->prev('sortorder',$content["main"]["id"],'lattice');

	//now get the slugs from the id's (load the objects)
	$next = Graph::object($next_id);
	$prev = Graph::object($prev_id);


	//first, get the id for an 'artist' content type
	$artist_type_id = ORM::Factory('objecttype')->where('objecttypename','=','artist')->find()->as_array('id');
	$artist_type_id = $artist_type_id["id"];
	//now we ascend the tree until we get to an artist object (or bail at 10 tries)
	$max = 0;
	while ($artist->objecttype_id != $artist_type_id && ($max < 10) ) {
	$max++;
	$artist= $artist->getLatticeParent();
	}
      
?>


<?if (strlen($prev->title)>0):?>
<div class="slideshowPrev"><a href="/<?=$prev->slug?>">Prev</a></div>
<?endif;?>

<?php if (strlen($next->title)>0):?>
<div class="slideshowNext"><a href="<?=$next->slug?>">Next</a></div>
<?endif;?>


<div class="container_12">	
			<img id="image" class="workImage" src="<?=latticeurl::site($content['main']['image']->workImageBig->fullpath);?>" width="<?=$content['main']['image']->workImageBig->width;?>" height="<?=$content['main']['image']->workImageBig->height;?>" alt="<?=$content['main']['title'];?> <?=$content['main']['media'];?> <?=$content['main']['dimensions'];?>" />

		
		<h3 class="work-name page-title">
			<div class="backarrow"><a href="<?=$artist->slug;?>">&crarr;</a></div>
			<!-- display your artist name and slug here (move this to wherever it fits the design) -->
  	  <?if( $artist->objecttype_id == $artist_type_id ):?>
		  <a href="<?=$artist->slug;?>"><?=$artist->title?>&mdash;</a>		
			<?php endif?>
			<?=$content['main']['title'];?>
		</h3>

		<p class="work_meta">
			<span class="media"><?=$content['main']['media'];?></span><br/>
			<span class='dimensions'><?=$content['main']['dimensions'];?></span><br/>
			<?=($content['main']['privatecollection'])? "private collection" : "";?>
		</p>

		<div class="shareLinks">
			<a target="blank" rel="nofollow" href="http://twitter.com/home?status=<?=urlencode( $content['main']['slug'] );?>%20<?=urlencode(url::base('http'));?>exhibitions"> <img src="<?=url::base();?>application/resources/images/twitter.png"/></a>
			<a target="blank" rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?=urlencode(url::base('http').$content['main']['slug']);?>&t=<?=urlencode($content['main']['title']." ".$content['main']['media']." ".$content['main']['dimensions']);?>"><img src="<?=url::base();?>application/resources/images/facebook.png"/></a> 
		</div>

</div>

<?else:?>
	<h2>There's no image uploaded for this work?</h2>
<?endif;?>