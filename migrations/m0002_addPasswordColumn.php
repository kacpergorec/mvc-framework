<?php


class m0002_addPasswordColumn
{

    public function up()
    {
        $db = \App\Core\Application::$app->db;
        $SQL = "ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL AFTER email";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \App\Core\Application::$app->db;
        $SQL = "ALTER TABLE users DROP COLUMN password";
        $db->pdo->exec($SQL);
    }

}