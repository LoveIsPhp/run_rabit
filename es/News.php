<?php

namespace app\es;

class News extends \yii\elasticsearch\ActiveRecord
{
    public static function updateMapping()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $fgdg = 32423;
    }
//    // Other class attributes and methods go here
//    // ...
//
//    /**
//     * @return array This model's mapping
//     */
//    public static function mapping()
//    {
//        return [
//            // Field types: https://www.elastic.co/guide/en/elasticsearch/reference/current/mapping.html#field-datatypes
//            'properties' => [
//                'first_name'     => ['type' => 'text'],
//                'last_name'      => ['type' => 'text'],
//                'order_ids'      => ['type' => 'keyword'],
//                'email'          => ['type' => 'keyword'],
//                'registered_at'  => ['type' => 'date'],
//                'updated_at'     => ['type' => 'date'],
//                'status'         => ['type' => 'keyword'],
//                'is_active'      => ['type' => 'boolean'],
//            ]
//        ];
//    }
//
//    /**
//     * Set (update) mappings for this model
//     */
//    public static function updateMapping()
//    {
//        $db = static::getDb();
//        $command = $db->createCommand();
//        $command->setMapping(static::index(), static::type(), static::mapping());
//    }
//
//    /**
//     * Create this model's index
//     */
//    public static function createIndex()
//    {
//        $db = static::getDb();
//        $command = $db->createCommand();
//        $command->createIndex(static::index(), [
//            //'aliases' => [ /* ... */ ],
//            'mappings' => static::mapping(),
//            //'settings' => [ /* ... */ ],
//        ]);
//    }
//
//    /**
//     * Delete this model's index
//     */
//    public static function deleteIndex()
//    {
//        $db = static::getDb();
//        $command = $db->createCommand();
//        $command->deleteIndex(static::index(), static::type());
//    }
}