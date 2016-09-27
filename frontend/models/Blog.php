<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property string $id
 * @property string $title
 * @property integer $user_id
 * @property string $content
 * @property string $user_name
 * @property integer $cat_id
 * @property string $brief
 * @property string $key_word
 * @property integer $check_time
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'user_id', 'content', 'cat_id', 'brief', 'key_word'], 'required'],
            [['user_id', 'cat_id','check_time'], 'integer'],
            [['content', 'key_word'], 'string'],
            [['title', 'user_name', 'brief'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'user_id' => 'User ID',
            'content' => 'Content',
            'user_name' => 'User Name',
            'cat_id' => 'Cat ID',
            'brief' => 'Brief',
            'key_word' => 'Key Word',
            'check_time' => 'check_time',
        ];
    }

//    public function getBlogCat($user_id)
//    {
//        $this->find()
//    }

    public function info($id)
    {
        return $this->find()->where(['id'=>$id])->one();
    }

    public function getRecent($user_id)
    {
//        var_dump($user_id);
        return $this->find()->where(['user_id'=>$user_id])->asArray()->all();
    }



}
