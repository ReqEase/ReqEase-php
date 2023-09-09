<?php

namespace HichemtabTech\ReqeasePhp\Responses\Custom;

use HichemtabTech\ReqeasePhp\Responses\BaseResponse;
use JsonSerializable;

class CustomResponse implements JsonSerializable
{
    use BaseResponse {
        BaseResponse::__construct as private __baseResponseConstruct;
    }

    /**
     * @var string|null $label
     */
    private ?string $label;

    /**
     * @param string $version
     * @param string $environment
     * @param int|null $timestamp
     * @param int|null $httpCode
     * @param string|null $color
     * @param array|null $extraData
     * @param string|null $label
     */
    public function __construct(
        string $version, string $environment, ?int $timestamp, ?int $httpCode, ?string $color, ?array $extraData, ?string $label)
    {
        $this->__baseResponseConstruct($version, $environment, $timestamp, $httpCode, $color, $extraData);
        $this->label = $label;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return array_merge(
            $this->jsonSerializeEssential(),
            [
                'label' => $this->getLabel(),
            ]
        );
    }
}