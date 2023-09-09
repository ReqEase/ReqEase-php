<?php

namespace HichemtabTech\ReqeasePhp\Responses\Message;

use HichemtabTech\ReqeasePhp\Responses\BaseResponseBuilder;
use HichemtabTech\ReqeasePhp\Responses\Components\ButtonsAdder;

class MessageResponseBuilder
{
    use BaseResponseBuilder, ButtonsAdder;
    private MessageResponseType|string|null $type;
    private ?MessageContent $content;

    /**
     * @param MessageResponseType|string|null $type
     * @return MessageResponseBuilder
     */
    public function setType(string|MessageResponseType|null $type): MessageResponseBuilder
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param MessageContent|null $content
     * @return MessageResponseBuilder
     */
    public function setContent(?MessageContent $content): MessageResponseBuilder
    {
        $this->content = $content;
        return $this;
    }

    public function build(): MessageResponse
    {
        return new MessageResponse(
            $this->version, $this->environment, $this->timestamp, $this->httpCode, $this->color, $this->extraData,
            $this->type,
            $this->content,
            $this->buttons);
    }
}