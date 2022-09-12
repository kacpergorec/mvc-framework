<?php


class m0003_addUsernameColumn
{

    public function up()
    {
        $db = \App\Core\Application::$app->db;
        $SQL = "ALTER TABLE users ADD COLUMN username VARCHAR(512) NOT NULL AFTER id";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \App\Core\Application::$app->db;
        $SQL = "ALTER TABLE users DROP COLUMN username";
        $db->pdo->exec($SQL);
    }

}