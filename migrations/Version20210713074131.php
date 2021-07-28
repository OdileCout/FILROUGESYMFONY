<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713074131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles_blog (id INT AUTO_INCREMENT NOT NULL, utilisateurs_id INT NOT NULL, titre VARCHAR(255) NOT NULL, article LONGTEXT NOT NULL, image INT DEFAULT NULL, date DATETIME NOT NULL, INDEX IDX_9AE996041E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, utilisateurs_id INT DEFAULT NULL, date DATETIME NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_35D4282C1E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, articles_blog_id INT NOT NULL, utilisateurs_id INT NOT NULL, commentaire LONGTEXT NOT NULL, INDEX IDX_D9BEC0C49F851A36 (articles_blog_id), INDEX IDX_D9BEC0C41E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_commande (id INT AUTO_INCREMENT NOT NULL, commandes_id INT DEFAULT NULL, produits_id INT DEFAULT NULL, quantité INT NOT NULL, INDEX IDX_47F5946E8BF5C2E6 (commandes_id), INDEX IDX_47F5946ECD11A2CF (produits_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, nom_produit VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix_unitaire DOUBLE PRECISION NOT NULL, quantite_disponibles INT NOT NULL, numero_image INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(40) NOT NULL, phone INT NOT NULL, pass VARCHAR(100) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles_blog ADD CONSTRAINT FK_9AE996041E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C49F851A36 FOREIGN KEY (articles_blog_id) REFERENCES articles_blog (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C41E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE produit_commande ADD CONSTRAINT FK_47F5946E8BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE produit_commande ADD CONSTRAINT FK_47F5946ECD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C49F851A36');
        $this->addSql('ALTER TABLE produit_commande DROP FOREIGN KEY FK_47F5946E8BF5C2E6');
        $this->addSql('ALTER TABLE produit_commande DROP FOREIGN KEY FK_47F5946ECD11A2CF');
        $this->addSql('ALTER TABLE articles_blog DROP FOREIGN KEY FK_9AE996041E969C5');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C1E969C5');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C41E969C5');
        $this->addSql('DROP TABLE articles_blog');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE produit_commande');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE utilisateurs');
    }
}
