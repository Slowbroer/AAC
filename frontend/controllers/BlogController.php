<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-09-03
 * Time: 14:57
 */

namespace frontend\controllers;

use app\models\Blog;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class BlogController extends Controller {

    public function actionInfo(){
        $blog_id = Yii::$app->request->get('id');
        $blog = new Blog();
        $blog_info = $blog->info($blog_id);
//        Yii::$app->response->format=Response::FORMAT_JSON;
//        return ['blog'=>$blog];

        return $this->render('info',['model'=>$blog_info]);
    }
    public function actionSave(){
        $data = Yii::$app->request->post('Blog');

        $blog = Blog::findOne($data['id']);
        $blog->load(Yii::$app->request->post());//load函数是更新这个实例变量的数据
        Yii::$app->response->format=Response::FORMAT_JSON;
        if($blog->save())//这里的save是跳到BaseActiveRecord，但是BaseActiveRecord中save的update是跳到ActiveRecord那边
        {
            return ['code'=>1,'message'=>'success'];
        }
        else
        {
            return ['code'=>0,'message'=>'failed'];
        }
    }
}