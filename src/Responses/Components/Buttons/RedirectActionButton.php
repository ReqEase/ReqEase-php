<?php

namespace HichemtabTech\ReqeasePhp\Responses\Components\Buttons;

use HichemtabTech\ReqeasePhp\Responses\Components\ActionType;
use HichemtabTech\ReqeasePhp\Responses\Components\BaseActionButton;

class RedirectActionButton extends BaseActionButton
{
    protected ActionType|string $actionType = ActionType::REDIRECT;
    private string $url;

    /**
     * @param string $url
     * @param string|null $text
     * @param string|null $color
     */
    public function __construct(string $url, ?string $text = "Ok", ?string $color = null)
    {
        parent::__construct($text, $color);
        $this->url = $url;
    }

    protected function getButtonData(): array
    {
        return [
            'url' => $this->url
        ];
    }
}