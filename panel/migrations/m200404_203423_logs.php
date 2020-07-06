<?php

use yii\db\Migration;

/**
 * Class m200404_203423_logs
 */
class m200404_203423_logs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      return $this->createTable('{{%logs}}',[
        'id'=>$this->primaryKey(),
        'user_id'=>$this->string(200)->null(),
        'username'=>$this->string(200)->null(),
        'agent'=>$this->string(200)->null(),
        'ip'=>$this->string(200)->null(),
        'logtime'=>$this->string(50)->null(),
        'controller'=>$this->string(50)->null(),
        'action'=>$this->string(50)->null(),
        'input'=>$this->text()->null(),
        'outpot'=>$this->text()->null(),
        'method'=>$this->text()->null(),
        'route'=>$this->text()->null(),
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200404_203423_logs cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200404_203423_logs cannot be reverted.\n";

        return false;
    }
    */
}
