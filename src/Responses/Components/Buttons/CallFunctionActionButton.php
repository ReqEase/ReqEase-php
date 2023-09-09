<?php

namespace HichemtabTech\ReqeasePhp\Responses\Components\Buttons;

use HichemtabTech\ReqeasePhp\Responses\Components\ActionType;
use HichemtabTech\ReqeasePhp\Responses\Components\BaseActionButton;

class CallFunctionActionButton extends BaseActionButton
{
    protected ActionType|string $actionType = ActionType::CALL_FUNCTION;
    private string $functionName;

    /**
     * @param string $functionName
     * @param string|null $text
     * @param string|null $color
     */
    public function __construct(string $functionName, ?string $text = null, ?string $color = null)
    {
        parent::__construct($text, $color);
        $this->functionName = $functionName;
    }

    protected function getButtonData(): array
    {
        return [
            'functionName' => $this->functionName
        ];
    }
}