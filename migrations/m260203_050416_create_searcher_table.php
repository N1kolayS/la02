<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%searcher}}`.
 */
class m260203_050416_create_searcher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%searcher}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'name' => $this->string(),
            'tg' => $this->string(),
            'call' => $this->string(),
            'phone' => $this->string(),
            'auto_number' => $this->string(),
            'address' => $this->string(),
            'coordinate' => $this->string(),
            'spg' => $this->boolean()->defaultValue(false),
            'sg' => $this->boolean()->defaultValue(false),
            'equipment' => $this->text(),
            'target_urban' => $this->boolean()->defaultValue(false),
            'target_forest' => $this->boolean()->defaultValue(false),
            'medicine_base' => $this->boolean()->defaultValue(false),
            'medicine_spec' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%searcher}}');
    }
}
