<div class="theBottom">
<div class="container_12">

<?foreach($content['exhibition'] as $exhibitionItem):?>

<div class="grid_4">
  <img class="thumb" width="221px" height="147"></img>
</div>

<div class="grid_7 push_1">

  <h3 class="headline"> <?=$exhibitionItem['headline'];?></h3>

  <h3 class="dates"> <?=$exhibitionItem['startDate'];?> - <?=$exhibitionItem['endDate'];?></h3>

     <p class="blurb"> <?=$exhibitionItem['blurb'];?></p>
</div>
<div class="clear"></div>


<?endforeach;?>
</div>

<div class="clear"></div>
</div>
