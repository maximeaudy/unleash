<?php

/**
 * Class Flickr
 * Permet de gérer les appels à l'API
 */
class Flickr{
    private $api_key = "8a1b450832e88dfea6632d03f0a395a3";
    private $url_flickr = "https://www.flickr.com/services/rest/?method=";
    private $format = "json";
    private $per_page = 5;

    private function call($method, $tags){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "{$this->url_flickr}{$method}&api_key={$this->api_key}&tags={$tags}&format={$this->format}&per_page={$this->per_page}&nojsoncallback=1");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($curl);
    }

    public function searchPhotos($tags){
        return $this->call("flickr.photos.search", $tags);
    }

    public function getPhotoInfo($tags){
        return $this->call("flickr.photos.getInfo", $tags);
    }

    public function getUserInfo($idUserFlickr = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "{$this->url_flickr}flickr.people.getInfo&api_key={$this->api_key}&user_id={$idUserFlickr}&format={$this->format}&nojsoncallback=1");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($curl);
    }
}

$flickr = new Flickr();