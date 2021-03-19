<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version3 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Username added to security user';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE store_users ADD username VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_68BDF3F0F85E0677 ON store_users (username)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX UNIQ_68BDF3F0F85E0677 ON store_users');
        $this->addSql('ALTER TABLE store_users DROP username');
    }
}
