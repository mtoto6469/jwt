<?php

use yii\db\Migration;

/**
 * Class m200430_120326_inurance_type
 */
class m200430_120326_inurance_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return $this->createTable('{{%insurance_type}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(200)->notNull(),
            'link'=>$this->string(200)->notNull(),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200430_120326_inurance_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200430_120326_inurance_type cannot be reverted.\n";

        return false;
    }
    */
}
