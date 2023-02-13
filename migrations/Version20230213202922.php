<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230213202922 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, note INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF336278D5A8');
        $this->addSql('DROP TABLE pac');
        $this->addSql('DROP TABLE student');
        $this->addSql('ALTER TABLE classroom CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE club CHANGE name name VARCHAR(255) NOT NULL, CHANGE creation_date creation_date DATE NOT NULL');
        $this->addSql('ALTER TABLE test ADD date VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE birthday birthday DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pac (ref INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nb_employee INT DEFAULT NULL, PRIMARY KEY(ref)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE student (nsc INT AUTO_INCREMENT NOT NULL, classroom_id INT DEFAULT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, user_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B723AF336278D5A8 (classroom_id), PRIMARY KEY(nsc)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF336278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id)');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('ALTER TABLE classroom CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE club CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE creation_date creation_date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE test DROP date, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE birthday birthday DATE DEFAULT NULL');
    }
}
