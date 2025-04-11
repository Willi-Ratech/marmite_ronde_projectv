<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250408131529 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_5F9E962AA76ED395 ON comments
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comments DROP author, CHANGE user_id author_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AF675F31B FOREIGN KEY (author_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5F9E962AF675F31B ON comments (author_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE consult DROP FOREIGN KEY FK_4D02C9E2A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_4D02C9E2A76ED395 ON consult
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE consult DROP user_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE publish DROP FOREIGN KEY FK_B894CC41A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_B894CC41A76ED395 ON publish
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE publish DROP user_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_DA88B137A76ED395 ON recipe
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE recipe DROP author, CHANGE user_id author_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137F675F31B FOREIGN KEY (author_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DA88B137F675F31B ON recipe (author_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, DROP name, DROP last_name, DROP user_name, DROP user_email, DROP user_pass
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AF675F31B
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_5F9E962AF675F31B ON comments
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comments ADD author VARCHAR(255) NOT NULL, CHANGE author_id user_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5F9E962AA76ED395 ON comments (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE publish ADD user_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE publish ADD CONSTRAINT FK_B894CC41A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_B894CC41A76ED395 ON publish (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_IDENTIFIER_EMAIL ON user
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD last_name VARCHAR(255) NOT NULL, ADD user_name VARCHAR(255) NOT NULL, ADD user_email VARCHAR(255) NOT NULL, ADD user_pass VARCHAR(255) NOT NULL, DROP email, DROP roles, CHANGE password name VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137F675F31B
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_DA88B137F675F31B ON recipe
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE recipe ADD author VARCHAR(255) NOT NULL, CHANGE author_id user_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DA88B137A76ED395 ON recipe (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE consult ADD user_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE consult ADD CONSTRAINT FK_4D02C9E2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4D02C9E2A76ED395 ON consult (user_id)
        SQL);
    }
}
