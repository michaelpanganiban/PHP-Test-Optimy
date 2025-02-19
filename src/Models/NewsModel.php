<?php
    namespace App\Models;

    use App\Interfaces\ModelInterface;
    use App\Utils\DB;

    class NewsModel implements ModelInterface{
        private $pdo;
        public function __construct(DB $database) {
            $this->pdo = $database->getInstance();
        }

        public function fetchAll() {
            return $this->pdo->select("SELECT * FROM news");
        }
    }