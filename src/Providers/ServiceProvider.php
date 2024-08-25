<?php
    /**
     * Handle service provider dependencies
     */
    namespace App\Providers;

    use App\Models\CommentsModel;
    use App\Repositories\CommentsRepository;
    use App\Services\CommentsService;
    use App\Transformers\CommentsTransformer;
    use App\Transformers\NewsTransformer;
    use App\Utils\DB;
    use App\Models\NewsModel;
    use App\Repositories\NewsRepository;
    use App\Services\NewsService;
    use App\Utils\ViewRenderer;

    class ServiceProvider {
         /**
         * Get the services depending on the class passed
         *
         * @return mixed The dependency required by the controller (e.g., a service)
        */
        public static function getDependencies($class) {
            switch ($class) {
                case 'App\Controllers\BaseController':
                    $database = new DB();
                    $newsTransformer = new NewsTransformer();
                    $newsModel = new NewsModel($database);
                    $newsRepository = new NewsRepository($newsModel);
                    $newsService = new NewsService($newsRepository, $newsTransformer);

                    $commentTransformer = new CommentsTransformer();
                    $commentsModel = new CommentsModel($database);
                    $commentsRepository = new CommentsRepository($commentsModel);
                    $commentsService = new CommentsService($commentsRepository, $commentTransformer);
                    return [
                        $newsService,
                        $commentsService,
                        new ViewRenderer()
                    ];
                default:
                    throw new \Exception("No dependencies found for class: $class");
            }
        }
    }
