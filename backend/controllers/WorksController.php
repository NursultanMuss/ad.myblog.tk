<?php

namespace backend\controllers;

use Yii;
use backend\models\Works;
use backend\models\WorksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * WorksController implements the CRUD actions for Works model.
 */
class WorksController extends Controller
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


    /**
     * Lists all Works models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Works model.
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
     * Creates a new Works model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Works();


        if ($model->load(Yii::$app->request->post()) ) {

            $dir=Yii::getAlias('@frontend'.'/web/img/works/');
            $model->file= UploadedFile::getInstance($model, 'file');
            $model->file->saveAs(Yii::getAlias('@frontend'.'/web/img/works/').$model->file->baseName.'.'.$model->file->extension);
            $model->img=$model->file->baseName.'.'.$model->file->extension;

            $model->save();

            return $this->redirect(['index']);

//            $file = UploadedFile::getInstance($model, 'file');
//            if ($file && $file->tempName) {
//                $model->file = $file;
//
//                $dir = Yii::getAlias('@frontend'.'/web/img/works/');
//                $fileName = $model->file->baseName . '.' . $model->file->extension;
//                echo $dir;
//                $model->file->saveAs($dir .$fileName);
//                $model->file = $fileName; // без этого ошибка
//                $model->img = '/' . $dir . $fileName;
//                // Для ресайза фотки до 800x800px по большей стороне надо обращаться к функции Box() или widen, так как в обертках доступны только 5 простых функций: crop, frame, getImagine, setImagine, text, thumbnail, watermark
//                $photo = Image::getImagine()->open($dir . $fileName);
//                $photo->thumbnail(new Box(800, 800))->save($dir . $fileName, ['quality' => 90]);
////                $imagineObj = new Imagine();
////                $imageObj = $imagineObj->open(\Yii::$app->basePath . $dir . $fileName);
////                $imageObj->resize($imageObj->getSize()->widen(400))->save(\Yii::$app->basePath . $dir . $fileName);
//
//               $this->createDirectory(Yii::getAlias('@frontend'.'/web/img/works/thumbs'));
//                Image::thumbnail($dir . $fileName, 150, 70)
//                    ->save(Yii::getAlias($dir . 'thumbs/' . $fileName), ['quality' => 80]);
            //}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Works model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Works model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Works model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Works the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Works::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
