<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-08-30
 * Time: 10:11
 */

namespace frontend\controllers;
//header("Access-Control-Allow-Origin:* ");
use app\models\Blog;
use app\models\Catalog;
use common\models\User;
use Yii;
use yii\web\Controller;

class UserController extends Controller {



    public function actionCenter(){
//        var_dump(Yii::$app->user->identity->id);
        $id = Yii::$app->user->identity->id;

//        var_dump( Yii::$app->user);

        $user = User::findIdentity($id);

        $catalog = new Catalog();


        $cat_list = $catalog->getCat($id);
        foreach($cat_list as $key => $cat)
        {
            $cat_list[$key]['sec_cat']=$catalog->getSec($cat['id']);

        }

//        $model = new Blog();
        $model = Blog::find()->where(['id'=>1])->one();





//        var_dump($cat_list);

        return $this->render('center',['cat_list'=>$cat_list,'model'=>$model,'user'=>$user]);
    }

    public function actionRecent_blog(){
        $user_id = Yii::$app;
        var_dump($user_id);
        $user_id = isset($_POST['user_id'])? $_POST['user_id']:0;
        $blog = new Blog();

        $list = $blog->getRecent($user_id);

        $list = "test";
        if(empty($list))
        {
            return null;
        }
        else
        {
////            $content = $this->renderPartial('/blog/list',['lists'=>$list]);
            $content = "test";
             echo $content;
        }

//        echo "test";



    }

    public function actionTest(){
        $id=$_POST['id'];
    }



}