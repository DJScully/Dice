<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210901173144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personaje DROP INDEX UNIQ_53A410888CCBB6A9, ADD INDEX IDX_53A410888CCBB6A9 (raza_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personaje DROP INDEX IDX_53A410888CCBB6A9, ADD UNIQUE INDEX UNIQ_53A410888CCBB6A9 (raza_id)');
    }
}
