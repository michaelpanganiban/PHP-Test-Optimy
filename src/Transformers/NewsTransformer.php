<?php
    /**
     * Summary of namespace App\Transformers
     * Transform the data returned from sql query
     * into a more readable data
     */
    namespace App\Transformers;
    use App\Interfaces\TransformerInterface;

    class NewsTransformer implements TransformerInterface{
        /**
         * Transform a single news item.
         *
         * @param array $newsItem
         * @return array
         */
        public function transform(array $newsItem): array {
            return [
                'id' => $newsItem['id'],
                'title' => $newsItem['title'],
                'body' => $newsItem['body'],
                'created_at' => $newsItem['created_at'],
            ];
        }

        /**
         * Transform a collection of news items.
         *
         * @param array $newsCollection
         * @return array
         */
        public function transformCollection(array $newsCollection): array {
            return array_map([$this, 'transform'], $newsCollection);
        }
    }
