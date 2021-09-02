<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210829131937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partida (id INT AUTO_INCREMENT NOT NULL, usuario_id INT DEFAULT NULL, proxima_sesion DATETIME NOT NULL, INDEX IDX_A9C1580CDB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partida_personaje (partida_id INT NOT NULL, personaje_id INT NOT NULL, INDEX IDX_A9B16361F15A1987 (partida_id), INDEX IDX_A9B16361121EFAFB (personaje_id), PRIMARY KEY(partida_id, personaje_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE partida ADD CONSTRAINT FK_A9C1580CDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE partida_personaje ADD CONSTRAINT FK_A9B16361F15A1987 FOREIGN KEY (partida_id) REFERENCES partida (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partida_personaje ADD CONSTRAINT FK_A9B16361121EFAFB FOREIGN KEY (personaje_id) REFERENCES personaje (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personaje CHANGE trasfondo trasfondo LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partida_personaje DROP FOREIGN KEY FK_A9B16361F15A1987');
        $this->addSql('DROP TABLE partida');
        $this->addSql('DROP TABLE partida_personaje');
        $this->addSql('ALTER TABLE personaje CHANGE trasfondo trasfondo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
