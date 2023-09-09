<?php

namespace HichemtabTech\ReqeasePhp\Responses\FieldsErrors;

use HichemtabTech\ReqeasePhp\Responses\BaseResponse;
use JsonSerializable;

class FieldsErrorResponse implements JsonSerializable
{
    use BaseResponse {
        BaseResponse::__construct as private __baseResponseConstruct;
    }

    /**
     * @var array
     */
    private array $fieldsErrors;

    /**
     * FieldsErrorResponse constructor.
     * @param string $version
     * @param string $environment
     * @param string $timestamp
     * @param int $httpCode
     * @param string $color
     * @param array|null $extraData
     * @param array $fieldsErrors
     */
    public function __construct(string $version, string $environment, string $timestamp, int $httpCode, string $color, ?array $extraData, array $fieldsErrors)
    {
        $this->__baseResponseConstruct($version, $environment, $timestamp, $httpCode, $color, $extraData);
        $this->fieldsErrors = $fieldsErrors;
    }

    /**
     * @return array
     * @noinspection PhpUnused
     */
    public function getFieldsErrors(): array
    {
        return $this->fieldsErrors;
    }

    /**
     * @param array $fieldsErrors
     * @noinspection PhpUnused
     */
    public function setFieldsErrors(array $fieldsErrors): void
    {
        $this->fieldsErrors = $fieldsErrors;
    }

    public function jsonSerialize(): array
    {
        return array_merge($this->jsonSerializeEssential(), [
            'fieldsErrors' => $this->fieldsErrors
        ]);
    }
}