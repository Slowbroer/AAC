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

        if(empty($data['id']))
        {
            $blog = new Blog();
            $blog['user_id']=Yii::$app->user->id;
        }
        else
        {
            $blog = Blog::findOne($data['id']);
        }



        $blog->load(Yii::$app->request->post());//load函数是更新这个实例变量的数据
//        Yii::$app->response->format=Response::FORMAT_JSON;
        if($blog->save())//这里的save是跳到BaseActiveRecord，但是BaseActiveRecord中save的update是跳到ActiveRecord那边
        {
//            return ['code'=>1,'message'=>'success'];
            $result = array('code'=>1,'content'=>'commit success');
            echo $this->render("/result",['result'=>$result]);
        }

        else
        {
            $result = array('code'=>0,'content'=>'commit faild');
            echo $this->render("/error/error",['result'=>$result]);
//            return ['code'=>0,'message'=>'failed'];
        }
    }

    public function actionDel()
    {
        $blog_id = $_POST['id'];
        $result = array();
        if(empty($blog_id)||!is_numeric($blog_id))
        {
            $result['code']=0;
            return json_encode($result);
        }
        else
        {
            $blog = new Blog();
            $result = $blog->del(Yii::$app->user->id,$blog_id);
        }
    }
    public function actionEdit()
    {
        $blog_id = isset($_GET['id'])? $_GET['id']:0;
        if(empty($blog_id)||!is_numeric($blog_id))
        {
            $result['code']=0;
            $result['content']="参数出错";
            echo $this->render("/error/error",['result'=>$result]);
        }
        else
        {
//            $blog = Blog::findOne($blog_id);
            $blog = new Blog();
            $blog_info = $blog->info($blog_id);
            echo $this->render('edit',['model'=>$blog_info]);

        }

    }

    public function actionAdd()
    {
        $blog = new Blog();
        echo $this->render("add",['model'=>$blog]);
    }



    public function actionList()//我的所有博客
    {
        $blog = new Blog();
        $user_id = Yii::$app->user->id;

        $lists = $blog->getList($user_id);


        echo $this->render("my_blog",['model'=>$lists]);
    }


}