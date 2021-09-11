<?php

/***
 *     __          __        _     _     ____                _
 *     \ \        / /       | |   | |   |  _ \              | |
 *      \ \  /\  / /__  _ __| | __| |___| |_) | ___  _ __ __| | ___ _ __
 *       \ \/  \/ / _ \| '__| |/ _` / __|  _ < / _ \| '__/ _` |/ _ \ '__|
 *        \  /\  / (_) | |  | | (_| \__ \ |_) | (_) | | | (_| |  __/ |
 *         \/  \/ \___/|_|  |_|\__,_|___/____/ \___/|_|  \__,_|\___|_|
 *
 *
 */

namespace Ayzrix\WorldsBorder\Utils;

use Ayzrix\WorldsBorder\Main;

class Utils {
    
    public static $config;

    public static function loadConfig() {
        self::$config = Main::getInstance()->getConfig()->getAll();
    }

    /**
     * @param string $value
     * @return mixed
     */
    public static function getIntoConfig(string $value) {
        return self::$config[$value];
    }
}