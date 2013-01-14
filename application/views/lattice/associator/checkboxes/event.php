<div class="toggle <?=($associated)?'selected':'';?>" data-objectid="<?=$object->id?>">
  <input type="checkbox"  name="associatorCheckboxItem_<?=$object->id;?>" <? echo $associated ? 'checked="checked"' : '';?>  />
  <label for="associatorCheckboxItem_<?=$object->id;?>">
    <?=$object->eventTitle;?>
  </label>
</div>