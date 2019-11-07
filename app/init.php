<?php
require_once('Search.php');
require_once('Flickr.php');

// Form recherche
if(!empty($_POST)){
    $search = new Search($_POST['tags']);
    $return = $search->search();
}