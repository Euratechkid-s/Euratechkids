<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200221231122 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE create_atelier (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, date DATE NOT NULL, titre TINYTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE create_atelier_enfants (create_atelier_id INT NOT NULL, enfants_id INT NOT NULL, INDEX IDX_6259597491AF7DD1 (create_atelier_id), INDEX IDX_62595974A586286C (enfants_id), PRIMARY KEY(create_atelier_id, enfants_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enfants (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, accompagnants TINYINT(1) NOT NULL, idatelier INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_letters (id INT AUTO_INCREMENT NOT NULL, email2 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, nom_atelier_id INT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, telephone INT NOT NULL, adresse1 VARCHAR(255) NOT NULL, adresse2 VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) NOT NULL, cp INT NOT NULL, pays VARCHAR(255) NOT NULL, enfants INT NOT NULL, kidname VARCHAR(255) DEFAULT NULL, accompagnants TINYINT(1) DEFAULT NULL, INDEX IDX_42C8495583AD4F42 (nom_atelier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_atelier (id INT AUTO_INCREMENT NOT NULL, prenom_du_responsable VARCHAR(255) NOT NULL, nom_du_responsable VARCHAR(255) NOT NULL, email_du_responsable VARCHAR(255) NOT NULL, tel_du_responsable VARCHAR(255) NOT NULL, nombre_de_participants VARCHAR(255) NOT NULL, prenom_du_participant VARCHAR(255) NOT NULL, nom_du_participant VARCHAR(255) NOT NULL, age_du_participant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school (id INT AUTO_INCREMENT NOT NULL, nomref VARCHAR(255) NOT NULL, prenomref VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, schoolname VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, nbrestudent VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, classe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE create_atelier_enfants ADD CONSTRAINT FK_6259597491AF7DD1 FOREIGN KEY (create_atelier_id) REFERENCES create_atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE create_atelier_enfants ADD CONSTRAINT FK_62595974A586286C FOREIGN KEY (enfants_id) REFERENCES enfants (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495583AD4F42 FOREIGN KEY (nom_atelier_id) REFERENCES create_atelier (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE create_atelier_enfants DROP FOREIGN KEY FK_6259597491AF7DD1');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495583AD4F42');
        $this->addSql('ALTER TABLE create_atelier_enfants DROP FOREIGN KEY FK_62595974A586286C');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE create_atelier');
        $this->addSql('DROP TABLE create_atelier_enfants');
        $this->addSql('DROP TABLE enfants');
        $this->addSql('DROP TABLE news_letters');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_atelier');
        $this->addSql('DROP TABLE school');
        $this->addSql('DROP TABLE user');
    }
}
