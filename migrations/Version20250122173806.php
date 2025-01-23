<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250122173806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE body_block (id INT AUTO_INCREMENT NOT NULL, body_block_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_20F213EAF06842C4 (body_block_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE footer_block (id INT AUTO_INCREMENT NOT NULL, footer_block_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_A928159D918AA0D4 (footer_block_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE header_block (id INT AUTO_INCREMENT NOT NULL, header_block_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_10BFECC558308376 (header_block_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE body_block ADD CONSTRAINT FK_20F213EAF06842C4 FOREIGN KEY (body_block_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE footer_block ADD CONSTRAINT FK_A928159D918AA0D4 FOREIGN KEY (footer_block_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE header_block ADD CONSTRAINT FK_10BFECC558308376 FOREIGN KEY (header_block_id) REFERENCES page (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE body_block DROP FOREIGN KEY FK_20F213EAF06842C4');
        $this->addSql('ALTER TABLE footer_block DROP FOREIGN KEY FK_A928159D918AA0D4');
        $this->addSql('ALTER TABLE header_block DROP FOREIGN KEY FK_10BFECC558308376');
        $this->addSql('DROP TABLE body_block');
        $this->addSql('DROP TABLE footer_block');
        $this->addSql('DROP TABLE header_block');
    }
}
