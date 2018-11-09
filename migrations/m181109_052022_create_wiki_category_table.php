<?php

use yii\db\Migration;

/**
 * @author Dmitry Khe, AS infotrack dmitxe
 * @link http://dmitxe.ru
 * @license MIT
 * Handles the creation of table `category`.
 */
class m181109_052022_create_wiki_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wiki_category}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string()->notNull()->unique(),
            'title' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wiki_category}}');
    }
}
