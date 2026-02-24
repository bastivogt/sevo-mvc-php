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

    public function createPost($title, $content, $published = true) {
        $this->db->query("INSERT INTO posts (title, content, published) VALUES (:title, :content, :published)");
        $this->db->bindValue(":title", $title);
        $this->db->bindValue(":content", $content);
        $this->db->bindValue(":published", $published);
        return $this->db->execute();

    }


    public function updatePost($id, $title, $content, $published = true) {
        $this->db->query("UPDATE posts SET title = :title, content = :content, published = :published WHERE id = :id");
        $this->db->bindValue(":id", $id);
        $this->db->bindValue(":title", $title);
        $this->db->bindValue(":content", $content);
        $this->db->bindValue(":published", $published);
        return $this->db->execute();

    }


    public function deletePost($id) {
        $this->db->query("DELETE FROM posts WHERE id=:id");
        $this->db->bindValue(":id", $id);
        return $this->db->execute();
    }

    
}