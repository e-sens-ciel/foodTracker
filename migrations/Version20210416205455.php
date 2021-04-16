<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416205455 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_food_user');
        $this->addSql('ALTER TABLE user_food DROP FOREIGN KEY FK_AEB9653E8CF2822B');
        $this->addSql('DROP INDEX IDX_AEB9653E8CF2822B ON user_food');
        $this->addSql('ALTER TABLE user_food ADD idfood_id INT DEFAULT NULL, CHANGE idaliment_id iduser_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_food ADD CONSTRAINT FK_AEB9653E786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_food ADD CONSTRAINT FK_AEB9653E658AD5AA FOREIGN KEY (idfood_id) REFERENCES food (id)');
        $this->addSql('CREATE INDEX IDX_AEB9653E786A81FB ON user_food (iduser_id)');
        $this->addSql('CREATE INDEX IDX_AEB9653E658AD5AA ON user_food (idfood_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_food_user (user_food_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_3854F37CA76ED395 (user_id), INDEX IDX_3854F37CE28399CE (user_food_id), PRIMARY KEY(user_food_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_food_user ADD CONSTRAINT FK_3854F37CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_food_user ADD CONSTRAINT FK_3854F37CE28399CE FOREIGN KEY (user_food_id) REFERENCES user_food (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_food DROP FOREIGN KEY FK_AEB9653E786A81FB');
        $this->addSql('ALTER TABLE user_food DROP FOREIGN KEY FK_AEB9653E658AD5AA');
        $this->addSql('DROP INDEX IDX_AEB9653E786A81FB ON user_food');
        $this->addSql('DROP INDEX IDX_AEB9653E658AD5AA ON user_food');
        $this->addSql('ALTER TABLE user_food ADD idaliment_id INT DEFAULT NULL, DROP iduser_id, DROP idfood_id');
        $this->addSql('ALTER TABLE user_food ADD CONSTRAINT FK_AEB9653E8CF2822B FOREIGN KEY (idaliment_id) REFERENCES food (id)');
        $this->addSql('CREATE INDEX IDX_AEB9653E8CF2822B ON user_food (idaliment_id)');
    }
}
