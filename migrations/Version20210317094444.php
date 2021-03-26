<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210317094444 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD prixunitaire INT NOT NULL, ADD quantitedisponibl INT NOT NULL, ADD codbar INT NOT NULL, DROP prix_unitaire, DROP quantite_disponibl, DROP cod_bar, CHANGE date_validite datevalidite DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP photoprofile');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD prix_unitaire INT NOT NULL, ADD quantite_disponibl INT NOT NULL, ADD cod_bar INT NOT NULL, DROP prixunitaire, DROP quantitedisponibl, DROP codbar, CHANGE datevalidite date_validite DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD photoprofile VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
