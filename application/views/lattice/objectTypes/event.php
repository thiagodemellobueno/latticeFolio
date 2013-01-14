<li data-objectid="<?=$data['id'];?>" id="item_<?=$data['id'];?>" class="event listItem grid_4 <?=latticeutil::modulo( "events", array( "alpha","","omega" ));?>">

  <?=$text_eventTitle;?>
  <?=$date_date;?>
  <?=$image_image;?>
  <?=$text_description;?>

  <div class='modalContent hidden'>
    <div class="clearFix">
      <?=$tags_tags;?>
    </div>
    <div class='wrapper'>
    <?=$link_link;?>
    <?=$text_imageTitle;?>
    <?=$text_imageDescription;?>
   </div>
  </div>

  <div class="itemControls">
    <a href="#" title="Edit metadata for this item:" class="icon meta modal-actuator">meta</a>
    <a href="#" title="delete this list item" class="icon delete">delete</a>
    <a href="#" title="Add This Item" class="button submit hidden">submit</a>
    <a href="#" title="Cancel" class="button cancel hidden">cancel</a>
  </div>
    
</li>
