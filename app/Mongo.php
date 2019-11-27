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

    public static function findOne($collection, $data){
        $mongo = new \MongoDB\Collection(new \MongoDB\Driver\Manager("mongodb://localhost:27017"), "flickr", $collection);
        return $mongo->findOne($data);
    }

    public static function findAll($collection, $data){
        $mongo = new \MongoDB\Collection(new \MongoDB\Driver\Manager("mongodb://localhost:27017"), "flickr", $collection);
        return $mongo->find($data);
    }
}