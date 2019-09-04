<?php
namespace application\core;

use application\lib\Db;
use MongoDB\BSON\ObjectID;

abstract class Model {
    public $db;

    public function __construct() {
       $this->db = new Db;
       $this->db = $this->db->get_db();

    }

    public function insert_data($db, $collection, $data){
        $db->$collection->insertOne($data);
    }

    public function get_data($db, $collection, $query=[]){
        $images = $db->$collection->find($query);
        return $images;
    }


}