<li data-objectid="<?=$data['id'];?>" id="item_<?=$data['id'];?>" class="galleryImage listItem grid_4 <?=latticeutil::modulo( "gallerypanels", array( "alpha","","omega" ));?>">

	<?=$image_image;?>

	<div class='modalContent hidden'>
		<div class="clearFix">
			<?=$tags_tags;?>
		</div>
		<?=$text_imageTitle;?>
		<?=$text_blurb;?>
		<?=$link_link;?>
	</div>

	<div class="itemControls">
		<a href="#" title="Edit metadata for this item:" class="icon meta modal-actuator">meta</a>
		<a href="#" title="delete this list item" class="icon delete">delete</a>
		<a href="#" title="Add This Item" class="button submit hidden">submit</a>
		<a href="#" title="Cancel" class="button cancel hidden">cancel</a>
	</div>
		
</li>
