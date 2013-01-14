<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width" />

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

<!-- pagemeta stuff for seo, involves the pagemeta cluster, and custom objecttype, pagemeta explicitly added to objecttypes in objects.xml -->
<?if(Kohana::config('site.pageMeta')):?>
  <link rel="canonical" href="<?='http://'.latticeurl::site( $_SERVER["SERVER_NAME"]);?>" /> 
  <?$currentURL="http:/".latticeurl::site( $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"] );?>
  <?$home = Graph::object('homepage');?>
  <?$seoDescription=(latticeview::initialObject()->seo->description )? latticeview::initialObject()->seo->description : $home->seo->description;?>
  <?$seoTitle=(latticeview::initialObject()->seo->windowTitle )? latticeview::initialObject()->seo->windowTitle : "" ;?>
  <?$seoKeywords=(latticeview::initialObject()->seo->keywords )? latticeview::initialObject()->seo->keywords : $home->seo->keywords;?>
  <?$seoThumbSrc=( is_object( latticeview::initialObject()->seo->img->uithumb ) )? latticeview::initialObject()->seo->img->uithumb->fullpath : NULL;?>  
  <meta property="og:title" content=" <?=Kohana::config('siteTitle');?> <?if($seoTitle):?>| <?=$seoTitle?>"<?endif;?> />
  <meta name="description" content="<?=$seoDescription;?>" /> 
  <meta name="keywords" content="<?=$seoKeywords;?>" />
  <meta property="og:url" content="<?=$currentURL;?>">
  <meta property="og:description" content="<?=$seoDescription;?>" />
  <?if($seoThumbSrc):?>
    <link rel="image_src" type="image/jpeg" href="<?=$seoThumbSrc;?>" />
    <meta property="og:image" content="<?=$seoThumbSrc;?>" />
  <?endif;?>
<?endif;?>

<title><?=Kohana::config('site.title');?> <?=($seoTitle)?$seoTitle:latticeview::initialObject()->title;?></title>

<!--
  Resources, css and js:
  See application/config/LayoutPublic.php for details
-->
  <?=$stylesheet;?>
  <?=$javascript;?>

</head>

<body id="<?=latticeview::initialObject()->slug;?>" >

	<div id="wrapper">

	<?=Request::Factory('header/public')->execute()->body();?>

	<?=$body;?>
	
	<?=Request::Factory('footer/public')->execute()->body();?>

	</div>

</body>
</html>
