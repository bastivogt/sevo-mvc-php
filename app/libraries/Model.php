<?php

class Model {

    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getDB() {
        return $this->db;
    }
}