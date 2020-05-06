<?php

namespace app\controllers;

use app\models\elastic\Actor;
use yii\elasticsearch\ActiveDataProvider;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     * todo update
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout'],
//                'rules' => [
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $actorsDP = new ActiveDataProvider([
            'query' => Actor::find()
        ]);

        return $this->render('index', [
            'actorsDP' => $actorsDP,
        ]);
    }
}
