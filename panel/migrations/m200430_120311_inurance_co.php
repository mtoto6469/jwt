<?php

use yii\db\Migration;

/**
 * Class m200430_120311_inurance_co
 */
class m200430_120311_inurance_co extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return $this->createTable('{{%insurance_co}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(200)->notNull(),
            'description'=>$this->text()->notNull(),
            'slug'=>$this->string(200)->notNull(),
            'title'=>$this->string(200)->notNull(),
            'keys'=>$this->string(200)->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200430_120311_inurance_co cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200430_120311_inurance_co cannot be reverted.\n";

        return false;
    }
    */
}
