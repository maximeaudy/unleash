<?php

class Mongo{
    public static function insertMany($collection, $data){
        try{
            $mongo = new \MongoDB\Collection(new \MongoDB\Driver\Manager("mongodb://localhost:27017"), "flickr", $collection);
            $mongo->insertMany($data);
        }catch (Exception $e){
            var_dump($e);
        }
    }

    public static function insertOne($collection, $data){
        try{
            $mongo = new \MongoDB\Collection(new \MongoDB\Driver\Manager("mongodb://localhost:27017"), "flickr", $collection);
            $mongo->insertOne($data);
        }catch (Exception $e){
            var_dump($e);
        }
    }

    public static function find($collection, $data){
        try{
            $mongo = new \MongoDB\Collection(new \MongoDB\Driver\Manager("mongodb://localhost:27017"), "flickr", $collection);
            $data = $mongo->findOne($data);
        }catch (Exception $e){
            var_dump($e);
        }

        return $data;
    }
}