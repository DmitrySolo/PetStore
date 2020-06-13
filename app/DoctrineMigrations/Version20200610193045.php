<?php declare(strict_types=1);

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610193045 extends AbstractMigration
{
   private $table = 'public.publisher';

    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE EXTENSION IF NOT EXISTS \"uuid-ossp\"");
        $this->addSql(sprintf("CREATE TABLE IF NOT EXISTS %s (id UUID PRIMARY KEY DEFAULT uuid_generate_v4(), name TEXT UNIQUE NOT NULL, slug TEXT UNIQUE NOT NULL, description TEXT)", $this->table));
        $this->addSql(sprintf("INSERT INTO %s (name,slug,description) VALUES ('O`Reily', 'o`reily', 'good publisher')", $this->table));
    }

    public function down(Schema $schema) : void
    {
        $this->addSql(sprintf('DROP TABLE IF EXISTS %s', $this->table));
    }
}
