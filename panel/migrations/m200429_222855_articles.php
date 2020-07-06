<?php

use yii\db\Migration;

/**
 * Class m200429_222855_articles
 */
class m200429_222855_articles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return $this->createTable('{{%articles}}',[
            'id'=>$this->primaryKey(),
            'category_id'=>$this->integer()->notNull()->defaultValue(0),
            'writer_id'=>$this->integer()->notNull()->defaultValue(0),
            'count_view'=>$this->integer()->notNull()->defaultValue(0),
            'like_view'=>$this->integer()->notNull()->defaultValue(0),
            'title'=>$this->string(200)->notNull(),
            'body'=>$this->text()->notNull(),
            'description'=>$this->text()->notNull(),
            'keys'=>$this->string(200)->notNull(),
            'cover'=>$this->string(200)->notNull(),
            'slug'=>$this->string(200)->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);
    }
    

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200429_222855_articles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200429_222855_articles cannot be reverted.\n";

        return false;
    }
    */
}
