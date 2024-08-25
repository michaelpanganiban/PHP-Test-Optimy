<?php
    /**
     * Handles all the business logic for 
     * comments
     */
    namespace App\Services;

    use App\Interfaces\ServiceInterface;
    use App\Repositories\CommentsRepository;
    use App\Transformers\CommentsTransformer;

    class CommentsService implements ServiceInterface {
        private $commentRepository;
        private $commentTransfomer;

        /**
         * Inject the dependencies
         * @param \App\Repositories\CommentsRepository $commentsRepository
         * @param \App\Transformers\CommentsTransformer $commentsTransformer
         */
        public function __construct(
            CommentsRepository $commentRepository,
            CommentsTransformer $commentTransfomer
            ) {
            $this->commentRepository = $commentRepository;
            $this->commentTransfomer = $commentTransfomer;
        }

        /**
         * fetch all data from comments table
         * @return array
         */
        public function getAll():array {
            $result = $this->commentRepository->findAll();
            return $this->commentTransfomer->transformCollection($result);
        }
    }
