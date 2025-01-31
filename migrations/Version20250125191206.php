<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250125191206 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE body_block DROP type');
        $this->addSql('ALTER TABLE footer_block DROP type');
        $this->addSql('ALTER TABLE header_block DROP type');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE footer_block ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE header_block ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE body_block ADD type VARCHAR(255) NOT NULL');
    }
}
