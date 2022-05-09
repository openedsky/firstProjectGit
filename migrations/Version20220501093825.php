<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220501093825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE slide ADD slide_position VARCHAR(255) DEFAULT NULL, ADD button_text1 VARCHAR(255) DEFAULT NULL, ADD button_link1 VARCHAR(255) DEFAULT NULL, ADD button_text2 VARCHAR(255) DEFAULT NULL, ADD button_link2 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE slide DROP slide_position, DROP button_text1, DROP button_link1, DROP button_text2, DROP button_link2');
    }
}
