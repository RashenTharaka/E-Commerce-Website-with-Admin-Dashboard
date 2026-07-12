<?php
/**
 * SuperLand Database Connection
 *
 * Default local setup:
 * - Host: localhost
 * - Username: root
 * - Password: empty
 * - Database: superland_db
 *
 * If the local MySQL server uses a password, update only the $DB_PASSWORD value.
 */

$DB_HOST = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_DATABASE = 'superland_db';
$DB_PORT = 3306;

function db_connect(): mysqli
{
    global $DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE, $DB_PORT;

    static $connection = null;

    if ($connection instanceof mysqli) {
        return $connection;
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $connection = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE, (int) $DB_PORT);
        $connection->set_charset('utf8mb4');
        return $connection;
    } catch (mysqli_sql_exception $e) {
        die(
            '<h2>Database connection failed</h2>' .
            '<p>Please check <strong>config/db.php</strong> and make sure <strong>database/superland_db.sql</strong> has been imported.</p>' .
            '<p>Error: ' . htmlspecialchars($e->getMessage()) . '</p>'
        );
    }
}

// Backward-compatible variables for existing project files.
$con = db_connect();
$conn = $con;
