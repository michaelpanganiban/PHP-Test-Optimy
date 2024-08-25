<?php
    /**
     * Handle coordination of app
     * to database
     */
    namespace App\Repositories;
    use App\Interfaces\RepositoryInterface;
    use App\Models\CommentsModel;

    class CommentsRepository implements RepositoryInterface {
        private $model;

        public function __construct(CommentsModel $model) {
            $this->model = $model;
        }

        /**
         * fetch all data for comments
         * @return mixed
         */
        public function findAll() {
            return $this->model->fetchAll();
        }
    }