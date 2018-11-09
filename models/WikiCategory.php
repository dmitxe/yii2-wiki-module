<?php

namespace dmitxe\yii2\wiki\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * @author Dmitry Khe, AS infotrack dmitxe
 * @link http://dmitxe.ru
 * @license MIT
 * This is the model class for table "{{%wiki_category}}".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 *
 * @property WikiArticle[] $wikiArticles
 */
class WikiCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%wiki_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'title'], 'required'],
            [['slug', 'title'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWikiArticles()
    {
        return $this->hasMany(WikiArticle::className(), ['category_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getFullList()
    {
        $models = self::find()->all();
        return ArrayHelper::map($models,'id','title');
    }
}
