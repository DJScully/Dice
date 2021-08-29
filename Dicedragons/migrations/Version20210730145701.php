<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210730145701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personaje (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, raza_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, alienacion VARCHAR(255) NOT NULL, trasfondo VARCHAR(255) NOT NULL, INDEX IDX_53A41088DB38439E (usuario_id), UNIQUE INDEX UNIQ_53A410888CCBB6A9 (raza_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personaje_clases (personaje_id INT NOT NULL, clases_id INT NOT NULL, INDEX IDX_7AC86787121EFAFB (personaje_id), INDEX IDX_7AC86787158CCF68 (clases_id), PRIMARY KEY(personaje_id, clases_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personaje ADD CONSTRAINT FK_53A41088DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE personaje ADD CONSTRAINT FK_53A410888CCBB6A9 FOREIGN KEY (raza_id) REFERENCES razas (id)');
        $this->addSql('ALTER TABLE personaje_clases ADD CONSTRAINT FK_7AC86787121EFAFB FOREIGN KEY (personaje_id) REFERENCES personaje (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personaje_clases ADD CONSTRAINT FK_7AC86787158CCF68 FOREIGN KEY (clases_id) REFERENCES clases (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personaje_clases DROP FOREIGN KEY FK_7AC86787121EFAFB');
        $this->addSql('DROP TABLE personaje');
        $this->addSql('DROP TABLE personaje_clases');
    }
}
