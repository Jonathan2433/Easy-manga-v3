<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220923094119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mangas_authors (mangas_id INT NOT NULL, authors_id INT NOT NULL, INDEX IDX_E9183DD8DDC4978F (mangas_id), INDEX IDX_E9183DD86DE2013A (authors_id), PRIMARY KEY(mangas_id, authors_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mangas_illustrators (mangas_id INT NOT NULL, illustrators_id INT NOT NULL, INDEX IDX_E37AD3CDDC4978F (mangas_id), INDEX IDX_E37AD3CB57C6900 (illustrators_id), PRIMARY KEY(mangas_id, illustrators_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mangas_genders (mangas_id INT NOT NULL, genders_id INT NOT NULL, INDEX IDX_E40FBF34DDC4978F (mangas_id), INDEX IDX_E40FBF34477C57FD (genders_id), PRIMARY KEY(mangas_id, genders_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mangas_type (mangas_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_37C31E18DDC4978F (mangas_id), INDEX IDX_37C31E18C54C8C93 (type_id), PRIMARY KEY(mangas_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mangas_authors ADD CONSTRAINT FK_E9183DD8DDC4978F FOREIGN KEY (mangas_id) REFERENCES mangas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mangas_authors ADD CONSTRAINT FK_E9183DD86DE2013A FOREIGN KEY (authors_id) REFERENCES authors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mangas_illustrators ADD CONSTRAINT FK_E37AD3CDDC4978F FOREIGN KEY (mangas_id) REFERENCES mangas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mangas_illustrators ADD CONSTRAINT FK_E37AD3CB57C6900 FOREIGN KEY (illustrators_id) REFERENCES illustrators (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mangas_genders ADD CONSTRAINT FK_E40FBF34DDC4978F FOREIGN KEY (mangas_id) REFERENCES mangas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mangas_genders ADD CONSTRAINT FK_E40FBF34477C57FD FOREIGN KEY (genders_id) REFERENCES genders (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mangas_type ADD CONSTRAINT FK_37C31E18DDC4978F FOREIGN KEY (mangas_id) REFERENCES mangas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mangas_type ADD CONSTRAINT FK_37C31E18C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mangas_authors DROP FOREIGN KEY FK_E9183DD8DDC4978F');
        $this->addSql('ALTER TABLE mangas_authors DROP FOREIGN KEY FK_E9183DD86DE2013A');
        $this->addSql('ALTER TABLE mangas_illustrators DROP FOREIGN KEY FK_E37AD3CDDC4978F');
        $this->addSql('ALTER TABLE mangas_illustrators DROP FOREIGN KEY FK_E37AD3CB57C6900');
        $this->addSql('ALTER TABLE mangas_genders DROP FOREIGN KEY FK_E40FBF34DDC4978F');
        $this->addSql('ALTER TABLE mangas_genders DROP FOREIGN KEY FK_E40FBF34477C57FD');
        $this->addSql('ALTER TABLE mangas_type DROP FOREIGN KEY FK_37C31E18DDC4978F');
        $this->addSql('ALTER TABLE mangas_type DROP FOREIGN KEY FK_37C31E18C54C8C93');
        $this->addSql('DROP TABLE mangas_authors');
        $this->addSql('DROP TABLE mangas_illustrators');
        $this->addSql('DROP TABLE mangas_genders');
        $this->addSql('DROP TABLE mangas_type');
    }
}
