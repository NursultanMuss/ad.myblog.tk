<?php

namespace backend\controllers;

use Yii;
use backend\models\Blog;
use backend\models\BlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


     public function createDirectory($path) {
        //$filename = "/folder/{$dirname}/";
        if (file_exists($path)) {
            //echo "The directory {$path} exists";
        } else {
            mkdir($path, 0775, true);
            //echo "The directory {$path} was successfully created.";
        }
    }

    public function deleteImg($model,$current_image){
        if($model->del_img)
                    {
                        if(file_exists(Yii::getAlias('@frontend'.'/web/img/blog/'.$current_image)))
                        {
                            //удаляем файл
                            unlink(Yii::getAlias('@frontend'.'/web/img/blog/'.$current_image));
                            $model->img = '';
                        }
                    }
    }

    /**
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blog model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blog();
        $model->hits=0;
        $model->hide=0;
        $model->date=date('U');

        if(Yii::$app->request->isAjax && $model->load($_POST)){
            Yii::$app->response->format = 'json';
            return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) ) {
            $dir=Yii::getAlias('@frontend'.'/web/img/blog/');
            $model->file= UploadedFile::getInstance($model, 'file');
            $model->file->saveAs(Yii::getAlias('@frontend'.'/web/img/blog/').$model->file->baseName.'.'.$model->file->extension);
            $model->img=$model->file->baseName.'.'.$model->file->extension;
            $this->createDirectory(Yii::getAlias('@frontend'.'/web/img/blog/thumbs'));
            Image::thumbnail($dir . $model->file->baseName.'.'.$model->file->extension, 150, 70)
                ->save(Yii::getAlias($dir . 'thumbs/' . $model->file->baseName.'.'.$model->file->extension), ['quality' => 90]);

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Blog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $current_image = $model->img;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            $dir=Yii::getAlias('@frontend'.'/web/img/blog/');
//            $model->file= UploadedFile::getInstance($model, 'file');
//            $this->deleteImg($model, $current_image);
//
//            $model->file->saveAs(Yii::getAlias('@frontend'.'/web/img/blog/').$model->file->baseName.'.'.$model->file->extension);
//            $model->img=$model->file->baseName.'.'.$model->file->extension;
//            $this->createDirectory(Yii::getAlias('@frontend'.'/web/img/blog/thumbs'));
//            Image::thumbnail($dir . $model->file->baseName.'.'.$model->file->extension, 150, 70)
//                ->save(Yii::getAlias($dir . 'thumbs/' . $model->file->baseName.'.'.$model->file->extension), ['quality' => 90]);

            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Blog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDelete_all()
    {
        if (isset($_POST['keylist'])) {
            $keys = \yii\helpers\Json::decode($_POST['keylist']);
            // you will have the array of pk ids to process in $keys
            // perform batch action on these keys and return status
            // back to ajax call above
            
        }

//        $action=Yii::$app->request->post('action');
//        $selection=Yii::$app->request->get('selection[]');//typecasting.
//        echo $selection;
//        foreach($selection as $id){
//
//            $model = Blog::findOne((int)$id);//make a typecasting
//            //do your stuff
//            echo "<pre>";
//            print_r($model);
//            echo "</pre>";
//        }

//        echo $selection;
//        foreach($selection as $ids){
//
//                print_r($ids);
//
//        }
//            echo $id;
//            $model = Blog::findOne((int)$id);//make a typecasting
//            $model->delete();
//        }
//        $this->findModel($id)->delete();

//        return $this->redirect(['index']);
    }

    /**
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
