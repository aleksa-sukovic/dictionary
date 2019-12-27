<?php

namespace Aleksa\Library\DB;

use Aleksa\Library\Exceptions\DBException;
use \mysqli as MySqli;

class DBConnection
{
    /**
     * @var MySqli
     */
    private static ?MySqli $connection = null;

    private static string $HOST = 'db';
    private static string $USER = 'root';
    private static string $PASS = 'root';
    private static string $DB   = 'dictionary';

    public static function getConnection(): MySqli
    {
        if (!DBConnection::$connection) {
            DBConnection::$connection = DBConnection::initializeConnection();
        }

        return DBConnection::$connection;
    }

    public static function closeConnection(): void
    {
        if (DBConnection::$connection) {
            DBConnection::$connection->close();
        }
    }

    private static function initializeConnection()
    {
        $connection = new MySqli(
            DBConnection::$HOST,
            DBConnection::$USER,
            DBConnection::$PASS,
            DBConnection::$DB,
        );

        if ($connection->connect_error) {
            throw new DBException($connection->connect_error);
        }

        return $connection;
    }
}







