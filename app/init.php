<?php
require_once('Search.php');
require_once('Site.php');
require_once('Flickr.php');
require_once('Mongo.php');

// Form recherche
if(!empty($_POST)){
    $search = new Search($_POST['tags']);
    $return = $search->search();
}