<?php
    /**
     * Handles all the business logic for 
     * news
     */
    namespace App\Services;

    use App\Interfaces\ServiceInterface;
    use App\Repositories\NewsRepository;
    use App\Transformers\NewsTransformer;
    class NewsService implements ServiceInterface{
        private $newsRepository;
        private $newsTransformer;

        /**
         * Inject the dependencies
         * @param \App\Repositories\NewsRepository $newsRepository
         * @param \App\Transformers\NewsTransformer $newsTransformer
         */
        public function __construct(
            NewsRepository $newsRepository,
            NewsTransformer $newsTransformer
            ) {
            $this->newsRepository = $newsRepository;
            $this->newsTransformer = $newsTransformer;
        }

        /**
         * fetch all data from news table
         * @return array
         */
        public function getAll():array {
            $result = $this->newsRepository->findAll();
            return $this->newsTransformer->transformCollection($result);
        }
    }
