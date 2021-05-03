<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210503113900 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BA364942');
        $this->addSql('DROP INDEX IDX_8D93D649BA364942 ON user');
        $this->addSql('ALTER TABLE user ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', CHANGE entry_id entry_id INT DEFAULT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE height height DOUBLE PRECISION DEFAULT NULL, CHANGE weight weight DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user DROP roles, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE height height DOUBLE PRECISION NOT NULL, CHANGE weight weight DOUBLE PRECISION NOT NULL, CHANGE entry_id entry_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BA364942 FOREIGN KEY (entry_id) REFERENCES entry (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649BA364942 ON user (entry_id)');
    }
}
