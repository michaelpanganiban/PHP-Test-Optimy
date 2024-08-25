<?php
    namespace App\Interfaces;
    
    interface TransformerInterface {
        public function transform(array $value): array;

        public function transformCollection(array $value): array;
    }