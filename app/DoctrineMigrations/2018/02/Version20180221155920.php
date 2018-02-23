<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180221155920 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE file_target_languages DROP FOREIGN KEY FK_7F97333D82F1BAF4');
        $this->addSql('ALTER TABLE file_target_languages DROP FOREIGN KEY FK_7F97333D93CB796C');
        $this->addSql('DROP INDEX IDX_7F97333D82F1BAF4 ON file_target_languages');
        $this->addSql('ALTER TABLE file_target_languages DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE file_target_languages CHANGE language_id target_language_id INT NOT NULL');
        $this->addSql('ALTER TABLE file_target_languages ADD CONSTRAINT FK_7F97333D5CBF5FE FOREIGN KEY (target_language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE file_target_languages ADD CONSTRAINT FK_7F97333D93CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('CREATE INDEX IDX_7F97333D5CBF5FE ON file_target_languages (target_language_id)');
        $this->addSql('ALTER TABLE file_target_languages ADD PRIMARY KEY (file_id, target_language_id)');
        $this->addSql('ALTER TABLE value ADD value VARCHAR(100) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE file_target_languages DROP FOREIGN KEY FK_7F97333D5CBF5FE');
        $this->addSql('ALTER TABLE file_target_languages DROP FOREIGN KEY FK_7F97333D93CB796C');
        $this->addSql('DROP INDEX IDX_7F97333D5CBF5FE ON file_target_languages');
        $this->addSql('ALTER TABLE file_target_languages DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE file_target_languages CHANGE target_language_id language_id INT NOT NULL');
        $this->addSql('ALTER TABLE file_target_languages ADD CONSTRAINT FK_7F97333D82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE file_target_languages ADD CONSTRAINT FK_7F97333D93CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_7F97333D82F1BAF4 ON file_target_languages (language_id)');
        $this->addSql('ALTER TABLE file_target_languages ADD PRIMARY KEY (language_id, file_id)');
        $this->addSql('ALTER TABLE value DROP value');
    }
}
