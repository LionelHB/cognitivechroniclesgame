<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230804190237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anthology (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, nft_id INT DEFAULT NULL, note LONGTEXT NOT NULL, creation_date DATETIME NOT NULL, INDEX IDX_9474526CE813668D (nft_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, owner_user_id INT NOT NULL, name VARCHAR(255) NOT NULL, is_public TINYINT(1) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_472B783A2B18554A (owner_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nft (id INT AUTO_INCREMENT NOT NULL, sub_category_id INT NOT NULL, anthology_id INT DEFAULT NULL, owner_user_id INT NOT NULL, name VARCHAR(255) NOT NULL, owner VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, date_first_sale DATETIME NOT NULL, date_last_sale DATETIME NOT NULL, identification_key VARCHAR(255) NOT NULL, nft_path VARCHAR(255) NOT NULL, price_eth DOUBLE PRECISION NOT NULL, price_eur DOUBLE PRECISION NOT NULL, price_usd DOUBLE PRECISION NOT NULL, is_public TINYINT(1) NOT NULL, quantity INT DEFAULT NULL, view INT NOT NULL, add_like INT NOT NULL, add_favory INT NOT NULL, INDEX IDX_D9C7463CF7BFE87C (sub_category_id), INDEX IDX_D9C7463CCAC32C08 (anthology_id), INDEX IDX_D9C7463C2B18554A (owner_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_category (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_BCE3F79812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, nick_name VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, is_man TINYINT(1) DEFAULT NULL, date_birth DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CE813668D FOREIGN KEY (nft_id) REFERENCES nft (id)');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A2B18554A FOREIGN KEY (owner_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463CF7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463CCAC32C08 FOREIGN KEY (anthology_id) REFERENCES anthology (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C2B18554A FOREIGN KEY (owner_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE sub_category ADD CONSTRAINT FK_BCE3F79812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CE813668D');
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783A2B18554A');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463CF7BFE87C');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463CCAC32C08');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C2B18554A');
        $this->addSql('ALTER TABLE sub_category DROP FOREIGN KEY FK_BCE3F79812469DE2');
        $this->addSql('DROP TABLE anthology');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE nft');
        $this->addSql('DROP TABLE sub_category');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
