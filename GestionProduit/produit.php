<?php

require 'config/dbconnect.php';
class Produit{
    private $id;
    private $nom;
    private $descr;
    private $prix;
    private $stock;
    private $db;
    public function __construct($id, $db) {$this->db = $db;
        $this->id = $id;
        $query = $this->db->prepare('SELECT * FROM produits WHERE id = :id');
        $query->bindParam(':id', $this->id);
        $query->execute();
        $product = $query->fetch();

        if ($product) {
            $this->nom = $product['nom'];
            $this->descr = $product['description'];
            $this->prix = $product['prix'];
            $this->stock = $product['stock'];
        }
    }
    public function getId() {
        return $this->id;
    }
    public function getNom() {
        return $this->nom;
    }

    public function getDesc() {
        return $this->descr;
    }
    public function getPrix() {
        return $this->prix;
    }
    public function getStock() {
        return $this->stock;
    }
    public function setName($name) {
        $this->nom=$name;
        $query=$this->db->prepare('UPDATE produits SET nom = :name WHERE id = :id');
        $query->bindParam('name', $this->nom);
        $query->bindParam('id', $this->id);
        $query->execute();
    }
}