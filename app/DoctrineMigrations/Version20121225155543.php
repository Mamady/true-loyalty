<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20121225155543 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE fos_user ADD title VARCHAR(8) NOT NULL, ADD first_name VARCHAR(100) NOT NULL, ADD last_name VARCHAR(100) NOT NULL, ADD website VARCHAR(200) NOT NULL, ADD company VARCHAR(200) NOT NULL, ADD address1 VARCHAR(100) DEFAULT NULL, ADD address2 VARCHAR(100) DEFAULT NULL, ADD city VARCHAR(8) DEFAULT NULL, ADD postcode VARCHAR(8) DEFAULT NULL, ADD country VARCHAR(30) NOT NULL, ADD phone VARCHAR(30) DEFAULT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD verified TINYINT(1) NOT NULL, ADD code VARCHAR(100) DEFAULT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE fos_user DROP title, DROP first_name, DROP last_name, DROP website, DROP company, DROP address1, DROP address2, DROP city, DROP postcode, DROP country, DROP phone, DROP created_at, DROP updated_at, DROP verified, DROP code");
    }
}