<div id="artistListing" class="container_12">
	
	<div class="grid_5 alpha">
		<div class="preview"></div>
	</div>
	
	<div class="artists grid_7 omega">

		<div id="representedArtists" class="grid_2 alpha" >
			<h3>Artists</h3>
			<?foreach($content['representedArtists'] as $representedArtistsItem):?>
				<?$works=Graph::object($representedArtistsItem['slug'])->latticeChildrenQuery()->objectTypeFilter('works')->publishedFilter()->order_by('objectrelationships.sortorder')->find();?>
				<?$work = $works->latticeChildrenQuery()->objectTypeFilter('work')->publishedFilter()->order_by('objectrelationships.sortorder')->find();?>
			<a data-previewsrc="<?=$work->image->previewThumb->fullpath;?>" href="<?=url::base('http').$representedArtistsItem['slug'];?>"><?=$representedArtistsItem['title'];?></a><br/>
			<?endforeach;?>
		</div>

		<div id="worksAvailArtists" class="grid_5 push_2 omega">
			<?foreach($content['worksAvailableArtists'] as $worksAvailableArtistsItem):?>
			<?$works=Graph::object($worksAvailableArtistsItem['slug'])->latticeChildrenQuery()->objectTypeFilter('works')->publishedFilter()->order_by('objectrelationships.sortorder')->find();?>
			<?$work = $works->latticeChildrenQuery()->objectTypeFilter('work')->publishedFilter()->order_by('objectrelationships.sortorder')->find();?>
			<a data-previewsrc="<?=$work->image->previewThumb->fullpath;?>" href="<?=url::base('http').$worksAvailableArtistsItem['slug'];?>"><?=$worksAvailableArtistsItem['title'];?></a>
			<?endforeach;?>
		</div>

	</div>

</div>