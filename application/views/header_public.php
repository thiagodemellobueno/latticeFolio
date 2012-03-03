<div class="container_12">
<div class="header">
<div id="masthead" class="grid_6 alpha">
	<h2 id="logo"><a href="<?=url::base();?>home">J. Cacciola Gallery</a></h2>
</div>


<div id="navmenu" class="grid_6 push_1">
<div class="nav">
<ul>
<li><a href="<?=url::base();?>artists"  class="<?echo latticeview::withinSubtree('artists') ? "active" : "";?>" >Artists</a>

  <ul class="show">
		<li>
			<?
		// assuming artists is the objectType of the artists container

		$artistsContainer =  Graph::object()->objectTypeFilter('artists')->find();

		$artists = $artistsContainer->latticeChildrenQuery()->objectTypeFilter('artist')->publishedFilter()->find_all();?>

		<?if( count($artists) > 0 ):?>

		<ul class="Artists">

			<?foreach($artists as $artist):?>

				<li><a href="<?=latticeurl::site($artist->slug);?>" class="<?echo latticeview::withinSubtree($artist->slug) ? "active" : "";?>" ><?=$artist->title;?></a></li>

			<?endforeach;?>

		</ul>

		<?endif;?>

		<?$wrArtistsContainer =  Graph::object()->objectTypeFilter('worksAvailableArtists')->find();?>
		
		<?$wrArtists = $wrArtistsContainer->latticeChildrenQuery()->objectTypeFilter('artist')->publishedFilter()->find_all();?>

		<?if( count($wrArtists) > 0 ):?>

		<ul class="worksAvailableArtists">

			<?foreach($wrArtists as $artist):?>

				<li><a href="<?=latticeurl::site($artist->slug);?>" class="<?echo latticeview::withinSubtree($artist->slug) ? "active" : "";?>" ><?=$artist->title;?></a></li>

			<?endforeach;?>

		</ul>
		
 		<?endif;?>		

  </ul>
</li>
<li><a href="<?=url::base();?>news"  class="<?echo latticeview::withinSubtree('news') ? "active" : "";?>" >News</a></li>
<li><a href="<?=url::base();?>press"  class="<?echo latticeview::withinSubtree('press') ? "active" : "";?>" >Press</a></li>
<li><a href="<?=url::base();?>exhibitions"  class="<?echo latticeview::withinSubtree('exhibitions') ? "active" : "";?>" >Exhibitions</a></li>
<li><a href="<?=url::base();?>about"  class="<?echo latticeview::withinSubtree('about') ? "active" : "";?>" >Press</a></li>

</ul>


</div>
</div>


</div>
</div>
