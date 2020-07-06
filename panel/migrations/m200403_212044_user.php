<?php

use yii\db\Migration;

/**
 * Class m200403_212044_user
 */
class m200403_212044_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      return $this->createTable('{{%user}}',[
        'id'=>$this->primaryKey(),
        'username'=>$this->string(255)->notNull(),
        'phone'=>$this->string(11)->null(),
        'verify_code'=>$this->string(4)->null(),
        'auth_key'=>$this->string(32)->notNull(),
        'password'=>$this->string(255)->notNull(),
        'password_reset_token'=>$this->string(255)->Null(),
        'email'=>$this->string(200)->null(),
        'unique_key'=>$this->string(16)->notNull()->unique(),
        'status'=>$this->integer()->defaultValue(1),
        'access_token'=>$this->string(255)->notNull(),
        'token_expiers'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        'created_at'=>$this->integer(),
        'updated_at'=>$this->integer()

      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200403_212044_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200403_212044_user cannot be reverted.\n";

        return false;
    }
    */
}
