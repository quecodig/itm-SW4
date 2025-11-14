<?php
	namespace App\Helpers;
	class ResponseHelper {
		public static function sendSuccess($data, $message = 'Success', $statusCode = 200) {
			http_response_code($statusCode);
			header('Content-Type: application/json; charset=utf-8');
			$payload = [
				'status' => 'success',
				'message' => ($message),
				'data' => ($data)
			];
			echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);
			exit;
		}

		public static function sendError($message, $statusCode = 400) {
			http_response_code($statusCode);
			header('Content-Type: application/json; charset=utf-8');
			$payload = [
				'status' => 'error',
				'message' => ($message)
			];
			echo json_encode($payload);
			exit;
		}
	}
