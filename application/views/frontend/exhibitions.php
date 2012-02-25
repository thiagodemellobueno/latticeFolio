
<div class="container_12">

<?foreach($content['exhibition'] as $exhibitionItem):?>

<div class="grid_4">
  <img class="thumb" width="221px" height="147"></img>
</div>

<div class="grid_7 push_1">
   <h2><?=$exhibitionItem['title'];?></h2>

   <p class="dateRange"> <?=$exhibitionItem['dateRange'];?></p>

   <p class="headline"> <?=$exhibitionItem['headline'];?></p>

   <p class="blurb"> <?=$exhibitionItem['blurb'];?></p>
</div>
<div class="clear"></div>


<?endforeach;?>
</div>

<div class="clear"></div>
