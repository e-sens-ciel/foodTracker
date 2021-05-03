<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210503114558 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE entry_id entry_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FB5EFDF1 FOREIGN KEY (entry_id_id) REFERENCES entry (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649FB5EFDF1 ON user (entry_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FB5EFDF1');
        $this->addSql('DROP INDEX IDX_8D93D649FB5EFDF1 ON user');
        $this->addSql('ALTER TABLE user CHANGE entry_id_id entry_id INT DEFAULT NULL');
    }
}
