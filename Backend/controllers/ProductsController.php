<?php
	namespace App\Controllers;
	use App\Model\ProductsModel;
	use App\Helpers\ResponseHelper;

	class ProductsController{
		private $model;

		public function __construct() {
			$dsn = "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8";
			$options = [
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
				\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
			];
			$pdo = new \PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $options);
			$this->model = new ProductsModel($pdo);
		}

		public function index() {
			$products = $this->model->all();
			ResponseHelper::sendSuccess($products);
		}

		public function show($id) {
			$product = $this->model->find($id);
			if ($product) {
				ResponseHelper::sendSuccess($product);
			} else {
				ResponseHelper::sendError("Product not found", 404);
			}
		}

		public function update($id) {
			$data = json_decode(file_get_contents("php://input"), true);
			if (empty($data)) {
				ResponseHelper::sendError("No data provided for update", 400);
				return;
			}
			$updated = $this->model->update($id, $data);
			if ($updated) {
				ResponseHelper::sendSuccess("Product updated successfully");
			} else {
				ResponseHelper::sendError("Failed to update product", 500);
			}
		}

		public function delete($id) {
			$deleted = $this->model->delete($id);
			if ($deleted) {
				ResponseHelper::sendSuccess("Product deleted successfully");
			} else {
				ResponseHelper::sendError("Failed to delete product", 500);
			}
		}

		public function create() {
			$data = json_decode(file_get_contents("php://input"), true);
			if (empty($data)) {
				ResponseHelper::sendError("No data provided for creation", 400);
				return;
			}
			$newProduct = $this->model->create($data);
			if ($newProduct) {
				ResponseHelper::sendSuccess("Product created successfully", 201);
			} else {
				ResponseHelper::sendError("Failed to create product", 500);
			}
		}
	}
