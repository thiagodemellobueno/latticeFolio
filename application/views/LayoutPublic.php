<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="content-script-type" content="text/javascript">
  <title>LatticeCMS &ldquo;It's Made of People!&rdquo;</title>
<!-- typkit -->
<script type="text/javascript" src="http://use.typekit.com/llo3ajs.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

  <script src="application/views/js/libs/modernizr-2.5.3.min.js"></script>
  <script src="application/views/js/mootools.js"></script>
  <script src="application/views/js/script.js"></script>

   <link rel="stylesheet" href="application/views/css/style.css">
  <link rel="stylesheet" href="application/views/css/text.css">
  <link rel="stylesheet" href="application/views/css/960.css">


  <?=$stylesheet;?>
	<?=$javascript;?>
</head>
<body class="">
<?=Request::Factory('header/public')->execute()->body();?>
<?=Request::Factory('publicmenu')->execute()->body();?>
<?=$body;?>
<?=Request::Factory('footer/public')->execute()->body();?>
	</div>
</body>
</html>
