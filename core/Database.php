<?php


namespace App\Core;


class Database
{
    public \PDO $pdo;

    public function __construct($config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $this->getAppliedMigrations();
        $appliedMigrations = $this->getAppliedMigrations();

        $files = array_diff(scandir(Application::$ROOT_DIR . '/migrations'), ['.', '..']);

        $toApplyMigrations = array_diff($files, $appliedMigrations);

        foreach ($toApplyMigrations as $migration) {
            $instance = $this->getMigration($migration);
            $this->log("Applying migration $migration");
            $instance->up();
            $this->log("Applied migration $migration");

            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("All migrations are applied");
        }

    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("
        CREATE TABLE IF NOT EXISTS migrations(
            id INT auto_increment PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
        ENGINE=INNODB;
        ");
    }

    public function getAppliedMigrations()
    {
        return $this->pdo
            ->query("SELECT migration FROM migrations")
            ->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {
        $str = implode(',', array_map(fn($m) => "('$m')", $migrations));

        $statement = $this->pdo->query("INSERT INTO migrations (migration) VALUES $str");
    }

    private function getMigration($migration)
    {
        require_once Application::$ROOT_DIR . '/migrations/' . $migration;
        $className = pathinfo($migration, PATHINFO_FILENAME);
        return new $className();
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    protected function log($message)
    {
        echo '[' . date('Y-m-d H:i:s') . '] - ' . $message . PHP_EOL;
    }
}