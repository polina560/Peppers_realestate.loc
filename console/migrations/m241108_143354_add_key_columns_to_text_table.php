<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%text}}`.
 */
class m241108_143354_add_key_columns_to_text_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('Texts', 'main_address', $this->boolean()->comment("Основной адрес"));
        $this->addColumn('Texts', 'main_phone', $this->boolean()->comment("Основной телефон"));
        $this->addColumn('Texts', 'sales_office_address', $this->boolean()->comment("Офис продаж. Адрес"));
        $this->addColumn('Texts', 'sales_office_phone  ', $this->boolean()->comment("Офис продаж. Телефон"));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
