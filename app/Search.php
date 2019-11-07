<?php

/**
 * Class Search
 * Permet de gérer le formulaire de recherche
 */
class Search{
	private $size_image = null;
	private $min_uploaded_date = null;
	private $max_uploaded_date = null;
	private $safe_search = true;
	private $tags;
	private $images = [];

	private $mongo;
	private $flickr;

	public function __construct($tags, $options = []){
		$this->tags = $tags;

        $this->flickr = new Flickr();
		$manager = new \MongoDB\Driver\Manager();
		$this->mongo = new \MongoDB\Database($manager, "flickr");
	}

	public function search(){
		if(empty($this->tags)) 
			return "Vous devez saisir un mot clé minimum.";

		$jsonData = json_decode($this->flickr->searchPhotos($this->tags));


		try{
            $mongo = new \MongoDB\Collection(new \MongoDB\Driver\Manager(), "flickr", "images");
            $images = $jsonData->photos->photo;
            foreach ($images as $image){
                unset($image->isfriend);
                unset($image->isfamily);
                unset($image->ispublic);
            }
            $mongo->insertMany($jsonData->photos->photo);
        }catch (Exception $e){
		    var_dump($e);
        }

        return "Les photos ont bien été récupérées";
	}
}