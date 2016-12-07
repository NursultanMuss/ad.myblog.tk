<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Programming;
use frontend\models\Works;
use frontend\models\Blog;

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
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                    [
                        'class' => AccessControl::className(),
                        'denyCallback' => function ($rule, $action) {
                            throw new \Exception('У вас нет доступа к этой странице');
                        }
                    ]
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Programming::find()->where(['hide' => 0]);
        $pagination= new Pagination([
            'defaultPageSize'=>3,
            'totalCount' => $query->count()

        ]);
        $query_w=Works::find()->where(['active' => 1]);
        $pagination_w = new Pagination([
            'defaultPageSize'=>4,
            'totalCount' => $query_w -> count()
        ]);
        $posts= $query->orderBy(['date' => SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $works=$query_w->orderBy(['date' => SORT_ASC])
            ->offset($pagination_w->offset)
            ->limit($pagination_w->limit)
            ->all();

        return $this->render('index',[
            'posts' => $posts,
            'works' => $works,
            'active_page' => Yii::$app->request->get("page", 1),
            'count_pages' => $pagination -> getPageCount(),
            'pagination' => $pagination
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
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
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    
    
    /* -------------------------------------------------------------
    ======	PAGES
    ------------------------------------------------------------- */
    
    public function actionAbout(){
        return $this->render('about');
    }
    public function actionContacts (){
        $form = new ContactForm();
        return $this->render('contacts',[
            'form'
        ]);
    }
    
     public function actionWorks(){
        $query=Works::find()->where(['active' => 1]);
        $pagination = new Pagination([
            'defaultPageSize'=>5,
            'totalCount' => $query -> count()
        ]);
        $works=$query->orderBy(['date' => SORT_ASC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('works',[
            'works' => $works,
            'active_page' => Yii::$app->request->get("page", 1),
            'count_pages' => $pagination ->getPageCount(),
            'pagination' => $pagination
        ]);
    }
     public function actionWork(){
        $work=Works::find()->where(['id' => Yii::$app->getRequest()->getQueryParam('id')])->one();
        Works::setNumber($work);
        return $this->render('work', [
            'work' => $work
        ]);
    }
    public function actionProgramming(){
        $query = Programming::find()->where(['hide' => 0]);
        $pagination = new Pagination([
            'defaultPageSize'=> 9,
            'totalCount' => $query -> count()
        ]);
        $prog_posts=$query->orderBy(['date' => SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('programmings',[
            'prog_posts' => $prog_posts,
            'active_page' => Yii::$app->request->get('page',1),
            'count_pages' => $pagination ->getPageCount(),
            'pagination' => $pagination
        ]);
    }

    public function actionProg_post(){
        $prog_post =Programming::find()->where(['id' => Yii::$app->getRequest()->getQueryParam('id')])->one();
        Programming::setNumbers([$prog_post]);
        return $this->render('prog_post', [
            'prog_post' => $prog_post
        ]);
    }

    public function actionProg_category(){
        $cat_post = Programming::find()->where(['category' => Yii::$app->getRequest()->getQueryParam('category')])->all();
        $category=Yii::$app->getRequest()->getQueryParam('category');
        return $this->render('prog_cat', [
           'cat_post' => $cat_post,
            'category' => $category
        ]);
    }

    /* -------------------------------------------------------------
======	PAGE
------------------------------------------------------------- */

    /* -- BLOG - POSTS
    ------------------------------------------------------------- */

    public function actionBlog (){
        $query_p=Blog::find()->where(['hide' => 0]);
        $pagination =new Pagination([
            'defaultPageSize'=> 5,
            'totalCount' => $query_p -> count()
        ]);

        $blog_posts= $query_p->orderBy(['date' => SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('blog',[
            'blog_posts' => $blog_posts,
            'active_page' => Yii::$app->request->get('page',1),
            'count_pages' => $pagination ->getPageCount(),
            'pagination' => $pagination
        ]);
    }

    public function actionBlog_post (){
        $blog_post=Blog::find()->where(['id' => Yii::$app->getRequest()->getQueryParams('id')])->one();
        Blog::setNumbers($blog_post);
        return $this->render('blog_post',[
            'blog_post' => $blog_post
        ]);
    }
    
    
    public function actionBlog_category(){
        $cat_post = Blog::find()->where(['category' => Yii::$app->getRequest()->getQueryParam('category')])->all();
        return $this->render('blog_cat', [
            'cat_post' => $cat_post,
            'category' => Yii::$app->getRequest()->getQueryParam('category')
        ]);
    }
    
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
