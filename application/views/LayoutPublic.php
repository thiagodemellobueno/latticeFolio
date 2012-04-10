<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="content-script-type" content="text/javascript" />
	<!-- viewport for mobile browsers -->

  <title>J. Cacciola Gallery</title>
<!-- typkit -->
<script type="text/javascript" src="http://use.typekit.com/llo3ajs.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

  <script type="text/javascript" src="application/views/js/mootools.js"></script>
  <script type="text/javascript" src="application/views/js/script.js"></script>
	<link rel="stylesheet" href="application/views/css/style.css" />
  <link rel="stylesheet" href="application/views/css/text.css" />
  <link rel="stylesheet" href="application/views/css/960.css" />

  <?=$stylesheet;?>
	<?=$javascript;?>

</head>

<body>

	<div id="wrapper">

	<?=Request::Factory('header/public')->execute()->body();?>

	<?=$body;?>
	
	<?=Request::Factory('footer/public')->execute()->body();?>

	</div>

</body>
</html>
