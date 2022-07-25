<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220725141027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD reservations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955D9A7F869 FOREIGN KEY (reservations_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_42C84955D9A7F869 ON reservation (reservations_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955D9A7F869');
        $this->addSql('DROP INDEX IDX_42C84955D9A7F869 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP reservations_id');
    }
}
