<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240119145114 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, brand_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, client_firstname VARCHAR(255) NOT NULL, client_lastname VARCHAR(255) NOT NULL, client_phone VARCHAR(255) NOT NULL, client_email VARCHAR(255) NOT NULL, client_address VARCHAR(255) NOT NULL, client_city VARCHAR(255) NOT NULL, client_zipcode VARCHAR(255) NOT NULL, client_country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, customer_firstname VARCHAR(50) NOT NULL, customer_lastname VARCHAR(50) NOT NULL, customer_phone VARCHAR(50) NOT NULL, customer_email VARCHAR(255) NOT NULL, customer_address VARCHAR(255) NOT NULL, customer_city VARCHAR(50) NOT NULL, customer_zipcode VARCHAR(50) NOT NULL, customer_country VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, order_client_id INT NOT NULL, order_date DATETIME NOT NULL, order_price DOUBLE PRECISION NOT NULL, order_delivery_date DATETIME DEFAULT NULL, order_status VARCHAR(255) NOT NULL, order_comment VARCHAR(255) DEFAULT NULL, INDEX IDX_F5299398A56C12D9 (order_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_item (id INT AUTO_INCREMENT NOT NULL, item_order_id INT NOT NULL, item_product_id INT NOT NULL, item_quantity INT NOT NULL, item_unit_price DOUBLE PRECISION NOT NULL, INDEX IDX_52EA1F09E192A5F3 (item_order_id), INDEX IDX_52EA1F09F8354E50 (item_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, product_brand VARCHAR(255) NOT NULL, product_model VARCHAR(255) NOT NULL, product_description LONGTEXT NOT NULL, product_movment VARCHAR(255) NOT NULL, product_gender VARCHAR(255) NOT NULL, product_extra JSON DEFAULT NULL, product_price NUMERIC(8, 2) NOT NULL, product_stock SMALLINT NOT NULL, product_image_url VARCHAR(255),INDEX IDX_D34A04AD44F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A56C12D9 FOREIGN KEY (order_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09E192A5F3 FOREIGN KEY (item_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09F8354E50 FOREIGN KEY (item_product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A56C12D9');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09E192A5F3');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09F8354E50');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD44F5D008');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_item');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE `user`');
    }
}
