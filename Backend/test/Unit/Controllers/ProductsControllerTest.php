<?php
namespace Tests\Unit\Controllers;
use Tests\TestCase;

class ProductsControllerTest extends TestCase {

	protected function setUp(): void {
		parent::setUp();

		// Mock environment variables para las pruebas
		$_ENV['DB_HOST'] = 'localhost';
		$_ENV['DB_NAME'] = 'test_db';
		$_ENV['DB_USER'] = 'test_user';
		$_ENV['DB_PASSWORD'] = 'test_password';
	}

	public function testLaClaseControladorExiste(): void {
		$this->assertTrue(class_exists('App\Controllers\ProductsController'));
	}

	public function testControladorTieneMetodosRequeridos(): void {
		$reflection = new \ReflectionClass('App\Controllers\ProductsController');

		$this->assertTrue($reflection->hasMethod('index'));
		$this->assertTrue($reflection->hasMethod('show'));
		$this->assertTrue($reflection->hasMethod('create'));
		$this->assertTrue($reflection->hasMethod('update'));
		$this->assertTrue($reflection->hasMethod('delete'));
	}

	public function testMetodosDelControladorSonPublicos(): void {
		$reflection = new \ReflectionClass('App\Controllers\ProductsController');

		$this->assertTrue($reflection->getMethod('index')->isPublic());
		$this->assertTrue($reflection->getMethod('show')->isPublic());
		$this->assertTrue($reflection->getMethod('create')->isPublic());
		$this->assertTrue($reflection->getMethod('update')->isPublic());
		$this->assertTrue($reflection->getMethod('delete')->isPublic());
	}

	public function testControladorTienePropiedadModelo(): void {
		$reflection = new \ReflectionClass('App\Controllers\ProductsController');
		$this->assertTrue($reflection->hasProperty('model'));
	}
}
