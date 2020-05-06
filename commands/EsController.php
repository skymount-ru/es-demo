<?php


namespace app\commands;


use app\models\Actor;
use app\models\elastic\Actor as ElasticActor;
use yii\console\Controller;
use yii\helpers\Console;

class EsController extends Controller
{
    public function actionInit()
    {
        ElasticActor::createIndex();
    }

    public function actionIndexData()
    {
        $query = Actor::find();

        /** @var Actor $actor */
        foreach ($query->each() as $key => $actor) {
            echo "#{$key}\t";
            $elastic = new ElasticActor;
            $elastic->setAttributes($actor->getAttributes(), false);
            if (!$elastic->save()) {
                throw new \yii\base\ErrorException('Unable to index a record. ' . Console::errorSummary($elastic));
            }
            echo "..done\n";
        }

        echo "Finished\n";
    }
}
