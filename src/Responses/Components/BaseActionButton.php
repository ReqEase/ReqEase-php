<?php

namespace HichemtabTech\ReqeasePhp\Responses\Components;

use JsonSerializable;

abstract class BaseActionButton implements JsonSerializable
{
    protected ActionType|string $actionType;
    protected ?string $text;
    protected ?string $color;

    /**
     * @param string|null $text
     * @param string|null $color
     */
    public function __construct(string $text = null, string $color = null)
    {
        $this->text = $text;
        $this->color = $color;
    }

    abstract protected function getButtonData(): array;

    protected function getBaseButtonData(): array
    {
        return [
            'actionType' => $this->actionType,
            'text' => $this->text,
            'color' => $this->color,
        ];
    }

    public function jsonSerialize(): array
    {
        return array_merge($this->getBaseButtonData(), $this->getButtonData());
    }
}