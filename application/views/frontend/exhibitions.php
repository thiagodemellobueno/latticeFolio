<div class="theBottom2">
<div class="container_12">

<?foreach($content['exhibition'] as $exhibitionItem):?>
<a href="<?=url::base('http').$exhibitionItem['slug'];?>">
<div class="grid_4">

<ul id="exhibitionGallery" >

<?
/*
Original iteration
?>
<?foreach($exhibitionItem['exhibitionGallery'] as $exhibitionGalleryItem):?>
	<li class="galleryImage">
	<?if(is_object($exhibitionGalleryItem['image'])):?>
		<img id="image" src="<?=latticeurl::site($exhibitionGalleryItem['image']->original->fullpath);?>" width="<?=$exhibitionGalleryItem['image']->original->width;?>" height="<?=$exhibitionGalleryItem['image']->original->height;?>" alt="<?=$exhibitionGalleryItem['image']->original->filename;?>" />
	<?endif;?>
	</li>
<?endforeach;?>
</ul>
*/
?>
<?
//reference problem
$test = $exhibitionItem['exhibitionGallery'];
echo gettype( $exhibitionItem['exhibitionGallery'] );
echo gettype( $test );
echo "<br/><br/>";
print_r( $test );
//$testagain = $test[0];
// print_r( $testagain );

/*


Array
(
    [0] => Array
        (
            [id] => 76
            [title] => 
            [slug] => slug0588625001330412186
            [dateadded] => 2012-03-07 10:26:44
            [objectTypeName] => galleryImage
            [image] => Model_File Object
                (
                    [imageinfo:Model_File:private] => Array
                        (
                        )

                    [object_fields:Model_File:private] => Array
                        (
                            [0] => loaded
                            [1] => id
                            [2] => filename
                            [3] => mime
                        )

                    [_has_one:protected] => Array
                        (
                        )

                    [_belongs_to:protected] => Array
                        (
                        )
*/

?>

</div>

<div class="grid_7">

  <h3 class="headline"> <?=$exhibitionItem['headline'];?></h3>

  <h3 class="dates"> <?=$exhibitionItem['startDate'];?> - <?=$exhibitionItem['endDate'];?></h3>

     <p class="blurb"> <?=$exhibitionItem['blurb'];?></p>
</div>
<div class="clear"></div>
<div class="clearfix"></div>


<?endforeach;?>
</a>
</div>
</div>


<div class="theBottom container_12">
<h2>Older Exhibitions</h2>

<div id="olderExhibitions" >
<?foreach($content['olderExhibitions'] as $olderExhibitionsItem):?>
  <div class="grid_4">
   
   <?if(is_object($olderExhibitionsItem['image'])):?>
       <img id="image" class="thumb" src="<?=latticeurl::site($olderExhibitionsItem['image']->archiveImage->fullpath);?>" width="<?=$olderExhibitionsItem['image']->archiveImage->width;?>" height="<?=$olderExhibitionsItem['image']->archiveImage->height;?>" alt="<?=$olderExhibitionsItem['image']->archiveImage->filename;?>" />
          <?endif;?>
</div>

<div class="grid_7">
    <h3><?=$olderExhibitionsItem['title'];?></h3>

   <h3 class="date"> <?=$olderExhibitionsItem['date'];?></h3>

   <p class="blurb"> <?=$olderExhibitionsItem['blurb'];?></p>

  </div>
<?endforeach;?>
<div class="clearFix"></div>

</div>












</div>



<div class="clear"></div>
</div>
