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

namespace Ayzrix\WorldsBorder\Events\Listeners;

use Ayzrix\WorldsBorder\Main;
use Ayzrix\WorldsBorder\Utils\Utils;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\level\Position;
use pocketmine\scheduler\ClosureTask;
use pocketmine\Server;

class PlayerListener implements Listener {

    public function onPlayerMove(PlayerMoveEvent $event) {
        $to = $event->getTo();
        $from = $event->getFrom();
        if (round($to->getX()) !== round($from->getX()) or round($from->getZ()) !== round($from->getZ())) {
            if (isset(Utils::getIntoConfig("worlds")[$to->getLevel()->getFolderName()])) {
                $values = Utils::getIntoConfig("worlds")[$to->getLevel()->getFolderName()];
                if ($to->getX() >= $values["x"] or $to->getZ() >= $values["z"]) {
                    $event->setCancelled(true);
                    $player = $event->getPlayer();
                    if (!is_null($values["message"])) $event->getPlayer()->sendMessage($values["message"]);
                    if ($values["kick"] === true) {
                        $player->teleport($event->getTo());
                        Main::getInstance()->getScheduler()->scheduleDelayedTask(new ClosureTask(function(int $currentTick) use($player, $values) : void {
                            $player->kick($values["kickMessage"], false);
                        }), 5);
                        return;
                    }
                    if ($values["teleport"] === true) {
                        $position = explode(":", $values["teleportPosition"]);
                        $event->getPlayer()->teleport(new Position((float)$position[0], (float)$position[1], (float)$position[2], Server::getInstance()->getLevelByName($position[3])));
                    }
                }
            }
        }
    }
}