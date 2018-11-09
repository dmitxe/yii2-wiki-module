<?php

namespace dmitxe\yii2\wiki\models;

/**
 * @author Dmitry Khe, AS infotrack dmitxe
 * @link http://dmitxe.ru
 * @license MIT
 * This is the ActiveQuery class for [[WikiArticle]].
 *
 * @see WikiArticle
 */
class WikiArticleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return WikiArticle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return WikiArticle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
