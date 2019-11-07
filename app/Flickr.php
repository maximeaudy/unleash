<?php

/**
 * Class Flickr
 * Permet de gérer les appels à l'API
 */
class Flickr{
    private $api_key = "828e660b4e4c9f0a931a9adbe60ba348";
    private $url_flickr = "https://www.flickr.com/services/rest/?method=";
    private $format = "json";

    private function call($method, $tags){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "{$this->url_flickr}{$method}&api_key={$this->api_key}&tags={$tags}&format={$this->format}&nojsoncallback=1");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($curl);
    }

    public function searchPhotos($tags){
        return $this->call("flickr.photos.search", $tags);
    }

    public function getPhotoInfo($tags){
        return $this->call("flickr.photos.getInfo", $tags);
    }
}

$flickr = new Flickr();