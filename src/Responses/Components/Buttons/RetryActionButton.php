<?php

namespace HichemtabTech\ReqeasePhp\Responses\Components\Buttons;

use HichemtabTech\ReqeasePhp\Responses\Components\ActionType;
use HichemtabTech\ReqeasePhp\Responses\Components\BaseActionButton;

class RetryActionButton extends BaseActionButton
{
    protected ActionType|string $actionType = ActionType::RETRY;

    public function __construct(string $text = "Retry", string $color = null)
    {
        parent::__construct($text, $color);
    }

    protected function getButtonData(): array
    {
        return [];
    }
}