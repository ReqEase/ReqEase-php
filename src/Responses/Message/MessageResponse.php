<?php

namespace HichemtabTech\ReqeasePhp\Responses\Message;


use HichemtabTech\ReqeasePhp\Responses\BaseResponse;
use JsonSerializable;

class MessageResponse implements JsonSerializable
{
    use BaseResponse {
        BaseResponse::__construct as private __baseResponseConstruct;
    }
    private ?array $buttons;
    private MessageResponseType|string|null $type;
    private ?MessageContent $content;

    /**
     * @param string $version
     * @param string $environment
     * @param int|null $timestamp
     * @param int|null $httpCode
     * @param string|null $color
     * @param array|null $extraData
     * @param MessageResponseType|string|null $type
     * @param MessageContent|null $content
     * @param array|null $buttons
     */
    public function __construct(
        string $version, string $environment, ?int $timestamp, ?int $httpCode, ?string $color, ?array $extraData,
        string|MessageResponseType|null $type,
        ?MessageContent $content,
        ?array $buttons)
    {
        $this->__baseResponseConstruct($version, $environment, $timestamp, $httpCode, $color, $extraData);
        $this->type = $type;
        $this->content = $content;
        $this->buttons = $buttons;
    }

    /**
     * @return MessageResponseType|string|null
     */
    public function getType(): string|MessageResponseType|null
    {
        return $this->type;
    }

    /**
     * @return MessageContent|null
     */
    public function getContent(): ?MessageContent
    {
        return $this->content;
    }

    /**
     * @return array|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }

    public function jsonSerialize(): array
    {
        return array_merge(
            $this->jsonSerializeEssential(),
            [
                'type' => $this->getType(),
                'content' => $this->getContent(),
                'buttons' => $this->getButtons()
            ]
        );
    }
}