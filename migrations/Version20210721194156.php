<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721194156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles_blog DROP FOREIGN KEY FK_9AE996041E969C5');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C1E969C5');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C41E969C5');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP INDEX IDX_9AE996041E969C5 ON articles_blog');
        $this->addSql('ALTER TABLE articles_blog DROP utilisateurs_id');
        $this->addSql('DROP INDEX IDX_35D4282C1E969C5 ON commandes');
        $this->addSql('ALTER TABLE commandes DROP utilisateurs_id');
        $this->addSql('DROP INDEX IDX_D9BEC0C41E969C5 ON commentaires');
        $this->addSql('ALTER TABLE commentaires DROP utilisateurs_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, pass VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE articles_blog ADD utilisateurs_id INT NOT NULL');
        $this->addSql('ALTER TABLE articles_blog ADD CONSTRAINT FK_9AE996041E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE INDEX IDX_9AE996041E969C5 ON articles_blog (utilisateurs_id)');
        $this->addSql('ALTER TABLE commandes ADD utilisateurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE INDEX IDX_35D4282C1E969C5 ON commandes (utilisateurs_id)');
        $this->addSql('ALTER TABLE commentaires ADD utilisateurs_id INT NOT NULL');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C41E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C41E969C5 ON commentaires (utilisateurs_id)');
    }
}
