<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210112193109 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bet (id INT AUTO_INCREMENT NOT NULL, round_id INT DEFAULT NULL, result_state_id INT DEFAULT NULL, rate DOUBLE PRECISION NOT NULL, status SMALLINT NOT NULL, INDEX IDX_FBF0EC9BA6005CA0 (round_id), INDEX IDX_FBF0EC9BA2DD2322 (result_state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE result_state (id INT AUTO_INCREMENT NOT NULL, matrix LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE round (id INT AUTO_INCREMENT NOT NULL, result_id INT DEFAULT NULL, status SMALLINT NOT NULL, balance DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_C5EEEA347A7B643 (result_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9BA6005CA0 FOREIGN KEY (round_id) REFERENCES round (id)');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9BA2DD2322 FOREIGN KEY (result_state_id) REFERENCES result_state (id)');
        $this->addSql('ALTER TABLE round ADD CONSTRAINT FK_C5EEEA347A7B643 FOREIGN KEY (result_id) REFERENCES result_state (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bet DROP FOREIGN KEY FK_FBF0EC9BA2DD2322');
        $this->addSql('ALTER TABLE round DROP FOREIGN KEY FK_C5EEEA347A7B643');
        $this->addSql('ALTER TABLE bet DROP FOREIGN KEY FK_FBF0EC9BA6005CA0');
        $this->addSql('DROP TABLE bet');
        $this->addSql('DROP TABLE result_state');
        $this->addSql('DROP TABLE round');
    }
}
