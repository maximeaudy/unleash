<?php
class Photo{
    private $id;
    private $user;
    private $secret;
    private $server;
    private $farm;
    private $title;
    private $size;
    private $tags;
    private $comments;
    private $id_search;

    /**
     * Photo constructor.
     * @param $id
     * @param $user
     * @param $secret
     * @param $server
     * @param $farm
     * @param $title
     * @param $size
     * @param $tags
     * @param $comments
     * @param $id_search
     */
    public function __construct($id, $user, $secret, $server, $farm, $title, $size, $tags, $comments, $id_search)
    {
        $this->id = $id;
        $this->user = $user;
        $this->secret = $secret;
        $this->server = $server;
        $this->farm = $farm;
        $this->title = $title;
        $this->size = $size;
        $this->tags = $tags;
        $this->comments = $comments;
        $this->id_search = $id_search;
    }

    public function getPhoto(){
        return $this;
    }

}