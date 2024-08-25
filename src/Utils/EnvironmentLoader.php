<?php 
	/**
	 * Loads the values from .env file
	 */
    namespace App\Utils;

    class EnvironmentLoader {
        public static function loadEnv() {
			$envFile = __DIR__ . '/../../.env';
			if (file_exists($envFile)) {
				$lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
				foreach ($lines as $line) {
					if (strpos($line, '=') !== false) {
						list($key, $value) = explode('=', $line, 2);
						$key = trim($key);
						$value = trim($value);
						putenv("$key=$value");
					}
				}
			}
		}
    }