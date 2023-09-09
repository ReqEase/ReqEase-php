<?php

namespace HichemtabTech\ReqeasePhp\Responses\FieldsErrors;

use HichemtabTech\ReqeasePhp\Responses\BaseResponseBuilder;
use HichemtabTech\ReqeasePhp\Responses\Components\FieldsErrorAdder;

class FieldsErrorResponseBuilder
{
    use BaseResponseBuilder, FieldsErrorAdder;

    /**
     * @return FieldsErrorResponse
     * @noinspection PhpUnused
     */
    public function build(): FieldsErrorResponse
    {
        return new FieldsErrorResponse(
            $this->version, $this->environment, $this->timestamp, $this->httpCode, $this->color, $this->extraData,
            $this->fieldsErrors);
    }
}