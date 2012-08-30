<div id="exhibitions" class="container_12">
	<ul class="listing clearFix">
	<?foreach($content['exhibition'] as $exhibitionItem):?>
		<li class="exhibition grid_4 <?=latticeutil::modulo('exhibitions', array("alpha","", "omega"));?>">
			<?if(is_object($exhibitionItem['image'])):?>
			<a href="<?=url::base('http').$exhibitionItem['slug'];?>"><img id="image" src="<?=latticeurl::site($exhibitionItem['image']->mediumlisting->fullpath);?>" width="<?=$exhibitionItem['image']->mediumlisting->width;?>" height="<?=$exhibitionItem['image']->mediumlisting->height;?>" alt="<?=$exhibitionItem['image']->mediumlisting->filename;?>" /></a>
			<?endif;?>
	  <h3 class="title"><a href="<?=url::base('http').$exhibitionItem['slug'];?>"><?=$exhibitionItem['title'];?></a></h3>
	  <h4 class="dates"><a href="<?=url::base('http').$exhibitionItem['slug'];?>"><?=date( "F j, Y", strtotime( $exhibitionItem['startDate'] ) );?> - <?=date( "F j, Y", strtotime( $exhibitionItem['endDate'] ) );?></a></h4>
		<p class="blurb"><a href="<?=url::base('http').$exhibitionItem['slug'];?>"><?=$exhibitionItem['blurb'];?></a></p>
	</li>
	<?endforeach;?>
	</ul>
</div>

<div class="container_12 clearfix">
	<h2>Past Exhibitions</h2>
	<div id="olderExhibitions" >
	<?foreach($content['olderExhibitions'] as $olderExhibitionsItem):?>
		<div class="exhibition grid_3 <?=latticeutil::modulo('pressItems', array("alpha","", "", "omega"));?>">
			<?if(is_object($olderExhibitionsItem['image'])):?>
			<img class="thumb" src="<?=latticeurl::site($olderExhibitionsItem['image']->archiveImage->fullpath);?>" width="<?=$olderExhibitionsItem['image']->archiveImage->width;?>" height="<?=$olderExhibitionsItem['image']->archiveImage->height;?>" alt="<?=$olderExhibitionsItem['image']->archiveImage->filename;?>" />
			<?endif;?>
			<h3 class="title"><?=$olderExhibitionsItem['title'];?></h3>
			<h4 class="dates"><?=date( "F j, Y", strtotime( $olderExhibitionsItem['date'] ) );?></h4>
			<p class="blurb"> <?=($olderExhibitionsItem['blurb'])? $olderExhibitionsItem['blurb'] : "&nbsp;";?></p>
		</div>
	<?endforeach;?>
	</div>
</div>
