<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190107134840 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE post_post_category (post_id INT NOT NULL, post_category_id INT NOT NULL, INDEX IDX_A6D02E734B89032C (post_id), INDEX IDX_A6D02E73FE0617CD (post_category_id), PRIMARY KEY(post_id, post_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_post_category ADD CONSTRAINT FK_A6D02E734B89032C FOREIGN KEY (post_id) REFERENCES example_post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_post_category ADD CONSTRAINT FK_A6D02E73FE0617CD FOREIGN KEY (post_category_id) REFERENCES example_post_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE example_post ADD one_to_one_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE example_post ADD CONSTRAINT FK_653EA51FB549C760 FOREIGN KEY (one_to_one_id) REFERENCES example_post_category (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_653EA51FB549C760 ON example_post (one_to_one_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE post_post_category');
        $this->addSql('ALTER TABLE example_post DROP FOREIGN KEY FK_653EA51FB549C760');
        $this->addSql('DROP INDEX UNIQ_653EA51FB549C760 ON example_post');
        $this->addSql('ALTER TABLE example_post DROP one_to_one_id');
    }
}
