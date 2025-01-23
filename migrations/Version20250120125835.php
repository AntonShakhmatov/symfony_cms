<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250120125835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE block (id INT AUTO_INCREMENT NOT NULL, page_id INT NOT NULL, header_id INT DEFAULT NULL, body_id INT DEFAULT NULL, footer_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, INDEX IDX_831B9722C4663E4 (page_id), INDEX IDX_831B97222EF91FD8 (header_id), INDEX IDX_831B97229B621D84 (body_id), INDEX IDX_831B97222412A144 (footer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B9722C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B97222EF91FD8 FOREIGN KEY (header_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B97229B621D84 FOREIGN KEY (body_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B97222412A144 FOREIGN KEY (footer_id) REFERENCES page (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B9722C4663E4');
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B97222EF91FD8');
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B97229B621D84');
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B97222412A144');
        $this->addSql('DROP TABLE block');
    }
}
