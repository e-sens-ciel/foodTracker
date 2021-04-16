<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416210953 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entry_food (id INT AUTO_INCREMENT NOT NULL, identry_id INT DEFAULT NULL, idfood_id INT DEFAULT NULL, quantity DOUBLE PRECISION NOT NULL, INDEX IDX_701A51E410E3014F (identry_id), INDEX IDX_701A51E4658AD5AA (idfood_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entry_food ADD CONSTRAINT FK_701A51E410E3014F FOREIGN KEY (identry_id) REFERENCES entry (id)');
        $this->addSql('ALTER TABLE entry_food ADD CONSTRAINT FK_701A51E4658AD5AA FOREIGN KEY (idfood_id) REFERENCES food (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE entry_food');
    }
}
