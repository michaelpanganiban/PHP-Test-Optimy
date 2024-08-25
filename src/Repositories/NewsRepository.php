<?php
    /**
     * Handle coordination of app
     * to database
     */
    namespace App\Repositories;
    use App\Interfaces\RepositoryInterface;
    use App\Models\NewsModel;

    class NewsRepository implements RepositoryInterface {
        private $model;

        public function __construct(NewsModel $model) {
            $this->model = $model;
        }

        /**
         * fetch all data for news
         * @return mixed
         */
        public function findAll() {
            return $this->model->fetchAll();
        }
    }