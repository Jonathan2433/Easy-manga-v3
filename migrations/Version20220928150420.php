<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220928150420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, age INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_mangas (user_id INT NOT NULL, mangas_id INT NOT NULL, INDEX IDX_E723DF12A76ED395 (user_id), INDEX IDX_E723DF12DDC4978F (mangas_id), PRIMARY KEY(user_id, mangas_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_mangas ADD CONSTRAINT FK_E723DF12A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_mangas ADD CONSTRAINT FK_E723DF12DDC4978F FOREIGN KEY (mangas_id) REFERENCES mangas (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_mangas DROP FOREIGN KEY FK_E723DF12A76ED395');
        $this->addSql('ALTER TABLE user_mangas DROP FOREIGN KEY FK_E723DF12DDC4978F');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_mangas');
    }
}
