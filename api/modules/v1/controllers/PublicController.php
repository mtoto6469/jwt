<?php

namespace api\modules\v1\controllers;

use api\modules\v1\models\LogSms;
use api\modules\v1\models\UserSignup;
use api\modules\v1\models\User;
use api\modules\v1\models\VerifyPhone;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\Cors;
use yii\httpclient\Client;
use yii\rest\Controller;

class PublicController extends Controller
{
    public $key = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbklkIjoiODYzZTNiMWItZDVmMi00ZjY0LWIzZjUtMDA0YzY3YjcwMmI1IiwicmVmcmVzaFRva2VuIjoiS2JGZzlMS3NYckY4cDlETE1jMm16Z3JrRlRNSkVkbHBRdEdEOVpkZER3ZGFjbmFkdFkxMHhQOVBmaVEyeEkzcUxGdXZteTRQS2oyYXNRRDc1alhoOEZyNWlwZW00OFVyalMwY25pamR4WXFnYU90VFNqc1RpYjFad0FwOVp0Nm1FU2dDOXdLZWZoM0NBNnI3TkROSWRuSHh1b3JRbE1mdHl1OUMySUJmWHd1dWcySnpNTWpTejB1MklwZ25TU1ozVkNOUFFLbU41cGx2Wks3dzdqYkpUYXBPSk9SSjFLWkhxZkdBQXdabUkzZnBNVzRuMWRzQXBqdTdrdkhweDBVViIsImNyZWF0aW9uRGF0ZSI6IjEzOTkwNDA1MTIyNjM5IiwibGlmZVRpbWUiOjg2NDAwMDAwMCwiY2xpZW50SWQiOiJhcm1hbmVnaHRlc2FkMSIsInVzZXJJZCI6IjMzMDAxNDM4MDIiLCJhY3RpdmUiOnRydWUsInNjb3BlcyI6WyJvYWs6aWJhbi1pbnF1aXJ5OmdldCIsImJvdXJzZTppcy1zZWphbWk6Z2V0IiwiYm91cnNlOnNlamFtLXN0YXR1czpnZXQiLCJib3Vyc2U6Y2MtcmVnaXN0ZXItc2VqYW1pLXVzZXI6Z2V0IiwiYm91cnNlOmNjLXNlamFtLW90cC1jb2RlOmV4ZWN1dGUiLCJib3Vyc2U6Y2Mtc2VqYW0tc2hvdy1wcm9maWxlOmdldCIsImJvdXJzZTpjYy1zZWphbS1jb25maXJtLXByb2ZpbGluZzpleGVjdXRlIiwiYm91cnNlOmNjLWlzLXNlamFtaS11c2VyOmdldCIsImJvdXJzZTpjYy1zZWphbS1maW5hbmNpYWwtYnJva2VyczpnZXQiLCJib3Vyc2U6Y2Mtc2VqYW0tYmFua3M6Z2V0IiwiYm91cnNlOmNjLXNlamFtLWpvYnM6Z2V0IiwiYm91cnNlOmNjLXNlamFtLXNlY3Rpb25zOmdldCIsImJvdXJzZTpjYy1zZWphbS1wcm92aW5jZXM6Z2V0IiwiYm91cnNlOmNjLXNlamFtLWNpdGllczpnZXQiLCJib3Vyc2U6Y2Mtc2VqYW0tY291bnRyaWVzOmdldCIsImJvb21yYW5nOndhZ2VzOmdldCIsImJvb21yYW5nOnRva2VuczpnZXQiLCJib29tcmFuZzp0b2tlbjpkZWxldGUiLCJib29tcmFuZzpzbXMtdmVyaWZ5OmV4ZWN1dGUiLCJib29tcmFuZzpzbXMtc2VuZDpleGVjdXRlIl0sInR5cGUiOiJDTElFTlQtQ1JFREVOVElBTCIsImJhbmsiOiIwNjIiLCJpYXQiOjE1OTMwNzE3OTksImV4cCI6MTU5MzkzNTc5OX0.mYUFKOLQqez6ggxMwkEougAI9efavxhvNeCDNNGhwDHr1km6gyyf4xQqTQKU_Lc-xLA5dcQJorbVeZmrVJRT18EC9tD2IyZqbUUB26MwytLQYrTdgCTiSQweOYMdWRkCBjHiPUvVIzYMspIXMNSksu5XraJtoB2IF8i1-R_zg0EWPyOeQ5kz4bTAutiwJdm86kmPLJ19bS56XIgopDtUulLRMtxllfbUE2H1ms4ivd14g03Q2_oYvKgH0VxxmWWzNT20VJ5GEysLxvUxsBOsWhJDPStul-l6uiRUs5U34itHbvHbPh394ts1pb6PdvsH4iH4kYKVwv6ZiaIe2xchRQ';

    public static function allowedDomains()
    {
        return [
            '*'
        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBasicAuth::className(),
                HttpBearerAuth::className(),
                QueryParamAuth::className(),
            ],
        ];
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
            'cors' => [
                'Origin' => ['*'],
            ]];


        return $behaviors;
    }

    /**
     * @SWG\Get(path="/public/get-countries-name",
     *     tags={"public"},
     *     summary="set cuontry name",
     *     description="ارسال نام کشور",
     *     produces={"application/json"},

     *
     *     @SWG\Response(
     *         response = 200,
     *         description ="private => null,
                             public => ''"
     *     ),
     *      @SWG\Schema(
     *             type="object",
     *             @SWG\Property(
     *                  property="stations",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Location")
     *             ),
     *         ),
     *     @SWG\Response(
     *     response = 500,
     *     description="private => null,
                        public => مشکل در گرفتن اطلاعات  کشورها.",
     *
     *     )
     * )
     *
     */
    public function actionGetCountriesName()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://apibeta.finnotech.ir/bourse/v2/clients/armaneghtesad1/countries?trackId=' . $this->gen_uuid())
            ->setHeaders(['Authorization' => 'Bearer ' . $this->key])
            ->send();
        $result = json_decode($response->content);


        if ($result->status == 'DONE' && isset($result)) {


            return [
                'status' => 'DONE',
                'message' => [
                    'private' => null,
                    'public' => '',
                ],
                'data' => $result->result
            ];
        } else {
            return [
                'status' => 'FAILED',
                'message' => [
                    'private' => null,
                    'public' => 'مشکل در گرفتن اطلاعات  کشورها',
                ],
                'data' => [
                ]
            ];
        }


    }
    /**
     * @SWG\Get(path="/public/get-provinces-name",
     *     tags={"public"},
     *     summary="set cuontry id and get proviner name",
     *     description="ارسال آیدی کشور و دریافت نام استان",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "id_country",
     *        description = "آیدی کشور",
     *        required=true,
     *        type = "integer"
     *     ),
     *
     *     @SWG\Response(
     *         response = 200,
     *         description ="private => null,
               public => ''",
     *
     *     ),
     *      @SWG\Schema(
     *             type="object",
     *             @SWG\Property(
     *                  property="stations",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Location")
     *             ),
     *         ),
     * )
     *
     */
    public function actionGetProvincesName($id_country)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://apibeta.finnotech.ir/bourse/v2/clients/armaneghtesad1/countries/' . $id_country . '/provinces?trackId=' . $this->gen_uuid())
            ->setHeaders(['Authorization' => 'Bearer ' . $this->key])
            ->send();
        $result = json_decode($response->content);
        return [
            'status' => 'DONE',
            'message' => [
                'private' => null,
                'public' => '',
            ],
            'data' => isset($result->result) ? $result->result : []
        ];


    }

    /**
     * @SWG\Get(path="/public/get-cities-name",
     *     tags={"public"},
     *     summary="get cuontry id ,provider id and send city name",
     *     description="ارسال آیدی کشور و آیدی استان سپس دریافت نام شهر",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "id_country",
     *        description = "آیدی کشور",
     *        required=true,
     *        type = "integer"
     *     ),
     *       @SWG\Parameter(
     *        in = "query",
     *        name = "id_province",
     *        description = "آیدی استان",
     *        required=true,
     *        type = "integer"
     *     ),
     *
     *     @SWG\Response(
     *         response = 200,
     *         description ="private => null,
               public => ''",
     *
     *     ),
     *      @SWG\Schema(
     *             type="object",
     *             @SWG\Property(
     *                  property="stations",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Location")
     *             ),
     *         ),
     * )
     *
     */
    public function actionGetCitiesName($id_country, $id_province)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://apibeta.finnotech.ir/bourse/v2/clients/armaneghtesad1/countries/' . $id_country . '/provinces/' . $id_province . '/cities?trackId=' . $this->gen_uuid())
            ->setHeaders(['Authorization' => 'Bearer ' . $this->key])
            ->send();
        $result = json_decode($response->content);


        return [
            'status' => 'DONE',
            'message' => [
                'private' => null,
                'public' => '',
            ],
            'data' => isset($result->result) ? $result->result : []
        ];
    }

    /**
     * @SWG\Get(path="/public/get-sections-name",
     *     tags={"public"},
     *     summary="set cuontry id ,provider id and get city name",
     *     description="ارسال آیدی کشور و استان و شهر سپس دریافت نام بخش",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "id_country",
     *        description = "آیدی کشور",
     *        required=true,
     *        type = "integer"
     *     ),
     *       @SWG\Parameter(
     *        in = "query",
     *        name = "id_province",
     *        description = "آیدی استان",
     *        required=true,
     *        type = "integer"
     *     ),
     *      @SWG\Parameter(
     *        in = "query",
     *        name = "id_city",
     *        description = "آیدی شهر",
     *        required=true,
     *        type = "integer"
     *     ),
     *
     *     @SWG\Response(
     *         response = 200,
     *         description ="private => null,
               public => ''",
     *
     *     ),
     *      @SWG\Schema(
     *             type="object",
     *             @SWG\Property(
     *                  property="stations",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Location")
     *             ),
     *         ),
     * )
     *
     */
    public function actionGetSectionsName($id_country, $id_province, $id_city)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://apibeta.finnotech.ir/bourse/v2/clients/armaneghtesad1/countries/' . $id_country . '/provinces/' . $id_province . '/cities/' . $id_city . '/sections?trackId=' . $this->gen_uuid())
            ->setHeaders(['Authorization' => 'Bearer ' . $this->key])
            ->send();
        $result = json_decode($response->content);


        return [
            'status' => 'DONE',
            'message' => [
                'private' => null,
                'public' => '',
            ],
            'data' => isset($result->result) ? $result->result : []
        ];
    }

    /**
     * @SWG\Get(path="/public/get-jobs-title",
     *     tags={"public"},
     *     summary="set cuontry id ,provider id and get city name",
     *     description="دریافت شغل ها",
     *     produces={"application/json"},

     *     @SWG\Response(
     *         response = 200,
     *         description ="private => null,
               public => ''",
     *
     *     ),
     *      @SWG\Schema(
     *             type="object",
     *             @SWG\Property(
     *                  property="stations",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Location")
     *             ),
     *         ),
     * )
     *
     */
    public function actionGetJobsTitle()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://apibeta.finnotech.ir/bourse/v2/clients/armaneghtesad1/jobs?trackId=' . $this->gen_uuid())
            ->setHeaders(['Authorization' => 'Bearer ' . $this->key])
            ->send();
        $result = json_decode($response->content);

        return [
            'status' => 'DONE',
            'message' => [
                'private' => null,
                'public' => '',
            ],
            'data' => isset($result->result) ? $result->result : []
        ];


    }

    public function actionGetBanksName()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://apibeta.finnotech.ir/bourse/v2/clients/armaneghtesad1/banks?trackId=' . $this->gen_uuid())
            ->setHeaders(['Authorization' => 'Bearer ' . $this->key])
            ->send();
        $result = json_decode($response->content);

        return [
            'status' => 'DONE',
            'message' => [
                'private' => null,
                'public' => '',
            ],
            'data' => $result->result
        ];
    }

    function gen_uuid()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

}
