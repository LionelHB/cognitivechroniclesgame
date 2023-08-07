<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230807072659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463CFE2541D7');
        $this->addSql('CREATE TABLE anthology (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, nft_id INT DEFAULT NULL, note LONGTEXT NOT NULL, creation_date DATETIME NOT NULL, INDEX IDX_9474526CE813668D (nft_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CE813668D FOREIGN KEY (nft_id) REFERENCES nft (id)');
        $this->addSql('DROP TABLE adress');
        $this->addSql('DROP TABLE library');
        $this->addSql('ALTER TABLE category ADD description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE gallery ADD owner_user_id INT NOT NULL, ADD description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A2B18554A FOREIGN KEY (owner_user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_472B783A2B18554A ON gallery (owner_user_id)');
        $this->addSql('DROP INDEX IDX_D9C7463CFE2541D7 ON nft');
        $this->addSql('ALTER TABLE nft ADD owner_user_id INT NOT NULL, ADD date_last_sale DATETIME NOT NULL, ADD identification_key VARCHAR(255) NOT NULL, ADD nft_path VARCHAR(255) NOT NULL, ADD price_eur DOUBLE PRECISION NOT NULL, ADD price_usd DOUBLE PRECISION NOT NULL, ADD view INT NOT NULL, ADD add_like INT NOT NULL, ADD add_favory INT NOT NULL, ADD description VARCHAR(255) NOT NULL, DROP owner, DROP indentification_key, DROP image_nft_way, CHANGE sub_category_id sub_category_id INT NOT NULL, CHANGE quantity quantity INT DEFAULT NULL, CHANGE library_id anthology_id INT DEFAULT NULL, CHANGE creation_date date_creation DATETIME NOT NULL, CHANGE price price_eth DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463CCAC32C08 FOREIGN KEY (anthology_id) REFERENCES anthology (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C2B18554A FOREIGN KEY (owner_user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_D9C7463CCAC32C08 ON nft (anthology_id)');
        $this->addSql('CREATE INDEX IDX_D9C7463C2B18554A ON nft (owner_user_id)');
        $this->addSql('ALTER TABLE sub_category ADD description LONGTEXT DEFAULT NULL, CHANGE category_id category_id INT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL, ADD nick_name VARCHAR(255) NOT NULL, ADD is_man TINYINT(1) DEFAULT NULL, DROP roles, DROP first_name, DROP pseudo, CHANGE email email VARCHAR(255) NOT NULL, CHANGE birthday_date date_birth DATETIME NOT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL, CHANGE available_at available_at DATETIME NOT NULL, CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463CCAC32C08');
        $this->addSql('CREATE TABLE adress (id INT AUTO_INCREMENT NOT NULL, line1 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, line2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, line3 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, postal_code VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, city VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, department VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, region VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, country VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE library (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CE813668D');
        $this->addSql('DROP TABLE anthology');
        $this->addSql('DROP TABLE comment');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE available_at available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783A2B18554A');
        $this->addSql('DROP INDEX IDX_472B783A2B18554A ON gallery');
        $this->addSql('ALTER TABLE gallery DROP owner_user_id, DROP description');
        $this->addSql('ALTER TABLE category DROP description');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C2B18554A');
        $this->addSql('DROP INDEX IDX_D9C7463CCAC32C08 ON nft');
        $this->addSql('DROP INDEX IDX_D9C7463C2B18554A ON nft');
        $this->addSql('ALTER TABLE nft ADD owner VARCHAR(255) NOT NULL, ADD creation_date DATETIME NOT NULL, ADD indentification_key VARCHAR(255) NOT NULL, ADD image_nft_way VARCHAR(255) NOT NULL, ADD price DOUBLE PRECISION NOT NULL, DROP owner_user_id, DROP date_creation, DROP date_last_sale, DROP identification_key, DROP nft_path, DROP price_eth, DROP price_eur, DROP price_usd, DROP view, DROP add_like, DROP add_favory, DROP description, CHANGE sub_category_id sub_category_id INT DEFAULT NULL, CHANGE quantity quantity INT NOT NULL, CHANGE anthology_id library_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463CFE2541D7 FOREIGN KEY (library_id) REFERENCES library (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D9C7463CFE2541D7 ON nft (library_id)');
        $this->addSql('ALTER TABLE sub_category DROP description, CHANGE category_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `user` ADD roles JSON NOT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD pseudo VARCHAR(255) NOT NULL, DROP name, DROP nick_name, DROP is_man, CHANGE email email VARCHAR(180) NOT NULL, CHANGE date_birth birthday_date DATETIME NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON `user` (email)');
    }
}
