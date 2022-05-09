<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429231753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partner ADD author_id INT DEFAULT NULL, ADD date_published DATETIME NOT NULL');
        $this->addSql('ALTER TABLE partner ADD CONSTRAINT FK_312B3E16F675F31B FOREIGN KEY (author_id) REFERENCES user_deco (id)');
        $this->addSql('CREATE INDEX IDX_312B3E16F675F31B ON partner (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partner DROP FOREIGN KEY FK_312B3E16F675F31B');
        $this->addSql('DROP INDEX IDX_312B3E16F675F31B ON partner');
        $this->addSql('ALTER TABLE partner DROP author_id, DROP date_published');
    }
}
