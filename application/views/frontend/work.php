<div class="container_12">	
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
          $next_id =  $collection->next('slug',$content["main"]["id"]);
          $prev_id =  $collection->prev('slug',$content["main"]["id"]);
         
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
      <div class="nextPrev">
        <?php if (strlen($prev->title)>0):?>
        <div class="prev">
          Prev:
          <a href="/<?=$prev->slug?>"><?=$prev->title?></a>
        </div>
        <?php endif;?>
        <?php if (strlen($next->title)>0):?>
        <div class="next">
          Next:
          <a href="/<?=$next->slug?>"><?=$next->title?></a>
        </div>
        <?php endif?>
        
      </div>
      
  	  <!-- display your artist name and slug here (move this to wherever it fits the design) -->
  	  <div class="artistNameAndSlug">
        <?php 
        //if we don't find an artist, the conditional prevents this from being rendered
        if ($artist->objecttype_id ==$artist_type_id):?>
		    <h2>Artist Name</h2>
		    <?= $artist->title?>
		    <h3>Slug</h3>
		    <?= $artist->slug?>
		    <?php else:?>
		      This is an orphan content object, put some message here 
		    <?php endif?>
		  </div>
    
			<img id="image" class="workImage" src="<?=latticeurl::site($content['main']['image']->workImageBig->fullpath);?>" width="<?=$content['main']['image']->workImageBig->width;?>" height="<?=$content['main']['image']->workImageBig->height;?>" alt="<?=$content['main']['title'];?> <?=$content['main']['media'];?> <?=$content['main']['dimensions'];?>" />
		<?endif;?>
		
		<h3 class="work-name page-title"><?=$content['main']['title'];?></h3>

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