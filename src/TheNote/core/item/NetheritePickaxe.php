<?php

//   ╔═════╗╔═╗ ╔═╗╔═════╗╔═╗    ╔═╗╔═════╗╔═════╗╔═════╗
//   ╚═╗ ╔═╝║ ║ ║ ║║ ╔═══╝║ ╚═╗  ║ ║║ ╔═╗ ║╚═╗ ╔═╝║ ╔═══╝
//     ║ ║  ║ ╚═╝ ║║ ╚══╗ ║   ╚══╣ ║║ ║ ║ ║  ║ ║  ║ ╚══╗
//     ║ ║  ║ ╔═╗ ║║ ╔══╝ ║ ╠══╗   ║║ ║ ║ ║  ║ ║  ║ ╔══╝
//     ║ ║  ║ ║ ║ ║║ ╚═══╗║ ║  ╚═╗ ║║ ╚═╝ ║  ║ ║  ║ ╚═══╗
//     ╚═╝  ╚═╝ ╚═╝╚═════╝╚═╝    ╚═╝╚═════╝  ╚═╝  ╚═════╝
//   Copyright by TheNote! Not for Resale! Not for others
//

namespace TheNote\core\item;

use pocketmine\block\Block;
use pocketmine\block\BlockToolType;
use pocketmine\entity\Entity;

class NetheritePickaxe extends TTool
{

    public function getBlockToolType() : int{
        return BlockToolType::TYPE_PICKAXE;
    }

    public function getBlockToolHarvestLevel() : int{
        return $this->tier;
    }

    public function getAttackPoints() : int{
        return self::getBaseDamageFromTier($this->tier) - 2;
    }

    public function onDestroyBlock(Block $block) : bool{
        if($block->getHardness() > 0){
            return $this->applyDamage(1);
        }
        return false;
    }

    public function onAttackEntity(Entity $victim) : bool{
        return $this->applyDamage(2);
    }

}