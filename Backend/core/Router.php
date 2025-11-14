<?php
	namespace App\Core;
	class Router {
		private static $routes = [];

		public static function get($uri, $callback) {
			self::addRoute('GET', $uri, $callback);
		}

		public static function post($uri, $callback) {
			self::addRoute('POST', $uri, $callback);
		}

		public static function put($uri, $callback) {
			self::addRoute('PUT', $uri, $callback);
		}

		public static function delete($uri, $callback) {
			self::addRoute('DELETE', $uri, $callback);
		}

		public static function patch($uri, $callback) {
			self::addRoute('PATCH', $uri, $callback);
		}

		public static function options($uri, $callback) {
			self::addRoute('OPTIONS', $uri, $callback);
		}

		private static function addRoute($method, $route, $callback) {
			$routePattern = preg_replace('/{(\w+)}/', '(?P<$1>[^/]+)', $route);
			$routePattern = '#^' . str_replace('/', '\\/', $routePattern) . '$#';

			self::$routes[$method][$routePattern] = [
				'callback' => $callback
			];
		}

		public static function dispatch($url){
			$method = $_SERVER['REQUEST_METHOD'];
			$url = self::normalizeUrl($url);

			if(!isset(self::$routes[$method])){
				http_response_code(404);
                echo '404 Not Found';
                exit;
			}

			foreach (self::$routes[$method] as $routePattern => $info) {
				if(preg_match($routePattern, $url, $matches)){
					array_shift($matches);
					self::handleMiddlewares($routePattern);
					self::callController($info['callback'], $matches);
					return;
				}
			}
		}

		private static function normalizeUrl($url){
			return '/' . trim(parse_url($url, PHP_URL_PATH), '/');
		}

		private static function handleMiddlewares($routePattern){
			if(!isset(self::$middlewares[$routePattern])){
				return;
			}
		}

		private static function callController($callbackAction, $params){
			[$controller, $method] = explode('@', $callbackAction);
			$controller = 'App\\Controllers\\' . $controller;

			if(class_exists($controller)){
				$controllerInstance = new $controller();
				call_user_func_array([$controllerInstance, $method], array_values($params));
			} else {
				http_response_code(500);
				echo '500 Internal Server Error';
			}
		}
	}
