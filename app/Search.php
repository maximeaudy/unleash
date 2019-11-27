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

	private $mongo;
	private $flickr;

	public function __construct($tags, $options = []){
		$this->tags = $tags;
		$this->size_image = $options['size_image'];
		$this->min_uploaded_date = $options['min_uploaded_date'];
		$this->max_uploaded_date = $options['max_uploaded_date'];
		$this->safe_search = $options['safe_search'];

        $this->flickr = new Flickr();
		$manager = new \MongoDB\Driver\Manager();
		$this->mongo = new \MongoDB\Database($manager, "flickr");
	}

	public function search(){
		if(empty($this->tags)) 
			return "Vous devez saisir un mot clé minimum.";

		$jsonData = json_decode($this->flickr->searchPhotos($this->tags));
		$images = $jsonData->photos->photo;

        foreach ($images as $image){
            // On enlève les champs que l'on ne veut pas stocker en bdd
            unset($image->isfriend);
            unset($image->isfamily);
            unset($image->ispublic);

            // On rajoute le tags dans l'image
            $image->tags = $this->tags;

            //On vérifie si l'utilisateur a déjà été enregistré en bdd
            if(Mongo::findOne("users", ["id" => $image->owner]) === null) {
                // On enregistre les infos de l'utilisateur
                $userInfos = json_decode($this->flickr->getUserInfo($image->owner));

                $userInfos = [
                    "id" => $userInfos->person->id,
                    "realname" => $userInfos->person->realname->_content,
                    "description" => $userInfos->person->description->_content
                ];

                Mongo::insertOne("users", $userInfos);
            }
        }

        // On enregistre les images
        Mongo::insertMany("images", $images);

        // On enregistre la recherche de l'utilisateur
        $search = [
            "filters" => [
                "size_image" => $this->size_image,
                "min_uploaded_date" => $this->min_uploaded_date,
                "max_uploaded_date" => $this->max_uploaded_date,
            ],
            "safe_search" => $this->safe_search,
            "tags" => $this->tags
        ];

        Mongo::insertOne("searchs", $search);

        return "Les photos ont bien été récupérées";
	}

	public function getTags(){
	    return $this->tags;
    }
}