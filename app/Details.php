<?php

Class Details{

	//Propriétés nécessaire pour comments.getList
	private $photo_id;
	private $id; // commentaire
	private $author; // id auteur commentaire
	private $authorname;
	private $datecreate;
	private $permalink;
	private $_content; // description commentaire

	/**
     * Details constructor.
     * @param $photo_id
     * @param $id
     * @param $author
     * @param $authorname
     * @param $datecreate
     * @param $permalink
     * @param $_content
     * 
     */
	public function __construct($photo_id,$id,$author,$authorname,$datecreate,$permalink,$_content){
		$this->photo_id = $photo_id;
		$this->id = $id;
		$this->author = $author;
		$this->authorname = $authorname;
		$this->datecreate = $datecreate;
		$this->permalink = $permalink;
		$this->_content = $_content;
	}

	public function getDetails(){
		return $this;
	}
}