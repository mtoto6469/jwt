<?php

use yii\db\Migration;

/**
 * Class m200405_080548_messages_sms
 */
class m200405_080548_messages_sms extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      return $this->createTable('{{%messages_sms}}',[
        'id'=>$this->primaryKey(),

        "messageid"=>$this->string(100),
"message"=>$this->string(250),
"status"=>$this->integer(),
"statustext"=>$this->string(100),
"sender"=>$this->string(100),
"receptor"=>$this->string(11),
"date"=>$this->integer(),
"cost"=>$this->string(100)
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200405_080548_messages_sms cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200405_080548_messages_sms cannot be reverted.\n";

        return false;
    }
    */
}
