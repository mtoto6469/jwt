<?php

use yii\db\Migration;

/**
 * Class m200405_090654_init_rback
 */
class m200405_090654_init_rback extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200405_090654_init_rback cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200405_090654_init_rback cannot be reverted.\n";

        return false;
    }
    */
}
