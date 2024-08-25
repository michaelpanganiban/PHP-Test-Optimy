<?php
/**
 * BaseController class serves as a root controller.
 * This class handles user requests for the base route.
 */

namespace App\Controllers;
use App\Services\CommentsService;
use App\Services\NewsService;
use App\Utils\ViewRenderer;

class BaseController {
    private $newsService;
    private $commentsService;
    private $viewRenderer;

    /**
     * Constructor initializes the controller with necessary services.
     *
     * @param NewsService $newsService
     * @param CommentsService $commentsService
     * @param ViewRenderer $viewRenderer
     */
    public function __construct(
        NewsService $newsService, 
        CommentsService $commentsService,
        ViewRenderer $viewRenderer
        ) {
        $this->newsService = $newsService;
        $this->commentsService = $commentsService; 
        $this->viewRenderer = $viewRenderer;
    }

    /**
     * show method is the default action for the base route.
     *
     * When a user accesses the root URL, this method is invoked.
     * It calls the service method from the service class
     * @return void
    */
    public function show() {
        $news = $this->newsService->getAll();
        $comments = $this->commentsService->getAll();
        $this->viewRenderer->view('index', ['news' => $news,'comments'=> $comments]);
    }
}
