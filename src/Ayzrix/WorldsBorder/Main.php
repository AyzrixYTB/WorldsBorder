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

namespace Ayzrix\WorldsBorder;

use Ayzrix\WorldsBorder\Events\Listeners\PlayerListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase {
    use SingletonTrait;

    public function onLoad() {
        self::setInstance($this);
    }

    public function onEnable() {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents(new PlayerListener(), $this);
    }
}