<?php
//
//namespace app\controllers;
//
//use app\models\AuthAssignment;
//use app\models\Profile;
//use Yii;
//use app\models\User_;
//use app\models\User_Search;
//use yii\web\Controller;
//use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;
//use yii\web\UploadedFile;
//
///**
// * UserController implements the CRUD actions for User_ model.
// */
//class UserController extends Controller
//{
//    /**
//     * {@inheritdoc}
//     */
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }
//
//    /**
//     * Lists all User_ models.
//     * @return mixed
//     */
//    public function actionIndex()
//    {
//        $searchModel = new User_Search();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }
//
//    /**
//     * Displays a single User_ model.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
//
//    /**
//     * Creates a new User_ model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionCreate()
//    {
//        var_dump( Yii::$app->request->post());
//        $model = new User_();
//        $chek = $model->load(Yii::$app->request->post());
//        $model_ = new Profile();
//        $model->auth_key = Yii::$app->security->generateRandomString();
//        $model->access_token = Yii::$app->security->generateRandomString();
//        $model->unique_key = uniqid();
//        $model->password =Yii::$app->security->generateRandomString();
//        $model->status = 2;
//        $model->verify_code = (string)rand(1000,9999);
//        $model->user_parent = Yii::$app->user->identity['user_parent'];
//        $model->created_at = time();
//        $model->updated_at = time();
//
//
//
//        if($chek && $model->save()){
//
//            $auth = new AuthAssignment();
//            $auth->user_id =(string) $model->id;
//            $auth->item_name = 'customer';
//            $auth->save();
//
//
//
//            $check_upload = 0;
//            if($model_->load(Yii::$app->request->post())){
//                $model_->file_one = UploadedFile::getInstance($model_, 'file_one');
//                $model_->file_tow = UploadedFile::getInstance($model_, 'file_tow');
//                $model_->file_tree = UploadedFile::getInstance($model_, 'file_tree');
//                $name_one = uniqid().'.'.$model_->file_one->extension;
//                $name_tow = uniqid().'.'.$model_->file_tow->extension;
//                $name_tree = uniqid().'.'.$model_->file_tree->extension;
//                if($model_->file_one->saveAs('uploads/'.$name_one,false)){
//                    $check_upload++;
//                    $model_->national_card = $name_one;
//                }
//                if($model_->file_tree->saveAs('uploads/'.$name_tree,false)){
//                    $check_upload++;
//                    $model_->signature_certificate = $name_tree;
//                }
//                if($model_->file_tow->saveAs('uploads/'.$name_tow,false)){
//                    $check_upload++;
//                    $model_->conractor = $name_tow;
//                }
//            }
//            $model_->created_at = time();
//            $model_->updated_at = time();
//            $model_->user_id = Yii::$app->user->getId();
//
//            if( $model_->save()){
//                $user = User_::find()->where(['id'=>Yii::$app->user->getId()])->one();
//                $user->status = 3;
//                $user->save();
//
//                return $this->redirect(['view', 'id' => $model->id]);
//            }
//
//
//
//
//
//        }
//
//
//
//        return $this->render('create', [
//            'model' => $model,
//            'model_' => $model_,
//        ]);
//    }
//
//    /**
//     * Updates an existing User_ model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Deletes an existing User_ model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//
//    /**
//     * Finds the User_ model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param integer $id
//     * @return User_ the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = User_::findOne($id)) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
//    }
//}
