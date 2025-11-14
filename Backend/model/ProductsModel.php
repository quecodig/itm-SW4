<?php
	namespace App\Model;
	class ProductsModel {
		private $db;

		public function __construct($databaseConnection) {
			$this->db = $databaseConnection;
		}

		public function all() {
			$stmt = $this->db->prepare("SELECT * FROM products");
			$stmt->execute();
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		public function find($id) {
			$stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			return $stmt->fetch(\PDO::FETCH_ASSOC);
		}

		public function create($data) {
			$stmt = $this->db->prepare("INSERT INTO products (name, description, price, stock) VALUES (:name, :description, :price, :stock)");
			$stmt->bindParam(':name', $data['name']);
			$stmt->bindParam(':description', $data['description']);
			$stmt->bindParam(':price', $data['price']);
			$stmt->bindParam(':stock', $data['stock']);
			return $stmt->execute();
		}

		public function update($id, $data) {
			$stmt = $this->db->prepare("UPDATE products SET name = :name, description = :description, price = :price, stock = :stock WHERE id = :id");
			$stmt->bindParam(':name', $data['name']);
			$stmt->bindParam(':description', $data['description']);
			$stmt->bindParam(':price', $data['price']);
			$stmt->bindParam(':stock', $data['stock']);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		}

		public function delete($id) {
			$stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		}
	}
