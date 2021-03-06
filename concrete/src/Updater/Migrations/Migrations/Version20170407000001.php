<?php

namespace Concrete\Core\Updater\Migrations\Migrations;

use Concrete\Core\Updater\Migrations\AbstractMigration;
use Concrete\Core\Updater\Migrations\DirectSchemaUpgraderInterface;

class Version20170407000001 extends AbstractMigration implements DirectSchemaUpgraderInterface
{
    /**
     * {@inheritdoc}
     *
     * @see \Concrete\Core\Updater\Migrations\DirectSchemaUpgraderInterface::upgradeDatabase()
     */
    public function upgradeDatabase()
    {
        $this->connection->executeQuery('set foreign_key_checks = 0');
        $this->refreshEntities([
            'Concrete\Core\Entity\File\File',
            'Concrete\Core\Entity\User\User',
        ]);
        $this->connection->executeQuery('set foreign_key_checks = 1');
    }
}
