<?php

namespace HichemtabTech\ReqeasePhp\Responses\Components\Buttons;

use HichemtabTech\ReqeasePhp\Responses\Components\ActionType;
use HichemtabTech\ReqeasePhp\Responses\Components\BaseActionButton;

class CloseActionButton extends BaseActionButton
{
    protected ActionType|string $actionType = ActionType::CLOSE;

    public function __construct(string $text = "Close", string $color = null)
    {
        parent::__construct($text, $color);
    }

    protected function getButtonData(): array
    {
        return [];
    }
}