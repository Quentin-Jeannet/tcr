<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222170249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE floor_floor_pattern (floor_id INT NOT NULL, floor_pattern_id INT NOT NULL, INDEX IDX_6EE43EA854679E2 (floor_id), INDEX IDX_6EE43EA45E38B75 (floor_pattern_id), PRIMARY KEY(floor_id, floor_pattern_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE floor_floor_pattern ADD CONSTRAINT FK_6EE43EA854679E2 FOREIGN KEY (floor_id) REFERENCES floor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE floor_floor_pattern ADD CONSTRAINT FK_6EE43EA45E38B75 FOREIGN KEY (floor_pattern_id) REFERENCES floor_pattern (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE floor_floor_pattern');
    }
}
