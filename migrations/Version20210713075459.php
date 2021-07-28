<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713075459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles_blog DROP date');
        $this->addSql('ALTER TABLE commandes CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE commentaires ADD date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE produit_commande CHANGE quantité quantite INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateurs DROP date');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles_blog ADD date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE commandes CHANGE date date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE commentaires DROP date');
        $this->addSql('ALTER TABLE produit_commande CHANGE quantite quantité INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
    }
}
