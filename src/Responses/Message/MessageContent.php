<?php

namespace HichemtabTech\ReqeasePhp\Responses\Message;

use JsonSerializable;

class MessageContent implements JsonSerializable
{
    private ?string $title;
    private ?string $body;

    /**
     * @param string|null $title
     * @param string|null $body
     */
    public function __construct(?string $title, ?string $body)
    {
        $this->title = $title;
        $this->body = $body;
    }

    public function jsonSerialize(): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body
        ];
    }
}