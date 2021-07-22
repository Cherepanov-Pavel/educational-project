<?php

namespace app\models;

class News extends \yii\db\ActiveRecord{

    public static function tableName()
    {
        return 'news';
    }

    public static function getInfo()
    {
        return self::find()->orderBy(['date' => SORT_DESC])->limit(3)->all();;
    }
}
