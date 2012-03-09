<div class="container_12">
	<ul class="listing">
	<?foreach($content['exhibition'] as $exhibitionItem):?>
		<li class="exhibition grid_4 <?=latticeutil::modulo('exhibitions', array("alpha","", "omega"));?>">
		<?$i=0;?>
		<?foreach($exhibitionItem['exhibitionGallery'] as $exhibitionGalleryItem):?>
			<?if($i==0 && is_object($exhibitionGalleryItem['image'])):?>
				<a href="<?=url::base('http').$exhibitionItem['slug'];?>">
					<img src="<?=latticeurl::site($exhibitionGalleryItem['image']->mediumlisting->fullpath);?>" width="<?=$exhibitionGalleryItem['image']->mediumlisting->width;?>" height="<?=$exhibitionGalleryItem['image']->mediumlisting->height;?>" alt="<?=$exhibitionGalleryItem['image']->mediumlisting->filename;?>" />
				</a>
			<?else:
				break;
			endif;
			$i++;
			?>
		<?endforeach;?>
	  <h3 class="headline"><a href="<?=url::base('http').$exhibitionItem['slug'];?>"><?=$exhibitionItem['title'];?></a></h3>
	  <h4 class="dates"><a href="<?=url::base('http').$exhibitionItem['slug'];?>"><?=$exhibitionItem['startDate'];?> - <?=$exhibitionItem['endDate'];?></a></h4>
		<p class="blurb"><a href="<?=url::base('http').$exhibitionItem['slug'];?>"><?=$exhibitionItem['blurb'];?></a></p>
	</li>
	<?endforeach;?>
	</ul>
</div>

<div class="theBottom container_12 clearfix">
	<h2>Older Exhibitions</h2>
	<div id="olderExhibitions" >
	<?foreach($content['olderExhibitions'] as $olderExhibitionsItem):?>
		<div class="exhibition grid_3 <?=latticeutil::modulo('pressItems', array("alpha","", "", "omega"));?>">
			<?if(is_object($olderExhibitionsItem['image'])):?>
			<img class="thumb" src="<?=latticeurl::site($olderExhibitionsItem['image']->archiveImage->fullpath);?>" width="<?=$olderExhibitionsItem['image']->archiveImage->width;?>" height="<?=$olderExhibitionsItem['image']->archiveImage->height;?>" alt="<?=$olderExhibitionsItem['image']->archiveImage->filename;?>" />
			<?endif;?>
			<h3 class="headline"><?=$olderExhibitionsItem['title'];?></h3>
			<h4 class="date"> <?=$olderExhibitionsItem['date'];?></h4>
			<p class="blurb"> <?=$olderExhibitionsItem['blurb'];?></p>
		</div>
	<?endforeach;?>
	</div>
</div>
