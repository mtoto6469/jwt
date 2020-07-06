<?php


namespace api\modules\v1\controllers;


use yii\rest\Controller;

class UserController extends Controller
{
    /**
     * @SWG\Get(path="/user",
     *     tags={"user/index"},
     *     summary="user index",
     *     description="miriam user",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "id",
     *        description = "access token",
     *        required = true,
     *        type = "string"
     *     ),
     *
     *     @SWG\Response(
     *         response = 200,
     *         description = " success"
     *     )
     * )
     *
     */
    public function actionIndex($id){

        return $id;
    }

}