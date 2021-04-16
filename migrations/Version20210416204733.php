<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416204733 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_food (id INT AUTO_INCREMENT NOT NULL, idaliment_id INT DEFAULT NULL, INDEX IDX_AEB9653E8CF2822B (idaliment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_food_user (user_food_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_3854F37CE28399CE (user_food_id), INDEX IDX_3854F37CA76ED395 (user_id), PRIMARY KEY(user_food_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_food ADD CONSTRAINT FK_AEB9653E8CF2822B FOREIGN KEY (idaliment_id) REFERENCES food (id)');
        $this->addSql('ALTER TABLE user_food_user ADD CONSTRAINT FK_3854F37CE28399CE FOREIGN KEY (user_food_id) REFERENCES user_food (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_food_user ADD CONSTRAINT FK_3854F37CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_food_user DROP FOREIGN KEY FK_3854F37CE28399CE');
        $this->addSql('DROP TABLE user_food');
        $this->addSql('DROP TABLE user_food_user');
    }
}
