<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230820181951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE caracteristique (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caracteristique_perso (id INT AUTO_INCREMENT NOT NULL, caracteristique_id INT NOT NULL, perso_id INT NOT NULL, value INT NOT NULL, INDEX IDX_A3E653BF1704EEB7 (caracteristique_id), INDEX IDX_A3E653BF1221E019 (perso_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence_influe_caracteristique (id INT AUTO_INCREMENT NOT NULL, caracteristique_id INT NOT NULL, competence_id INT NOT NULL, bonus_value INT NOT NULL, INDEX IDX_478A555C1704EEB7 (caracteristique_id), INDEX IDX_478A555C15761DAB (competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence_perso (id INT AUTO_INCREMENT NOT NULL, competence_id INT NOT NULL, perso_id INT NOT NULL, value INT NOT NULL, INDEX IDX_3740ABC715761DAB (competence_id), INDEX IDX_3740ABC71221E019 (perso_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, perso_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, value INT DEFAULT NULL, INDEX IDX_1F1B251E1221E019 (perso_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE perso (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, espece VARCHAR(255) DEFAULT NULL, origine VARCHAR(255) DEFAULT NULL, age VARCHAR(255) NOT NULL, sante INT NOT NULL, sante_max INT NOT NULL, taille VARCHAR(255) DEFAULT NULL, poids VARCHAR(255) DEFAULT NULL, sexe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, points_carac_persos INT NOT NULL, points_comp_persos INT NOT NULL, statut TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_competence (session_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_74426324613FECDF (session_id), INDEX IDX_7442632415761DAB (competence_id), PRIMARY KEY(session_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_caracteristique (session_id INT NOT NULL, caracteristique_id INT NOT NULL, INDEX IDX_EE6DF0FE613FECDF (session_id), INDEX IDX_EE6DF0FE1704EEB7 (caracteristique_id), PRIMARY KEY(session_id, caracteristique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_perso (session_id INT NOT NULL, perso_id INT NOT NULL, INDEX IDX_661F42F7613FECDF (session_id), INDEX IDX_661F42F71221E019 (perso_id), PRIMARY KEY(session_id, perso_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE caracteristique_perso ADD CONSTRAINT FK_A3E653BF1704EEB7 FOREIGN KEY (caracteristique_id) REFERENCES caracteristique (id)');
        $this->addSql('ALTER TABLE caracteristique_perso ADD CONSTRAINT FK_A3E653BF1221E019 FOREIGN KEY (perso_id) REFERENCES perso (id)');
        $this->addSql('ALTER TABLE competence_influe_caracteristique ADD CONSTRAINT FK_478A555C1704EEB7 FOREIGN KEY (caracteristique_id) REFERENCES caracteristique (id)');
        $this->addSql('ALTER TABLE competence_influe_caracteristique ADD CONSTRAINT FK_478A555C15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE competence_perso ADD CONSTRAINT FK_3740ABC715761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE competence_perso ADD CONSTRAINT FK_3740ABC71221E019 FOREIGN KEY (perso_id) REFERENCES perso (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E1221E019 FOREIGN KEY (perso_id) REFERENCES perso (id)');
        $this->addSql('ALTER TABLE session_competence ADD CONSTRAINT FK_74426324613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_competence ADD CONSTRAINT FK_7442632415761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_caracteristique ADD CONSTRAINT FK_EE6DF0FE613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_caracteristique ADD CONSTRAINT FK_EE6DF0FE1704EEB7 FOREIGN KEY (caracteristique_id) REFERENCES caracteristique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_perso ADD CONSTRAINT FK_661F42F7613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_perso ADD CONSTRAINT FK_661F42F71221E019 FOREIGN KEY (perso_id) REFERENCES perso (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caracteristique_perso DROP FOREIGN KEY FK_A3E653BF1704EEB7');
        $this->addSql('ALTER TABLE caracteristique_perso DROP FOREIGN KEY FK_A3E653BF1221E019');
        $this->addSql('ALTER TABLE competence_influe_caracteristique DROP FOREIGN KEY FK_478A555C1704EEB7');
        $this->addSql('ALTER TABLE competence_influe_caracteristique DROP FOREIGN KEY FK_478A555C15761DAB');
        $this->addSql('ALTER TABLE competence_perso DROP FOREIGN KEY FK_3740ABC715761DAB');
        $this->addSql('ALTER TABLE competence_perso DROP FOREIGN KEY FK_3740ABC71221E019');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E1221E019');
        $this->addSql('ALTER TABLE session_competence DROP FOREIGN KEY FK_74426324613FECDF');
        $this->addSql('ALTER TABLE session_competence DROP FOREIGN KEY FK_7442632415761DAB');
        $this->addSql('ALTER TABLE session_caracteristique DROP FOREIGN KEY FK_EE6DF0FE613FECDF');
        $this->addSql('ALTER TABLE session_caracteristique DROP FOREIGN KEY FK_EE6DF0FE1704EEB7');
        $this->addSql('ALTER TABLE session_perso DROP FOREIGN KEY FK_661F42F7613FECDF');
        $this->addSql('ALTER TABLE session_perso DROP FOREIGN KEY FK_661F42F71221E019');
        $this->addSql('DROP TABLE caracteristique');
        $this->addSql('DROP TABLE caracteristique_perso');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE competence_influe_caracteristique');
        $this->addSql('DROP TABLE competence_perso');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE perso');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE session_competence');
        $this->addSql('DROP TABLE session_caracteristique');
        $this->addSql('DROP TABLE session_perso');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
