<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200424093121 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bill (id INT AUTO_INCREMENT NOT NULL, work_type_id INT NOT NULL, company_id INT NOT NULL, status_id INT NOT NULL, bill_number VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, price_euro INT DEFAULT NULL, price_cent INT DEFAULT NULL, start_date DATETIME DEFAULT NULL, end_date DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, enabled TINYINT(1) NOT NULL, INDEX IDX_7A2119E3108734B1 (work_type_id), INDEX IDX_7A2119E3979B1AD6 (company_id), INDEX IDX_7A2119E36BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) NOT NULL, point_of_contact VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_type (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, budget_euro INT NOT NULL, budget_cent INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_type_company (work_type_id INT NOT NULL, company_id INT NOT NULL, INDEX IDX_65EC3450108734B1 (work_type_id), INDEX IDX_65EC3450979B1AD6 (company_id), PRIMARY KEY(work_type_id, company_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E3108734B1 FOREIGN KEY (work_type_id) REFERENCES work_type (id)');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E3979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E36BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE work_type_company ADD CONSTRAINT FK_65EC3450108734B1 FOREIGN KEY (work_type_id) REFERENCES work_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE work_type_company ADD CONSTRAINT FK_65EC3450979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E3979B1AD6');
        $this->addSql('ALTER TABLE work_type_company DROP FOREIGN KEY FK_65EC3450979B1AD6');
        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E36BF700BD');
        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E3108734B1');
        $this->addSql('ALTER TABLE work_type_company DROP FOREIGN KEY FK_65EC3450108734B1');
        $this->addSql('DROP TABLE bill');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE work_type');
        $this->addSql('DROP TABLE work_type_company');
    }
}
