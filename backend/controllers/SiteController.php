<?php
namespace backend\controllers;

use backend\models\Blog;
use backend\models\Programming;
use backend\models\Works;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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
        $query=Programming::find()->all();
        $query_p_l=Programming::find()->orderBy(['date_of_publication' => SORT_DESC])->limit(3)->all();
        $progPostN = count($query);
        $query_b_l=Blog::find()->orderBy(['date' => SORT_DESC])->limit(3)->all();
        $query_b=Blog::find()->all();
        $blogPostN = count($query_b);

        $query_w_l=Works::find()->orderBy(['date' => SORT_DESC])->limit(3)->all();

        return $this->render('index',[
            'query'  => $query,
            'query_b_l' => $query_b_l,
            'query_p_l' => $query_p_l,
            'query_w_l' => $query_w_l,
            'progPostN'  => $progPostN,
            'blogPostN'  => $blogPostN
        ]);
    }



    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
