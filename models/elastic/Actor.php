<?php

namespace app\models\elastic;

class Actor extends \yii\elasticsearch\ActiveRecord
{
    public static function primaryKey()
    {
        return ['actor_id'];
    }

    public function attributes()
    {
        return ['actor_id', 'first_name', 'last_name', 'last_update'];
    }

    public static function createIndex()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->createIndex(static::index());
    }

    public static function deleteIndex()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->deleteIndex(static::index());
    }
}
