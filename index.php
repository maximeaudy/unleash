<?php

use MongoDB\Driver\Manager;

require_once('vendor/autoload.php');
require_once('app/init.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?= $site->name; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
	</head>
	<body>
		<div id="wrapper">
			<header id="header">
				<span class="avatar"><i class="fas fa-search"></i></span>
				<h1>
					La vie est <b>belle</b> avec <b>UNLEASH</b><br>
					Libérez votre esprit...
				</h1>
				<?php if(isset($return)) echo $return; ?>
				<form action="#" method="post">
					<input type="text" id="search" name="tags" placeholder="sports, art, nature, animaux" />
					<input type="submit" value="Rechercher">
				</form>
				<ul class="icons">
					<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon style2 fa-500px"><span class="label">500px</span></a></li>
					<li><a href="#" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
				</ul>
			</header>

			<!-- Main -->
			<section id="main">
				<!-- Thumbnails -->
				<section class="thumbnails">
					<div>
                        <?php
                            $mongo = new \MongoDB\Collection(new Manager("mongodb://localhost:27017"), "flickr", "images");
                            $images = $mongo->find();
                            foreach ($images as $image){
                        ?>
						<a href="https://farm<?= $image->farm; ?>.staticflickr.com/<?= $image->server; ?>/<?= $image->id; ?>_<?= $image->secret; ?>.jpg">
							<img src="https://farm<?= $image->farm; ?>.staticflickr.com/<?= $image->server; ?>/<?= $image->id; ?>_<?= $image->secret; ?>.jpg" alt="" />
							<h3><?= $image->title; ?></h3>
						</a>
                        <?php } ?>
					</div>
					<div>
						<a href="images/fulls/05.jpg">
							<img src="images/thumbs/05.jpg" alt="" />
							<h3>Lorem ipsum dolor sit amet</h3>
						</a>
					</div>
					<div>
						<a href="images/fulls/06.jpg">
							<img src="images/thumbs/06.jpg" alt="" />
							<h3>Lorem ipsum dolor sit amet</h3>
						</a>
					</div>
				</section>
			</section>

			<!-- Footer -->
			<footer id="footer">
				<p>&copy; Untitled. All rights reserved. Design: <a href="http://templated.co">TEMPLATED</a>. Demo Images: <a href="http://unsplash.com">Unsplash</a>.</p>
			</footer>
		</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.poptrox.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/main.js"></script>

	</body>
</html>