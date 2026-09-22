<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260922055422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE note (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, category VARCHAR(100) NOT NULL, priority INTEGER DEFAULT NULL, deadline DATETIME DEFAULT NULL, statusdone BOOLEAN NOT NULL)');
        $this->addSql('DROP TABLE notes');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE "BINARY", category VARCHAR(100) NOT NULL COLLATE "BINARY", priority INTEGER DEFAULT NULL, deadline DATETIME DEFAULT NULL, statusdone BOOLEAN NOT NULL)');
        $this->addSql('DROP TABLE note');
    }
}
