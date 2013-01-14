<div class="paginator">
Paginator Starts Here
  <div class="numPages">
    Total Pages: <?=$numPages?>
  </div>
  <div class="currentPage">
    Current Page     
  </div>
  <div class="pages">
      <?php
      //build page link from action and params
      $paramsString = "/".$params["param1"]."/".$params["param2"]."/".$params["param3"]."/";
      ?>
      <?php for ($i = 0; $i < $numPages; $i++):?>
      <a href="/<?=$urlPrepend.$controllerName."/".$action.$paramsString.($i+1)."/" ?>"><?=($i+1)?></a>
    <?php endfor?>
  </div>
Paginator Ends Here
</div>

