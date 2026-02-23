<?php

class Post extends Model {

    public function getAllPosts() {
        $this->db->query("SELECT * FROM posts");
        return $this->db->results();
    }

    public function getPosts($published = true) {
        $this->db->query("SELECT * FROM posts WHERE published = :published");
        $this->db->bindValue(":published", $published);
        return $this->db->results();
    }

    public function getPost($id, $published = true) {
        $this->db->query("SELECT * FROM posts WHERE id = :id AND published = :published");
        $this->db->bindValue(":id", $id);
        $this->db->bindValue(":published", $published);
        return $this->db->result();
    }

    
}