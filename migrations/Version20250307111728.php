<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250307111728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__employe AS SELECT id, prenom, nom, telephone, email, adresse, poste, salaire, dt_naissance, is_active FROM employe');
        $this->addSql('DROP TABLE employe');
        $this->addSql('CREATE TABLE employe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, service_id INTEGER DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, poste VARCHAR(255) NOT NULL, salaire VARCHAR(255) NOT NULL, dt_naissance DATE NOT NULL, is_active BOOLEAN NOT NULL, CONSTRAINT FK_F804D3B9ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO employe (id, prenom, nom, telephone, email, adresse, poste, salaire, dt_naissance, is_active) SELECT id, prenom, nom, telephone, email, adresse, poste, salaire, dt_naissance, is_active FROM __temp__employe');
        $this->addSql('DROP TABLE __temp__employe');
        $this->addSql('CREATE INDEX IDX_F804D3B9ED5CA9E6 ON employe (service_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__employe AS SELECT id, prenom, nom, telephone, email, adresse, poste, salaire, dt_naissance, is_active FROM employe');
        $this->addSql('DROP TABLE employe');
        $this->addSql('CREATE TABLE employe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, poste VARCHAR(255) NOT NULL, salaire VARCHAR(5) NOT NULL, dt_naissance DATE NOT NULL, is_active BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO employe (id, prenom, nom, telephone, email, adresse, poste, salaire, dt_naissance, is_active) SELECT id, prenom, nom, telephone, email, adresse, poste, salaire, dt_naissance, is_active FROM __temp__employe');
        $this->addSql('DROP TABLE __temp__employe');
    }
}
