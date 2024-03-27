<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220130810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE floor_pattern ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD rankOrder INT DEFAULT NULL, ADD is_active TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE floor_pattern ADD CONSTRAINT FK_3797642B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE floor_pattern ADD CONSTRAINT FK_3797642896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3797642B03A8386 ON floor_pattern (created_by_id)');
        $this->addSql('CREATE INDEX IDX_3797642896DBBDE ON floor_pattern (updated_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE floor_pattern DROP FOREIGN KEY FK_3797642B03A8386');
        $this->addSql('ALTER TABLE floor_pattern DROP FOREIGN KEY FK_3797642896DBBDE');
        $this->addSql('DROP INDEX IDX_3797642B03A8386 ON floor_pattern');
        $this->addSql('DROP INDEX IDX_3797642896DBBDE ON floor_pattern');
        $this->addSql('ALTER TABLE floor_pattern DROP created_by_id, DROP updated_by_id, DROP created_at, DROP rankOrder, DROP is_active');
    }
}
