<?php
namespace Tests;
use PHPUnit\Framework\TestCase as BaseTestCase;
use PDO;

abstract class TestCase extends BaseTestCase {
	protected ?PDO $testDb = null;

	protected function setUp(): void {
		parent::setUp();
		$this->setupTestDatabase();
	}

	protected function setupTestDatabase(): void {
		$dsn = "sqlite::memory:";
		$this->testDb = new PDO($dsn);
		$this->testDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Crear tabla de prueba
		$this->testDb->exec("
			CREATE TABLE products (
				id INTEGER PRIMARY KEY AUTOINCREMENT,
				name VARCHAR(100) NOT NULL,
				description TEXT,
				price DECIMAL(10,2) NOT NULL,
				stock INTEGER DEFAULT 0,
				created_at DATETIME DEFAULT CURRENT_TIMESTAMP
			)
		");
	}

	protected function tearDown(): void {
		$this->testDb = null;
		parent::tearDown();
	}
}
