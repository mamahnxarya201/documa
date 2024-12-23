<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241223113754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE application_logs (id UUID NOT NULL, user_id UUID DEFAULT NULL, user_type VARCHAR(255) NOT NULL, event_type VARCHAR(255) NOT NULL, target VARCHAR(255) NOT NULL, target_type VARCHAR(255) NOT NULL, metadata JSON NOT NULL, performed_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_763AED4A76ED395 ON application_logs (user_id)');
        $this->addSql('COMMENT ON COLUMN application_logs.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN application_logs.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN application_logs.performed_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE attachment (id UUID NOT NULL, user_group_id UUID NOT NULL, status_id UUID DEFAULT NULL, filename VARCHAR(255) NOT NULL, filetype VARCHAR(255) NOT NULL, size VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, hash VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_795FD9BB1ED93D47 ON attachment (user_group_id)');
        $this->addSql('CREATE INDEX IDX_795FD9BB6BF700BD ON attachment (status_id)');
        $this->addSql('COMMENT ON COLUMN attachment.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN attachment.user_group_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN attachment.status_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN attachment.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN attachment.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE comment (id UUID NOT NULL, user_id UUID NOT NULL, document_id UUID NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('CREATE INDEX IDX_9474526CC33F7837 ON comment (document_id)');
        $this->addSql('COMMENT ON COLUMN comment.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN comment.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN comment.document_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN comment.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN comment.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE document (id UUID NOT NULL, author_id UUID NOT NULL, reviewer_id UUID NOT NULL, tags_id UUID DEFAULT NULL, status_id UUID NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D8698A76F675F31B ON document (author_id)');
        $this->addSql('CREATE INDEX IDX_D8698A7670574616 ON document (reviewer_id)');
        $this->addSql('CREATE INDEX IDX_D8698A768D7B4FB4 ON document (tags_id)');
        $this->addSql('CREATE INDEX IDX_D8698A766BF700BD ON document (status_id)');
        $this->addSql('COMMENT ON COLUMN document.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document.author_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document.reviewer_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document.tags_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document.status_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN document.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN document.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "group" (id UUID NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, level INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "group".id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "group".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "group".updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE group_invitations (id UUID NOT NULL, status_id UUID NOT NULL, group_id UUID NOT NULL, email VARCHAR(255) NOT NULL, role INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_69F0F6F6BF700BD ON group_invitations (status_id)');
        $this->addSql('CREATE INDEX IDX_69F0F6FFE54D947 ON group_invitations (group_id)');
        $this->addSql('COMMENT ON COLUMN group_invitations.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN group_invitations.status_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN group_invitations.group_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN group_invitations.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN group_invitations.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE session (id UUID NOT NULL, user_id UUID DEFAULT NULL, ip_address VARCHAR(255) NOT NULL, user_agent VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, last_logout TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D044D5D4A76ED395 ON session (user_id)');
        $this->addSql('COMMENT ON COLUMN session.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN session.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN session.last_login IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN session.last_logout IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE status (id UUID NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN status.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN status.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN status.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE system_logs (id UUID NOT NULL, event_type VARCHAR(255) NOT NULL, event_details JSON NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN system_logs.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN system_logs.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE tags (id UUID NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, urgency_level INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN tags.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN tags.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN tags.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "user" (id UUID NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, totp_secret VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, is_email_verified BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON "user" (username)');
        $this->addSql('COMMENT ON COLUMN "user".id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "user".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "user".updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE users_group (id UUID NOT NULL, group_id UUID NOT NULL, user_id UUID NOT NULL, role_id UUID DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8AB7E08CFE54D947 ON users_group (group_id)');
        $this->addSql('CREATE INDEX IDX_8AB7E08CA76ED395 ON users_group (user_id)');
        $this->addSql('CREATE INDEX IDX_8AB7E08CD60322AC ON users_group (role_id)');
        $this->addSql('COMMENT ON COLUMN users_group.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN users_group.group_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN users_group.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN users_group.role_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE users_group_role (id UUID NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, level VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN users_group_role.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE application_logs ADD CONSTRAINT FK_763AED4A76ED395 FOREIGN KEY (user_id) REFERENCES users_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE attachment ADD CONSTRAINT FK_795FD9BB1ED93D47 FOREIGN KEY (user_group_id) REFERENCES users_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE attachment ADD CONSTRAINT FK_795FD9BB6BF700BD FOREIGN KEY (status_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES users_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76F675F31B FOREIGN KEY (author_id) REFERENCES users_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7670574616 FOREIGN KEY (reviewer_id) REFERENCES users_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A768D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A766BF700BD FOREIGN KEY (status_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_invitations ADD CONSTRAINT FK_69F0F6F6BF700BD FOREIGN KEY (status_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_invitations ADD CONSTRAINT FK_69F0F6FFE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_group ADD CONSTRAINT FK_8AB7E08CFE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_group ADD CONSTRAINT FK_8AB7E08CA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_group ADD CONSTRAINT FK_8AB7E08CD60322AC FOREIGN KEY (role_id) REFERENCES users_group_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE application_logs DROP CONSTRAINT FK_763AED4A76ED395');
        $this->addSql('ALTER TABLE attachment DROP CONSTRAINT FK_795FD9BB1ED93D47');
        $this->addSql('ALTER TABLE attachment DROP CONSTRAINT FK_795FD9BB6BF700BD');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CC33F7837');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A76F675F31B');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A7670574616');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A768D7B4FB4');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A766BF700BD');
        $this->addSql('ALTER TABLE group_invitations DROP CONSTRAINT FK_69F0F6F6BF700BD');
        $this->addSql('ALTER TABLE group_invitations DROP CONSTRAINT FK_69F0F6FFE54D947');
        $this->addSql('ALTER TABLE session DROP CONSTRAINT FK_D044D5D4A76ED395');
        $this->addSql('ALTER TABLE users_group DROP CONSTRAINT FK_8AB7E08CFE54D947');
        $this->addSql('ALTER TABLE users_group DROP CONSTRAINT FK_8AB7E08CA76ED395');
        $this->addSql('ALTER TABLE users_group DROP CONSTRAINT FK_8AB7E08CD60322AC');
        $this->addSql('DROP TABLE application_logs');
        $this->addSql('DROP TABLE attachment');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE "group"');
        $this->addSql('DROP TABLE group_invitations');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE system_logs');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE users_group');
        $this->addSql('DROP TABLE users_group_role');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
