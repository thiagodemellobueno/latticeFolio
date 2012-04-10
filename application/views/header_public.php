<div class="container_12">

	<div class="header clearfix">

		<h1 id="logo"><a href="<?=url::base();?>home"><img src="application/views/images/j-cacciola-gallery-logo.png" width="451" height="46" alt="J. Cacciola Gallery" /></a></h1>
		
		<ul id="nav" class="grid_5 push_1 omega">

			<li id="artistsNav" ><a href="<?=url::base();?>artists"  class="<?echo latticeview::withinSubtree('artists') ? "active" : "";?>" >Artists</a>


				<div class="subnav">
					<div class="artistsPreview"></div>
					<ul>

					<li>
						<?
					// assuming artists is the objectType of the artists container

					$artistsContainer =  Graph::object()->objectTypeFilter('representedArtists')->find();

					$artists = $artistsContainer->latticeChildrenQuery()->objectTypeFilter('artist')->publishedFilter()->order_by('objectrelationships.sortorder')->find_all();?>

					<?if( count($artists) > 0 ):?>

					<ul class="Artists">
						<?foreach($artists as $artist):?>
							<li>
								<?$works=$artist->latticeChildrenQuery()->objectTypeFilter('works')->publishedFilter()->order_by('objectrelationships.sortorder')->find();?>
								<?$work = $works->latticeChildrenQuery()->objectTypeFilter('work')->publishedFilter()->order_by('objectrelationships.sortorder')->find();?>
								<a data-previewsrc="<?=$work->image->previewThumb->fullpath;?>" href="<?=latticeurl::site($artist->slug);?>" class="<?echo latticeview::withinSubtree($artist->slug) ? "active" : "";?>" >
								<?=$artist->title;?>
								</a>
							</li>
						<?endforeach;?>
					</ul>

					<?endif;?>

					<?$wrArtistsContainer =  Graph::object()->objectTypeFilter('worksAvailableArtists')->find();?>
					<?$wrArtists = $wrArtistsContainer->latticeChildrenQuery()->objectTypeFilter('artist')->publishedFilter()->order_by('objectrelationships.sortorder')->find_all();?>

					<?if( count($wrArtists) > 0 ):?>

					<ul class="worksAvailableArtists">

						<?foreach($wrArtists as $artist):?>

							<li>
								<?$works=$artist->latticeChildrenQuery()->objectTypeFilter('works')->publishedFilter()->order_by('objectrelationships.sortorder')->find();?>
								<?$work = $works->latticeChildrenQuery()->objectTypeFilter('work')->publishedFilter()->order_by('objectrelationships.sortorder')->find();?>
								<a data-previewsrc="<?=$work->image->previewThumb->fullpath;?>" href="<?=latticeurl::site($artist->slug);?>" class="<?echo latticeview::withinSubtree($artist->slug) ? "active" : "";?>" ><?=$artist->title;?></a>
							</li>

						<?endforeach;?>

					</ul>
		
			 		<?endif;?>		
					
					</li>

				</ul>

			</li>

			<li class="hidden"><a href="<?=url::base();?>news" class="<?echo latticeview::withinSubtree('News') ? "active" : "";?>" >News</a></li>
			<li><a href="<?=url::base();?>press" class="<?echo latticeview::withinSubtree('press') ? "active" : "";?>" >Press</a></li>
			<li><a href="<?=url::base();?>exhibitions" class="<?echo latticeview::withinSubtree('exhibitions') ? "active" : "";?>" >Exhibitions</a></li>
			<li><a href="<?=url::base();?>about" class="<?echo latticeview::withinSubtree('about') ? "active" : "";?>" >About</a></li>

		</ul>
	</div>

	</div>
	
</div>
