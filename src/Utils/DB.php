<?php

	namespace App\Utils;

	use App\Utils\EnvironmentLoader;
	class DB
	{
		private $pdo;

		private static $instance = null;

		public function __construct() {
			EnvironmentLoader::loadEnv();

			$database = getenv('DATABASE');
			$dbName = getenv('DB_NAME');
			$dbHost = getenv('DB_HOST');
			$dbUser = getenv('DB_USERNAME');
			$dbPass = getenv('DB_PASSWORD');
			
			$dsn = $database.':dbname='.$dbName.';host='.$dbHost;
			$this->pdo = new \PDO($dsn, $dbUser, $dbPass);
		}

		public static function getInstance()
		{
			if (null === self::$instance) {
				$c = __CLASS__;
				self::$instance = new $c;
			}
			return self::$instance;
		}

		public function select($sql)
		{
			$sth = $this->pdo->query($sql);
			return $sth->fetchAll();
		}
	}