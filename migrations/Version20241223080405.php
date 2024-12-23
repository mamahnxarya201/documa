<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241223080405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attachment (id UUID NOT NULL, user_group_id_id UUID NOT NULL, status_id_id UUID DEFAULT NULL, filename VARCHAR(255) NOT NULL, filetype VARCHAR(255) NOT NULL, size VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, hash VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_795FD9BB86737CA5 ON attachment (user_group_id_id)');
        $this->addSql('CREATE INDEX IDX_795FD9BB881ECFA7 ON attachment (status_id_id)');
        $this->addSql('COMMENT ON COLUMN attachment.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN attachment.user_group_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN attachment.status_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN attachment.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN attachment.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE document (id UUID NOT NULL, author_id_id UUID NOT NULL, reviewer_id_id UUID NOT NULL, tags_id_id UUID DEFAULT NULL, status_id_id UUID NOT NULL, name VARCHAR(255) NOT NULL, notes VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, comment JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D8698A7669CCBE9A ON document (author_id_id)');
        $this->addSql('CREATE INDEX IDX_D8698A762DC63656 ON document (reviewer_id_id)');
        $this->addSql('CREATE INDEX IDX_D8698A761420680F ON document (tags_id_id)');
        $this->addSql('CREATE INDEX IDX_D8698A76881ECFA7 ON document (status_id_id)');
        $this->addSql('COMMENT ON COLUMN document.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document.author_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document.reviewer_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document.tags_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document.status_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN document.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "group" (id UUID NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, level INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "group".id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "group".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "group".updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE group_invitations (id UUID NOT NULL, status_id_id UUID NOT NULL, group_id_id UUID NOT NULL, email VARCHAR(255) NOT NULL, role INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_69F0F6F881ECFA7 ON group_invitations (status_id_id)');
        $this->addSql('CREATE INDEX IDX_69F0F6F2F68B530 ON group_invitations (group_id_id)');
        $this->addSql('COMMENT ON COLUMN group_invitations.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN group_invitations.status_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN group_invitations.group_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN group_invitations.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN group_invitations.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE session (id UUID NOT NULL, user_id_id UUID DEFAULT NULL, ip_address VARCHAR(255) NOT NULL, user_agent VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, last_logout TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D044D5D49D86650F ON session (user_id_id)');
        $this->addSql('COMMENT ON COLUMN session.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN session.user_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN session.last_login IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN session.last_logout IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE status (id UUID NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN status.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN status.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN status.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE tags (id UUID NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, urgency_level INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN tags.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN tags.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN tags.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE users_group (id UUID NOT NULL, group_id_id UUID NOT NULL, user_id_id UUID NOT NULL, role_id_id UUID DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8AB7E08C2F68B530 ON users_group (group_id_id)');
        $this->addSql('CREATE INDEX IDX_8AB7E08C9D86650F ON users_group (user_id_id)');
        $this->addSql('CREATE INDEX IDX_8AB7E08C88987678 ON users_group (role_id_id)');
        $this->addSql('COMMENT ON COLUMN users_group.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN users_group.group_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN users_group.user_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN users_group.role_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE users_group_role (id UUID NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, level VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN users_group_role.id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE attachment ADD CONSTRAINT FK_795FD9BB86737CA5 FOREIGN KEY (user_group_id_id) REFERENCES users_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE attachment ADD CONSTRAINT FK_795FD9BB881ECFA7 FOREIGN KEY (status_id_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7669CCBE9A FOREIGN KEY (author_id_id) REFERENCES users_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A762DC63656 FOREIGN KEY (reviewer_id_id) REFERENCES users_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A761420680F FOREIGN KEY (tags_id_id) REFERENCES tags (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76881ECFA7 FOREIGN KEY (status_id_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_invitations ADD CONSTRAINT FK_69F0F6F881ECFA7 FOREIGN KEY (status_id_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_invitations ADD CONSTRAINT FK_69F0F6F2F68B530 FOREIGN KEY (group_id_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D49D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_group ADD CONSTRAINT FK_8AB7E08C2F68B530 FOREIGN KEY (group_id_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_group ADD CONSTRAINT FK_8AB7E08C9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_group ADD CONSTRAINT FK_8AB7E08C88987678 FOREIGN KEY (role_id_id) REFERENCES users_group_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD is_email_verified BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('COMMENT ON COLUMN "user".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "user".updated_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE attachment DROP CONSTRAINT FK_795FD9BB86737CA5');
        $this->addSql('ALTER TABLE attachment DROP CONSTRAINT FK_795FD9BB881ECFA7');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A7669CCBE9A');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A762DC63656');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A761420680F');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A76881ECFA7');
        $this->addSql('ALTER TABLE group_invitations DROP CONSTRAINT FK_69F0F6F881ECFA7');
        $this->addSql('ALTER TABLE group_invitations DROP CONSTRAINT FK_69F0F6F2F68B530');
        $this->addSql('ALTER TABLE session DROP CONSTRAINT FK_D044D5D49D86650F');
        $this->addSql('ALTER TABLE users_group DROP CONSTRAINT FK_8AB7E08C2F68B530');
        $this->addSql('ALTER TABLE users_group DROP CONSTRAINT FK_8AB7E08C9D86650F');
        $this->addSql('ALTER TABLE users_group DROP CONSTRAINT FK_8AB7E08C88987678');
        $this->addSql('DROP TABLE attachment');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE "group"');
        $this->addSql('DROP TABLE group_invitations');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE users_group');
        $this->addSql('DROP TABLE users_group_role');
        $this->addSql('ALTER TABLE "user" DROP email');
        $this->addSql('ALTER TABLE "user" DROP is_email_verified');
        $this->addSql('ALTER TABLE "user" DROP created_at');
        $this->addSql('ALTER TABLE "user" DROP updated_at');
    }
}
