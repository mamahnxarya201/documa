<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241224071444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE document_link (id UUID NOT NULL, shareable_id UUID DEFAULT NULL, document_id UUID DEFAULT NULL, token VARCHAR(255) NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, is_expired BOOLEAN NOT NULL, max_access INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_911815621BAAA08B ON document_link (shareable_id)');
        $this->addSql('CREATE INDEX IDX_91181562C33F7837 ON document_link (document_id)');
        $this->addSql('COMMENT ON COLUMN document_link.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document_link.shareable_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document_link.document_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document_link.expires_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN document_link.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE shareable (id UUID NOT NULL, type VARCHAR(255) NOT NULL, reference_id UUID NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN shareable.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN shareable.reference_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE document_link ADD CONSTRAINT FK_911815621BAAA08B FOREIGN KEY (shareable_id) REFERENCES shareable (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_link ADD CONSTRAINT FK_91181562C33F7837 FOREIGN KEY (document_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE document_link DROP CONSTRAINT FK_911815621BAAA08B');
        $this->addSql('ALTER TABLE document_link DROP CONSTRAINT FK_91181562C33F7837');
        $this->addSql('DROP TABLE document_link');
        $this->addSql('DROP TABLE shareable');
    }
}
