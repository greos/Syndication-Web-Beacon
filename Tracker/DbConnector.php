<?php

namespace Tracker;

use \PDO;

/**
 * Class DbConnector
 *
 * Handles connecting to the database
 */
class DbConnector {
    protected static function _getSettings() {
        return Settings::getSettings();
    }

    protected static function _createConnection($settings) {
        $connection = new PDO(
            'mysql:host=' . $settings['DB_HOST'] . ';dbname=' . $settings['DB_NAME'] . ';charset=UTF8',
            $settings['DB_USERNAME'],
            $settings['DB_PASSWORD']
        );

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }

    public static function getNewConnection($settings = false) {
        return self::_createConnection(
            !$settings ? self::_getSettings() : $settings
        );
    }
}
