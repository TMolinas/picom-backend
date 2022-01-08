<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211229065653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE advertising (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, discr VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_50219E789395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE advertising_time_slot (advertising_id INT NOT NULL, time_slot_id INT NOT NULL, INDEX IDX_BDEF5FE89F084B42 (advertising_id), INDEX IDX_BDEF5FE8D62B0FA (time_slot_id), PRIMARY KEY(advertising_id, time_slot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE area (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bank_card (id INT AUTO_INCREMENT NOT NULL, credit_card_number VARCHAR(16) NOT NULL, expiration_month INT NOT NULL, expiration_year INT NOT NULL, cvc VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bank_card_customer (bank_card_id INT NOT NULL, customer_id INT NOT NULL, INDEX IDX_B2AD11816458F28E (bank_card_id), INDEX IDX_B2AD11819395C3F3 (customer_id), PRIMARY KEY(bank_card_id, customer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bus_stop (id INT AUTO_INCREMENT NOT NULL, area_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, ip_adress VARCHAR(255) DEFAULT NULL, INDEX IDX_E65B69FCBD0F409C (area_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, card_number VARCHAR(255) NOT NULL, year_expiration INT NOT NULL, month_expiration INT NOT NULL, cryptogram VARCHAR(255) NOT NULL, INDEX IDX_161498D39395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE login_form (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_slot (id INT AUTO_INCREMENT NOT NULL, begin_hour TIME NOT NULL, price DOUBLE PRECISION NOT NULL, price_coefficient DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, phone VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE advertising ADD CONSTRAINT FK_50219E789395C3F3 FOREIGN KEY (customer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE advertising_time_slot ADD CONSTRAINT FK_BDEF5FE89F084B42 FOREIGN KEY (advertising_id) REFERENCES advertising (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advertising_time_slot ADD CONSTRAINT FK_BDEF5FE8D62B0FA FOREIGN KEY (time_slot_id) REFERENCES time_slot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bank_card_customer ADD CONSTRAINT FK_B2AD11816458F28E FOREIGN KEY (bank_card_id) REFERENCES bank_card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bank_card_customer ADD CONSTRAINT FK_B2AD11819395C3F3 FOREIGN KEY (customer_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bus_stop ADD CONSTRAINT FK_E65B69FCBD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D39395C3F3 FOREIGN KEY (customer_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advertising_time_slot DROP FOREIGN KEY FK_BDEF5FE89F084B42');
        $this->addSql('ALTER TABLE bus_stop DROP FOREIGN KEY FK_E65B69FCBD0F409C');
        $this->addSql('ALTER TABLE bank_card_customer DROP FOREIGN KEY FK_B2AD11816458F28E');
        $this->addSql('ALTER TABLE advertising_time_slot DROP FOREIGN KEY FK_BDEF5FE8D62B0FA');
        $this->addSql('ALTER TABLE advertising DROP FOREIGN KEY FK_50219E789395C3F3');
        $this->addSql('ALTER TABLE bank_card_customer DROP FOREIGN KEY FK_B2AD11819395C3F3');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D39395C3F3');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE advertising');
        $this->addSql('DROP TABLE advertising_time_slot');
        $this->addSql('DROP TABLE area');
        $this->addSql('DROP TABLE bank_card');
        $this->addSql('DROP TABLE bank_card_customer');
        $this->addSql('DROP TABLE bus_stop');
        $this->addSql('DROP TABLE card');
        $this->addSql('DROP TABLE login_form');
        $this->addSql('DROP TABLE time_slot');
        $this->addSql('DROP TABLE user');
    }
}
