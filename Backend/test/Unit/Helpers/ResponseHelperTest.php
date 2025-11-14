<?php
namespace Tests\Unit\Helpers;
use PHPUnit\Framework\TestCase;

class ResponseHelperTest extends TestCase {
	public function testLaClaseResponseHelperExiste(): void {
		$this->assertTrue(class_exists('App\Helpers\ResponseHelper'));
	}

	public function testResponseHelperTieneMetodosRequeridos(): void {
		$this->assertTrue(method_exists('App\Helpers\ResponseHelper', 'sendSuccess'));
		$this->assertTrue(method_exists('App\Helpers\ResponseHelper', 'sendError'));
	}

	public function testMetodosSendSuccessSonEstaticos(): void {
		$reflection = new \ReflectionClass('App\Helpers\ResponseHelper');

		$this->assertTrue($reflection->getMethod('sendSuccess')->isStatic());
		$this->assertTrue($reflection->getMethod('sendError')->isStatic());
	}

	public function testMetodoSendSuccessTieneParametrosCorrectos(): void {
		$reflection = new \ReflectionClass('App\Helpers\ResponseHelper');
		$method = $reflection->getMethod('sendSuccess');
		$parameters = $method->getParameters();

		$this->assertCount(3, $parameters);
		$this->assertEquals('data', $parameters[0]->getName());
		$this->assertEquals('message', $parameters[1]->getName());
		$this->assertEquals('statusCode', $parameters[2]->getName());
	}

	public function testMetodoSendErrorTieneParametrosCorrectos(): void {
		$reflection = new \ReflectionClass('App\Helpers\ResponseHelper');
		$method = $reflection->getMethod('sendError');
		$parameters = $method->getParameters();

		$this->assertCount(2, $parameters);
		$this->assertEquals('message', $parameters[0]->getName());
		$this->assertEquals('statusCode', $parameters[1]->getName());
	}
}
