<?php

namespace HichemtabTech\ReqeasePhp\Responses\Components;

trait ButtonsAdder
{
    protected array $buttons = [];
    public function setButtons(ButtonsBuilder|array $buttonsBuilder): static
    {
        if (is_array($buttonsBuilder)) {
            $this->buttons = $buttonsBuilder;
        }
        else {
            $this->buttons = $buttonsBuilder->build();
        }
        return $this;
    }
}