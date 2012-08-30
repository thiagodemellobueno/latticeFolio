<div class="container_12">

	<div class="header clearfix">

		<h1 id="logo"><a href="<?=url::base();?>home"><img src="application/resources/images/j-cacciola-gallery-logo.png" width="451" height="46" alt="J. Cacciola Gallery" /></a></h1>
		
		<ul id="nav" class="grid_5 push_1 omega">

			<li id="artistsNav" >
				<a href="<?=url::base();?>artists"  class="<?echo latticeview::withinSubtree('artists') ? "active" : "";?>" >Artists</a>
			</li>

			<li><a href="<?=url::base();?>news" class="<?echo latticeview::withinSubtree('News') ? "active" : "";?>" >News</a></li>
			<li><a href="<?=url::base();?>press" class="<?echo latticeview::withinSubtree('press') ? "active" : "";?>" >Press</a></li>
			<li><a href="<?=url::base();?>exhibitions" class="<?echo latticeview::withinSubtree('exhibitions') ? "active" : "";?>" >Exhibitions</a></li>
			<?php try {?>
			<li><a href="<?=url::base();?>about" class="<?php  echo latticeview::withinSubtree('about') ? "active" : "";?>" >About</a></li>
      <?php }  catch (Exception $e) {
        
      }?>
		</ul>
	</div>

	
</div>
