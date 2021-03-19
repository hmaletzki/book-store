<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Second Migration
 */
final class Version2 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'New column slug added to book entity';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE book ADD slug VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE book DROP slug');
    }
}
