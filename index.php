<?php

use MongoDB\Driver\Manager;

require_once('vendor/autoload.php');
require_once('app/init.php');
?>
<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $site->name; ?></title>

    <link rel="stylesheet" href="styles.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />

    <title>Hello, world!</title>
</head>
<body class="bg-light">
   	<div class="container page">
    	<main class="pt-4">
    		<?php if(isset($return)) echo "<div class=\"alert alert-primary\" role=\"alert\">".$return."</div>"; ?>
			<form action="#" method="post">
				<div class="form-group">
					<label for="tags">Recherche</label>
					<input type="text" id="search" name="tags" class="form-control" placeholder="sports, art, nature, animaux" />
				</div>
				<div class="form-group">
					<input type="submit" value="Rechercher" class="btn btn-primary">
				</div>
			</form>
	        <div class="row">
			<?php
				if($_POST){
	            $mongo = new \MongoDB\Collection(new Manager("mongodb://localhost:27017"), "flickr", "images");
	            $images = $mongo->find(['']);
	            foreach ($images as $image){
	        ?>
	            <div class="col-md-4">
	                <div class="card mb-4 box-shadow">
	                    <img class="card-img-top" src="https://farm<?= $image->farm; ?>.staticflickr.com/<?= $image->server; ?>/<?= $image->id; ?>_<?= $image->secret; ?>.jpg"" alt="Card image cap">
	                    <div class="card-body">
	                        <h3 class="title">nom du gars ici</h3>
	                        <p class="card-text"><?= substr($image->title, 0, 30); ?></p>
	                        <div class="d-flex justify-content-between align-items-center">
	                            <div class="btn-group">
	                                <button type="button" class="btn btn-sm btn-outline-primary">Détails</button>
	                            </div>
	                            <small class="text-primary" data-toggle="tooltip" data-placement="top" title="Commentaires">
	                                5 commentaires
	                            </small>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        <?php } } ?>
	        </div>
    	</main>

		<footer class="text-muted">
	        <p class="float-right">
	            <a href="#"><i class="fas fa-arrow-up"></i></a>
	        </p>
	        <p>2019 &copy; <?= $site->name; ?>, tous droits réservés.</p>
	    </footer>
   	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/JavaScript">
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
</body>
</html>