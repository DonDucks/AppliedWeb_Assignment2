<?php

namespace app\controllers;

use Yii;
use app\models\UserProfile;
use app\models\UserProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for UserProfile model.
 */
class PostController extends Controller
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

    /**
     * Lists all UserProfile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserProfile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserProfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $model = new UserProfile();

        if ($model->load(Yii::$app->request->post())) 
        {
            $model->file = UploadedFile::getInstance($model, 'file');
            if($model->file)
            {
                $imagepath = 'uploads/profile/';
                $model->Profile_Picture = $imagepath .rand(10,100).$model->file->name;
            }

            if($model->save())
            {
                if($model->file)
                {
                    $model->file->saveAs($model->Profile_Picture);
                    return $this->redirect(['view', 'id' => $model->ID]);
                }
                
                return $this->redirect(['view', 'id' => $model->ID]);    
            }
        } 
         else 
        {
            return $this->render('create', ['model' => $model,]);
        }
    }
    
//    public function actionCreate()
//    {
//        $model = new UserProfile();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            $model->file = UploadedFile::getInstance($model, 'file');
//            if($model->file){
//                $imagepath = 'uploads/profile/';
//                $model->Profile_Picture = $imagepath.rand(10,100).$model->file->name;
//            }
//               
//                if($model->file){
//                    $model->file->saveAs($model->Profile_Picture);
//                }
//                return $this->redirect(['view', 'id' => $model->ID]);
//            
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }

    
//    public function actionCreate()
//    {
//        $model = new UserProfile();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->ID]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }

    /**
     * Updates an existing UserProfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if($model->file){
                $imagepath = 'uploads/profile/';
                $model->Profile_Picture = $imagepath .rand(10,100).$model->file->name;
            }

            if($model->save()){
                if($model->file){
                    $model->file->saveAs($model->Profile_Picture);
                    return $this->redirect(['view', 'id' => $model->ID]);
                }
                return $this->redirect(['view', 'id' => $model->ID]);
            }
            
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->ID]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }

    /**
     * Deletes an existing UserProfile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    
    public function actionErase($id)
    {
        $Profile_Picture = UserProfile::find()->where(['id'=>$id])->one()->Profile_Picture;
        if($Profile_Picture)
        {
            if(!unlink($Profile_Picture))
            {
                return false;
            }
        }

        $userprofile = UserProfile::findOne($id);
        $userprofile->Profile_Picture = 'uploads/default.jpg';
        $userprofile->update();

        return $this->redirect(['update', 'id'=>$id]);
    }
    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserProfile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
