<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m241105_105144_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Apartment', [
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'title' => $this->string()->notNull(),
            'subtitle' => $this->string(),
            'description' => $this->string(),
            'price' => $this->integer()->notNull(),
            'floor' => $this->integer()->notNull(),
            'img' => $this->string(),
            'address' => $this->string(),
            'add_title' => $this->string(),
            'add_img' =>$this->string(),
            'API_flag' => $this->boolean(),
            'PRIMARY KEY(id)'
        ]);

        $this->CreateTable('Room', [
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'id_apartment' => $this->integer()->notNull(),
            'title' => $this->string(),
            'area' => $this->integer(),
            'uid' =>  $this->string(),
            'PRIMARY KEY(id)'

        ]);


        $this->createTable('Texts', [
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'key' => $this->string()->notNull(),
            'id_group' => $this->integer(),
            'text' => $this->text()->notNull(),
            'admin_comment' => $this->string(),
            'deletable' => $this->boolean(),
            'PRIMARY KEY(id)'
        ]);

        $this->CreateTable('Group', [
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'title' => $this->string(),
            'PRIMARY KEY(id)'

        ]);


        $this->createTable('Documents', [
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'key' => $this->string()->notNull(),
            'file' => $this->string()->notNull(),
            'PRIMARY KEY(id)'
        ]);

        $this->createTable('Gallery', [
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'name' => $this->string()->notNull(),
            'PRIMARY KEY(id)'
        ]);

        $this->createTable('GalleryImages', [
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'id_gallery' => $this->integer(),
            'img' => $this->string()->notNull(),
            'title' => $this->string(),
            'text' => $this->text(),
            'PRIMARY KEY(id)'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Apartment');
        $this->dropTable('Room');
        $this->dropTable('Documents');
        $this->dropTable('Gallery');
        $this->dropTable('GalleryImages');
        $this->dropTable('Text');
        $this->dropTable('Group');

    }
}
