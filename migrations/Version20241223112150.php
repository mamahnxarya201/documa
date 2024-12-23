<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241223112150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE application_logs (id UUID NOT NULL, user_id_id UUID DEFAULT NULL, user_type VARCHAR(255) NOT NULL, event_type VARCHAR(255) NOT NULL, target_id VARCHAR(255) NOT NULL, target_type VARCHAR(255) NOT NULL, metadata JSON NOT NULL, performed_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_763AED49D86650F ON application_logs (user_id_id)');
        $this->addSql('COMMENT ON COLUMN application_logs.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN application_logs.user_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN application_logs.performed_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE comment (id UUID NOT NULL, user_id_id UUID NOT NULL, document_id_id UUID NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9474526C9D86650F ON comment (user_id_id)');
        $this->addSql('CREATE INDEX IDX_9474526C16E5E825 ON comment (document_id_id)');
        $this->addSql('COMMENT ON COLUMN comment.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN comment.user_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN comment.document_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN comment.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN comment.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE system_logs (id UUID NOT NULL, event_type VARCHAR(255) NOT NULL, event_details JSON NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN system_logs.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN system_logs.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE application_logs ADD CONSTRAINT FK_763AED49D86650F FOREIGN KEY (user_id_id) REFERENCES users_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9D86650F FOREIGN KEY (user_id_id) REFERENCES users_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C16E5E825 FOREIGN KEY (document_id_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document DROP comment');
        $this->addSql('ALTER TABLE document RENAME COLUMN notes TO description');
        $this->addSql('ALTER TABLE session ADD session_id UUID NOT NULL');
        $this->addSql('COMMENT ON COLUMN session.session_id IS \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE application_logs DROP CONSTRAINT FK_763AED49D86650F');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C9D86650F');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C16E5E825');
        $this->addSql('DROP TABLE application_logs');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE system_logs');
        $this->addSql('ALTER TABLE session DROP session_id');
        $this->addSql('ALTER TABLE document ADD comment JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE document RENAME COLUMN description TO notes');
    }
}
