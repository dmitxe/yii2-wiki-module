<?php

use yii\db\Migration;

/**
 * @author Dmitry Khe, AS infotrack dmitxe
 * @link http://dmitxe.ru
 * @license MIT
 * Handles the creation of table `wiki_article`.
 */
class m181109_052722_create_wiki_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wiki_article}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'slug' => $this->string()->notNull()->unique(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
            'created_user_id' => $this->integer(),
            'created_by' => $this->dateTime()->notNull(),
            'updated_user_id' => $this->integer(),
            'updated_by' => $this->dateTime()->notNull(),
        ]);

        $this->createIndex(
            'idx-wiki_article-category_id',
            '{{%wiki_article}}',
            'category_id'
        );

        $this->addForeignKey(
            'fk-wiki_article-category_id',
            '{{%wiki_article}}',
            'category_id',
            '{{%wiki_category}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-wiki_article-category_id',
            '{{%wiki_article}}'
        );

        $this->dropIndex(
            'idx-wiki_article-category_id',
            '{{%wiki_article}}'
        );

        $this->dropTable('{{%wiki_article}}');
    }
}
