<?php

namespace HichemtabTech\ReqeasePhp\Responses\Components\Buttons;

use HichemtabTech\ReqeasePhp\Responses\Components\ActionType;
use HichemtabTech\ReqeasePhp\Responses\Components\BaseActionButton;

class CancelActionButton extends BaseActionButton
{
    protected ActionType|string $actionType = ActionType::CANCEL;

    public function __construct(string $text = "Cancel", string $color = null)
    {
        parent::__construct($text, $color);
    }

    protected function getButtonData(): array
    {
        return [];
    }
}