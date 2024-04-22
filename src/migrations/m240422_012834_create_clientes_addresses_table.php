<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clientes_addresses}}`.
 */
class m240422_012834_create_clientes_addresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clientes_addresses}}', [
            'id' => $this->primaryKey(),
            'zip_code' => $this->string(20),
            'street' => $this->string(255),
            'city' => $this->string(255),
            'state' => $this->string(100),
            'number' => $this->string(100),
            'complement' => $this->string(100),
            'client_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk_clients_addresses_client_id', '{{%clientes_addresses}}', 'client_id', '{{%clients}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_clients_addresses_client_id', '{{%clientes_addresses}}');
        $this->dropTable('{{%clientes_addresses}}');
    }
}
