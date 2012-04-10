<div class="container_12">

<div id="representedArtists" class="grid_2 push_3" >
<h3>Artists</h3>
<?foreach($content['representedArtists'] as $representedArtistsItem):?>
<a href="<?=url::base('http').$representedArtistsItem['slug'];?>"><?=$representedArtistsItem['title'];?></a><br/>
<?endforeach;?>
</div>

<div id="worksAvailArtists" class="grid_5 push_5">
<?foreach($content['worksAvailableArtists'] as $worksAvailableArtistsItem):?>
<a href="<?=url::base('http').$worksAvailableArtistsItem['slug'];?>"><?=$worksAvailableArtistsItem['title'];?></a>
<?endforeach;?>
</div>

</div>