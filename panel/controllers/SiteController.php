<?php

namespace app\controllers;

use app\models\AuthAssignment;
use app\models\Profile;
use app\models\SignupForm;
use app\models\User_;
use app\modules\blog\models\Articles;
use app\models\User;
use Yii;
use yii\base\View;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\web\UploadedFile;

///**
// * @SWG\Swagger(
// *     basePath="/",
// *     produces={"application/json"},
// *     consumes={"application/x-www-form-urlencoded"},
// *     @SWG\Info(version="1.0", title="Simple API"),
// * )
// */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index','logout','contact','about','default','articles','article','company','signup','verify','news'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index','logout','contact','about','default','articles','article','company','signup','verify','news'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout','contact','about','default','articles','article','company','signup','news'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'logout' => ['get'],
                ],
            ],
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function actions()
    {


        return [

            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout'=>'oauth'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'doc' => [
                'class' => 'light\swagger\SwaggerAction',
                'restUrl' => \yii\helpers\Url::to(['/site/api'], true),
            ],
            //The resultUrl action.
            'api' => [
                'class' => 'light\swagger\SwaggerApiAction',
                //The scan directories, you should use real path there.
                'scanDir' => [
                    Yii::getAlias('@api/modules/v1/swagger'),
//                var_dump('@api/modules/v1/controllers'),
                    Yii::getAlias('@api/modules/v1/controllers'),
                    Yii::getAlias('@api/modules/v1/models'),
//                    Yii::getAlias('@api/models'),
                ],
                //The security key
//                'api_key' => 'balbalbal',
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
        if(Yii::$app->user->identity->status == 2){
            $model = new Profile();
            $check_upload = 0;
            if($model->load(Yii::$app->request->post())){
                $model->file_one = UploadedFile::getInstance($model, 'file_one');
                $model->file_tow = UploadedFile::getInstance($model, 'file_tow');
                $model->file_tree = UploadedFile::getInstance($model, 'file_tree');
                $name_one = uniqid().'.'.$model->file_one->extension;
                $name_tow = uniqid().'.'.$model->file_tow->extension;
                $name_tree = uniqid().'.'.$model->file_tree->extension;
                if($model->file_one->saveAs('uploads/'.$name_one,false)){
                    $check_upload++;
                    $model->national_card = $name_one;
                }
                if($model->file_tree->saveAs('uploads/'.$name_tree,false)){
                    $check_upload++;
                    $model->signature_certificate = $name_tree;
                }
                if($model->file_tow->saveAs('uploads/'.$name_tow,false)){
                    $check_upload++;
                    $model->conractor = $name_tow;
                }
            }
            $model->created_at = time();
            $model->updated_at = time();
            $model->user_id = Yii::$app->user->getId();

            if( $model->save()){
                $user = User_::find()->where(['id'=>Yii::$app->user->getId()])->one();
                $user->status = 3;
                $user->save();
                return $this->redirect('index');
            }


            return $this->render('verify',[
                'model'=>$model
            ]);
        }

        return $this->render('index');
    }

    public function actionNews(){
        $this->layout = 'frontend';

        return $this->render('news');
    }
    public function actionNew($id){
        $this->layout = 'frontend';

        return $this->render('new');
    }
    public function actionFundcost(){
        $this->layout = 'frontend';

        return $this->render('fundcost');
    }
    public function actionFundgoals(){
        $this->layout = 'frontend';

        return $this->render('fundgoals');
    }
    public function actionFundstatute(){
        $this->layout = 'frontend';

        return $this->render('fundstatute');
    }
    public function actionFundprospectus(){
        $this->layout = 'frontend';

        return $this->render('fundprospectus');
    }
    public function actionFundbankaccounts(){
        $this->layout = 'frontend';

        return $this->render('fundbankaccounts');
    }
    public function actionFundinvestmenthelp(){
        $this->layout = 'frontend';

        return $this->render('fundinvestmenthelp');
    }
    public function actionFundbranchs(){
        $this->layout = 'frontend';

        return $this->render('fundbranchs');
    }
    public function actionFundgeneralinfo(){
        $this->layout = 'frontend';

        return $this->render('fundgeneralinfo');
    }
    public function actionFundcontactus(){
        $this->layout = 'frontend';

        return $this->render('fundcontactus');
    }
    public function actionFundcomplaint(){
        $this->layout = 'frontend';

        return $this->render('fundcomplaint');
    }
    public function actionAuditor(){
        $this->layout = 'frontend';

        return $this->render('auditor');
    }
 public function actionSuperunits(){
        $this->layout = 'frontend';

        return $this->render('superunits');
    }
    public function actionFinancialstatements(){
        $this->layout = 'frontend';

        return $this->render('financialstatements');
    }
    public function actionMeeting(){
        $this->layout = 'frontend';

        return $this->render('meeting');
    }
    public function actionEfficiencyfordifferentperiods(){
        $this->layout = 'frontend';

        return $this->render('efficiencyfordifferentperiods');
    }
    public function actionDailyefficiency(){
        $this->layout = 'frontend';

        return $this->render('dailyefficiency');
    }
    public function actionAssetdistributionfordifferentperiods(){
        $this->layout = 'frontend';

        return $this->render('assetaistributionfordifferentperiods');
    }

    public function actionDailyassetdistribution(){
        $this->layout = 'frontend';

        return $this->render('dailyassetdistribution');
    }

    public function actionDailyassetdistributionp(){
        $this->layout = 'frontend';

        return $this->render('dailyassetdistributionp');
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'oauth';
        if (!Yii::$app->user->isGuest) {

            return $this->redirect(['index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('login');
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $this->layout = 'frontend';

        return $this->render('contact', [

        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    /**
     * Displays default page.
     *
     * @return string
     */
    public function actionDefault()
    {
        $this->layout = 'frontend';
        return $this->render('default');
    }

    public function actionArticles($id = 0)
    {
        $this->layout = 'blog';
        if (!$id) {
            return $this->render('articles', [
                'articles' => Articles::find()->all()
            ]);
        }
        return $this->render('articles', [
            'articles' => Articles::find()->where(['category_id'=>$id])->all()
        ]);
    }

    public function actionArticle($id)
    {
        $this->layout = 'blog';
        return $this->render('article',[
            'model'=>Articles::findOne($id)
        ]);
    }

    public function actionSignup()
    {
        $this->layout = 'oauth';
       $model = new User_();
       $model->auth_key = Yii::$app->security->generateRandomString();
       $model->access_token = Yii::$app->security->generateRandomString();
       $model->unique_key = uniqid();
       $model->status = 2;
       $model->verify_code = (string)rand(1000,9999);




       if($model->load(Yii::$app->request->post())&& $model->save()){

           $auth = new AuthAssignment();
           $auth->user_id = (string)$model->id;
           $auth->item_name = 'customer';

           return $this->redirect('login');
       }


        return $this->render('signup',[
            'model'=>$model
        ]);
    }

    public function actionVerify()
    {
        $model = new Profile();

        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->render('verify',[
                'model'=>$model
            ]);
        }
        return $this->redirect('index');
    }
}
