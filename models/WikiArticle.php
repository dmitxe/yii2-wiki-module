<?php

namespace dmitxe\yii2\wiki\models;

use Yii;

/**
 * @author Dmitry Khe, AS infotrack dmitxe
 * @link http://dmitxe.ru
 * @license MIT
 * This is the model class for table "{{%wiki_article}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $slug
 * @property string $title
 * @property string $content
 * @property int $created_user_id
 * @property string $created_by
 * @property int $updated_user_id
 * @property string $updated_by
 *
 * @property WikiCategory $category
 */
class WikiArticle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%wiki_article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'created_user_id', 'updated_user_id'], 'integer'],
            [['slug', 'title'], 'required'],
            [['content'], 'string'],
            [['created_by', 'updated_by'], 'safe'],
            [['slug', 'title'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['slug'], 'match', 'pattern' => '/^[a-zA-Z-]+$/i', 'message' => 'Slug can only contain Alphabet and Hyphen only'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => WikiCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'created_user_id' => Yii::t('app', 'Created User ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_user_id' => Yii::t('app', 'Updated User ID'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(WikiCategory::className(), ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     * @return WikiArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WikiArticleQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->created_by = date('Y-m-d H:i:s');
                $this->created_user_id = Yii::$app->user->isGuest ? Yii::$app->user->id : null;
            }
            $this->updated_by = date('Y-m-d H:i:s');
            $this->updated_user_id = Yii::$app->user->isGuest ? Yii::$app->user->id : null;
            return true;
        } else {
            return false;
        }
    }

}
