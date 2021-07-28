<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721195748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles_blog ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE articles_blog ADD CONSTRAINT FK_9AE99604A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9AE99604A76ED395 ON articles_blog (user_id)');
        $this->addSql('ALTER TABLE commandes ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_35D4282CA76ED395 ON commandes (user_id)');
        $this->addSql('ALTER TABLE commentaires ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C4A76ED395 ON commentaires (user_id)');
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL, ADD phone VARCHAR(14) NOT NULL, ADD pass VARCHAR(255) NOT NULL, ADD date DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles_blog DROP FOREIGN KEY FK_9AE99604A76ED395');
        $this->addSql('DROP INDEX IDX_9AE99604A76ED395 ON articles_blog');
        $this->addSql('ALTER TABLE articles_blog DROP user_id');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CA76ED395');
        $this->addSql('DROP INDEX IDX_35D4282CA76ED395 ON commandes');
        $this->addSql('ALTER TABLE commandes DROP user_id');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4A76ED395');
        $this->addSql('DROP INDEX IDX_D9BEC0C4A76ED395 ON commentaires');
        $this->addSql('ALTER TABLE commentaires DROP user_id');
        $this->addSql('ALTER TABLE user DROP nom, DROP prenom, DROP phone, DROP pass, DROP date');
    }
}
