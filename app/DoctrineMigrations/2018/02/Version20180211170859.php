<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180211170859 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE value (id INT AUTO_INCREMENT NOT NULL, key_id INT DEFAULT NULL, user_id INT DEFAULT NULL, language_id INT DEFAULT NULL, INDEX IDX_1D775834D145533 (key_id), INDEX IDX_1D775834A76ED395 (user_id), INDEX IDX_1D77583482F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE value ADD CONSTRAINT FK_1D775834D145533 FOREIGN KEY (key_id) REFERENCES content (id)');
        $this->addSql('ALTER TABLE value ADD CONSTRAINT FK_1D775834A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE value ADD CONSTRAINT FK_1D77583482F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A982F1BAF4');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9A76ED395');
        $this->addSql('DROP INDEX IDX_FEC530A9A76ED395 ON content');
        $this->addSql('DROP INDEX IDX_FEC530A982F1BAF4 ON content');
        $this->addSql('ALTER TABLE content DROP language_id, DROP user_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE value');
        $this->addSql('ALTER TABLE content ADD language_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_FEC530A9A76ED395 ON content (user_id)');
        $this->addSql('CREATE INDEX IDX_FEC530A982F1BAF4 ON content (language_id)');
    }
}
