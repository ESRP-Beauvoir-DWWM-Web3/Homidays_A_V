<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220725133329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce_equipment (annonce_id INT NOT NULL, equipment_id INT NOT NULL, INDEX IDX_A61F3E118805AB2F (annonce_id), INDEX IDX_A61F3E11517FE9FE (equipment_id), PRIMARY KEY(annonce_id, equipment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce_equipment ADD CONSTRAINT FK_A61F3E118805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce_equipment ADD CONSTRAINT FK_A61F3E11517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce ADD author_id INT NOT NULL, ADD reservations_id INT DEFAULT NULL, ADD comments_id INT DEFAULT NULL, ADD categories_id INT DEFAULT NULL, ADD destinations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E563379586 FOREIGN KEY (comments_id) REFERENCES comments (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5A21214B7 FOREIGN KEY (categories_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5912C90D4 FOREIGN KEY (destinations_id) REFERENCES destination (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5F675F31B ON annonce (author_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E5D9A7F869 ON annonce (reservations_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E563379586 ON annonce (comments_id)');
        $this->addSql('CREATE INDEX IDX_F65593E5A21214B7 ON annonce (categories_id)');
        $this->addSql('CREATE INDEX IDX_F65593E5912C90D4 ON annonce (destinations_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE annonce_equipment');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5F675F31B');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5D9A7F869');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E563379586');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5A21214B7');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5912C90D4');
        $this->addSql('DROP INDEX IDX_F65593E5F675F31B ON annonce');
        $this->addSql('DROP INDEX UNIQ_F65593E5D9A7F869 ON annonce');
        $this->addSql('DROP INDEX UNIQ_F65593E563379586 ON annonce');
        $this->addSql('DROP INDEX IDX_F65593E5A21214B7 ON annonce');
        $this->addSql('DROP INDEX IDX_F65593E5912C90D4 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP author_id, DROP reservations_id, DROP comments_id, DROP categories_id, DROP destinations_id');
    }
}
