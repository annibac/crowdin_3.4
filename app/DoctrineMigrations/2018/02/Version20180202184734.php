<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180202184734 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, shortName VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_languages (language_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_A031DE9D82F1BAF4 (language_id), INDEX IDX_A031DE9DA76ED395 (user_id), PRIMARY KEY(language_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file_target_languages (language_id INT NOT NULL, file_id INT NOT NULL, INDEX IDX_7F97333D82F1BAF4 (language_id), INDEX IDX_7F97333D93CB796C (file_id), PRIMARY KEY(language_id, file_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, malus INT NOT NULL, UNIQUE INDEX UNIQ_8D93D64992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_8D93D649A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_8D93D649C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, language_id INT DEFAULT NULL, file_id INT DEFAULT NULL, INDEX IDX_FEC530A9A76ED395 (user_id), INDEX IDX_FEC530A982F1BAF4 (language_id), INDEX IDX_FEC530A993CB796C (file_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, source_language_id INT DEFAULT NULL, user_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_8C9F3610BE8EEA54 (source_language_id), INDEX IDX_8C9F3610A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_languages ADD CONSTRAINT FK_A031DE9D82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_languages ADD CONSTRAINT FK_A031DE9DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE file_target_languages ADD CONSTRAINT FK_7F97333D82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE file_target_languages ADD CONSTRAINT FK_7F97333D93CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A993CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610BE8EEA54 FOREIGN KEY (source_language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_languages DROP FOREIGN KEY FK_A031DE9D82F1BAF4');
        $this->addSql('ALTER TABLE file_target_languages DROP FOREIGN KEY FK_7F97333D82F1BAF4');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A982F1BAF4');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F3610BE8EEA54');
        $this->addSql('ALTER TABLE user_languages DROP FOREIGN KEY FK_A031DE9DA76ED395');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9A76ED395');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F3610A76ED395');
        $this->addSql('ALTER TABLE file_target_languages DROP FOREIGN KEY FK_7F97333D93CB796C');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A993CB796C');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE user_languages');
        $this->addSql('DROP TABLE file_target_languages');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE content');
        $this->addSql('DROP TABLE file');
    }
}
