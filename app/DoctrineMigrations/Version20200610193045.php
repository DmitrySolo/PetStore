<?php declare(strict_types=1);

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610193045 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE EXTENSION IF NOT EXISTS \"uuid-ossp\"");
        $this->addSql('CREATE TABLE IF NOT EXISTS public.publisher (id UUID PRIMARY KEY DEFAULT uuid_generate_v4(), name TEXT, slug TEXT, description TEXT)');
        $this->addSql("INSERT INTO public.publisher (name,slug,description) VALUES ('O`Reily', 'oreily', 'good publisher')");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE IF EXISTS public.vendor');
    }
}
