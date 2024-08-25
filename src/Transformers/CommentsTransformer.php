<?php

    namespace App\Transformers;
    use App\Interfaces\TransformerInterface;

    class CommentsTransformer implements TransformerInterface {
        /**
         * Transform a single comments item.
         *
         * @param array $commentsItem
         * @return array
         */
        public function transform(array $commentsItem): array {
            return [
                'id' => $commentsItem['id'],
                'news_id' => $commentsItem['news_id'],
                'body' => $commentsItem['body'],
                'created_at' => $commentsItem['created_at'],
            ];
        }

        /**
         * Transform a collection of comments items.
         *
         * @param array $commentsCollection
         * @return array
         */
        public function transformCollection(array $commentsCollection): array {
            return array_map([$this, 'transform'], $commentsCollection);
        }
    }
