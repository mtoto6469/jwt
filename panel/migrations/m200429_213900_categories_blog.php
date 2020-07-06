<?php

use yii\db\Migration;

/**
 * Class m200429_213900_categories_blog
 */
class m200429_213900_categories_blog extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return $this->createTable('{{%categories_blog}}',[
            'id'=>$this->primaryKey(),
            'parent_id'=>$this->integer()->notNull()->defaultValue(0),
            'title'=>$this->string(200)->notNull(),
            'description'=>$this->text()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200429_213900_categories_blog cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200429_213900_categories_blog cannot be reverted.\n";

        return false;
    }
    */
}
