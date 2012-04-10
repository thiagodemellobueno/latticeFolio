<div class="container_12">

		<iframe id="map" width="960" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=j.+cacciola+gallery&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=66.7892,114.257812&amp;ie=UTF8&amp;hq=j.+cacciola+gallery&amp;hnear=&amp;t=m&amp;cid=8398558394765340691&amp;ll=40.754929,-73.995838&amp;spn=0.029258,0.082312&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>

		<div class="grid_8">
			<p class="intro museo"><?=$content['main']['intro'];?></p>
			<p class="blurb"> <?=$content['main']['blurb'];?></p>
		</div>
		<? if( count( $content['main']['contacts'] ) ):?>
		<div class="contacts grid_3 push_1">
			<h3 class="headline">Contacts</h3>
			<ul>
			<?foreach($content['main']['contacts'] as $contactPerson):?>
				<li class="person museo">
					<?=$contactPerson['name'];?><br/>
					<?=$contactPerson['title'];?><br/>
					<?=$contactPerson['email'];?>
				</li>
			<?endforeach;?>
			</ul>
		</div>
		<?endif;?>
		
</div>
