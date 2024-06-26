<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employees}}`.
 * table have 4 fields: id, title, email, attestation_date
 * it used to store information about the Employee 
 */
class m240625_112116_create_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employees}}', [
            'id' => $this->primaryKey(),
             'title' => $this->string(255)->notNull(),
             'email' => $this->string(255)->notNull()->unique(),
             'attestation_date' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employees}}');
    }
}
