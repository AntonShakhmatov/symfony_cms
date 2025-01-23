<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250121113944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B97222412A144');
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B97222EF91FD8');
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B97229B621D84');
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B9722C4663E4');
        $this->addSql('DROP INDEX IDX_831B97222412A144 ON block');
        $this->addSql('DROP INDEX IDX_831B9722C4663E4 ON block');
        $this->addSql('DROP INDEX IDX_831B97229B621D84 ON block');
        $this->addSql('DROP INDEX IDX_831B97222EF91FD8 ON block');
        $this->addSql('ALTER TABLE block ADD header_page_id INT DEFAULT NULL, ADD body_page_id INT DEFAULT NULL, ADD footer_page_id INT DEFAULT NULL, DROP page_id, DROP header_id, DROP body_id, DROP footer_id');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B9722DAAE3DDF FOREIGN KEY (header_page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B9722E5B0DA72 FOREIGN KEY (body_page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B97226CAD19AC FOREIGN KEY (footer_page_id) REFERENCES page (id)');
        $this->addSql('CREATE INDEX IDX_831B9722DAAE3DDF ON block (header_page_id)');
        $this->addSql('CREATE INDEX IDX_831B9722E5B0DA72 ON block (body_page_id)');
        $this->addSql('CREATE INDEX IDX_831B97226CAD19AC ON block (footer_page_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B9722DAAE3DDF');
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B9722E5B0DA72');
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B97226CAD19AC');
        $this->addSql('DROP INDEX IDX_831B9722DAAE3DDF ON block');
        $this->addSql('DROP INDEX IDX_831B9722E5B0DA72 ON block');
        $this->addSql('DROP INDEX IDX_831B97226CAD19AC ON block');
        $this->addSql('ALTER TABLE block ADD page_id INT NOT NULL, ADD header_id INT DEFAULT NULL, ADD body_id INT DEFAULT NULL, ADD footer_id INT DEFAULT NULL, DROP header_page_id, DROP body_page_id, DROP footer_page_id');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B97222412A144 FOREIGN KEY (footer_id) REFERENCES page (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B97222EF91FD8 FOREIGN KEY (header_id) REFERENCES page (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B97229B621D84 FOREIGN KEY (body_id) REFERENCES page (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B9722C4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_831B97222412A144 ON block (footer_id)');
        $this->addSql('CREATE INDEX IDX_831B9722C4663E4 ON block (page_id)');
        $this->addSql('CREATE INDEX IDX_831B97229B621D84 ON block (body_id)');
        $this->addSql('CREATE INDEX IDX_831B97222EF91FD8 ON block (header_id)');
    }
}
