<?php 
    /**
     * automatically load classes that are needed  
     */
    namespace App;
    class Autoloader {
        public function loadClass($class):void {
            $prefix = 'App\\';
            $baseDir = __DIR__ . '/src/';

            $len = strlen($prefix);
            // Get the relative class name
            $relativeClass = substr($class, $len);

            // Replace the namespace prefix with the base directory
            // replace namespace separators with directory separators in the relative class name
            // append with .php
            $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
            // If the file exists, require it
            if (file_exists($file)) {
                require $file;
            } else {
                echo "File not found: " . $file . "<br>";
            }
        }
    }



