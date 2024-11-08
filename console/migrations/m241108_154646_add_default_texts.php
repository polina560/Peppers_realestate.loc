<?php

use yii\db\Migration;

/**
 * Class m241108_154646_add_default_texts
 */
class m241108_154646_add_default_texts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%text}}', ['group', 'key', 'value', 'comment'], [
            ['contacts', 'main_address '],
            ['contacts', 'main_phone '],
            ['contacts', 'sales_office_address '],
            ['contacts', 'sales_office_phone ', '', '']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%text}}', ['group' => 'contacts']);
    }
}
