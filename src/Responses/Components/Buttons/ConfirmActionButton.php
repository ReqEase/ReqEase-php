<?php

namespace HichemtabTech\ReqeasePhp\Responses\Components\Buttons;

use HichemtabTech\ReqeasePhp\Responses\Components\ActionType;
use HichemtabTech\ReqeasePhp\Responses\Components\BaseActionButton;

class ConfirmActionButton extends BaseActionButton
{
    protected ActionType|string $actionType = ActionType::CONFIRM;

    public function __construct(?string $text = "Confirm", ?string $color = null)
    {
        parent::__construct($text, $color);
    }

    protected function getButtonData(): array
    {
        return [];
    }
}