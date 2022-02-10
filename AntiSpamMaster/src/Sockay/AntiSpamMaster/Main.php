<?php

namespace Sockay\AntiSpamMaster;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;

class Cooldown implements Listener {

    public $cooldown = [];

    const COOLDOWN_TIME = 1.2;

    public function onChat(PlayerCommandPreprocessEvent $event) : void {

        if (!isset($this->cooldown[$event->getPlayer()->getName()])) $this->cooldown[$event->getPlayer()->getName()] = time();

        if (Time() < $this->cooldown[$event->getPlayer()->getName()]) {

            $event->setCancelled();

            $player = $event->getPlayer();
            $player->sendMessage("§9Vous devez écrire moin vite.");



        } else {

            $this->cooldown[$event->getPlayer()->getName()] = time() + self::COOLDOWN_TIME;

        }
    }
}
