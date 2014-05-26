<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Administracion Productos</title>


<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 18px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 18px;
}
a:hover
{
	text-decoration: underline;
}
</style>
</head>
<body style="background-attachment:fixed" background="http://www.hdwallpapers.in/walls/abstract_color_background_picture_8016-wide.jpg" text="#FFFFFF">

	<h2><center>Administració de Productes Consolegeneration</center></h2>
    <div>
		<?php echo $output; ?>
		<br>
		<footer> <center> Pagina web creada i pertanyent a Consolegeneration <center> </footer>

    </div>
</body>
</html>
