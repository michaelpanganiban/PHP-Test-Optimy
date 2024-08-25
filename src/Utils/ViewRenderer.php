<?php 
    /**
     * Utility for rendering the view
     */
    namespace App\Utils;

    class ViewRenderer {

        /**
         * the view method renders the interface
         * @param mixed $viewName - the name of the view
         * @param array $data - the data which will be used on view
         * @return void
         */
        public function view($viewName, $data = []) {
            // Extract data to be available as variables in the view
            extract($data);

            // Include the view file
            include __DIR__ . '/../Views/' . $viewName . '.php';
        }
    }