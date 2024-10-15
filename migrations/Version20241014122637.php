<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241014122637 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE portfolio_project DROP FOREIGN KEY FK_7906FF209D066842');
        $this->addSql('DROP INDEX IDX_7906FF209D066842 ON portfolio_project');
        $this->addSql('ALTER TABLE portfolio_project CHANGE categoty_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE portfolio_project ADD CONSTRAINT FK_7906FF2012469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_7906FF2012469DE2 ON portfolio_project (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE portfolio_project DROP FOREIGN KEY FK_7906FF2012469DE2');
        $this->addSql('DROP INDEX IDX_7906FF2012469DE2 ON portfolio_project');
        $this->addSql('ALTER TABLE portfolio_project CHANGE category_id categoty_id INT NOT NULL');
        $this->addSql('ALTER TABLE portfolio_project ADD CONSTRAINT FK_7906FF209D066842 FOREIGN KEY (categoty_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_7906FF209D066842 ON portfolio_project (categoty_id)');
    }
}
