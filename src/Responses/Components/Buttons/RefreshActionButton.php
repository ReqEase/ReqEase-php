<?php

namespace HichemtabTech\ReqeasePhp\Responses\Components\Buttons;

use HichemtabTech\ReqeasePhp\Responses\Components\ActionType;
use HichemtabTech\ReqeasePhp\Responses\Components\BaseActionButton;

class RefreshActionButton extends BaseActionButton
{
    protected ActionType|string $actionType = ActionType::REFRESH;

    public function __construct(string $text = "OK", string $color = null)
    {
        parent::__construct($text, $color);
    }

    protected function getButtonData(): array
    {
        return [];
    }
}