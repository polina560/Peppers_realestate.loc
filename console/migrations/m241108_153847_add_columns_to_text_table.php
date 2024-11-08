<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%text}}`.
 */
class m241108_153847_add_columns_to_text_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%text}}', 'group', $this->string());
        $this->addColumn('{{%text}}', 'deletable', $this->boolean()->notNull()->defaultValue(0));
        $this->addColumn('{{%text}}', 'comment', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%text}}', 'group');
        $this->dropColumn('{{%text}}', 'deletable');
        $this->dropColumn('{{%text}}', 'comment');
    }
}
