<?php

namespace HichemtabTech\ReqeasePhp\Responses;

/**
 * @method static self setColor(string $color)
 * @method static self setHttpCode(int $httpCode)
 * @method static self setTimestamp(int $timestamp)
 * @method static self setExtraData(array $extraData)
 * @method static string getColor()
 * @method static int getHttpCode()
 * @method static int getTimestamp()
 * @method static string getVersion()
 * @method static string getEnvironment()
 * @method static array|null getExtraData()
 *
 * @method self setColor(string $color)
 * @method self setHttpCode(int $httpCode)
 * @method self setTimestamp(int $timestamp)
 * @method self setExtraData(array $extraData)
 * @method string getColor()
 * @method int getHttpCode()
 * @method int getTimestamp()
 * @method string getVersion()
 * @method string getEnvironment()
 * @method array|null getExtraData()
 */
trait BaseResponse
{
    private static ?self $instance = null;
    protected readonly string $version;
    public readonly string $environment;
    protected ?int $timestamp = null;
    protected ?int $httpCode = null;
    protected ?string $color = null;
    protected ?array $extraData = null;

    public function __construct(?string $version, ?string $environment, ?string $timestamp, ?string $httpCode, ?string $color, ?array $extraData)
    {
        $this->version = $version;
        $this->environment = $environment;
        $this->timestamp = $timestamp;
        $this->httpCode = $httpCode;
        $this->color = $color;
        $this->extraData = $extraData;
    }

    protected function jsonSerializeEssential(): array
    {
        return array_merge([
            "version" => $this->version,
            "environment" => $this->environment,
            "timestamp" => $this->timestamp,
            "httpCode" => $this->httpCode,
            "color" => $this->color,
        ], $this->extraData??[]);
    }

    public function toArray(): array
    {
        return $this->jsonSerializeEssential();
    }

    public function send(): void
    {
        header('Content-Type: application/json');
        echo json_encode($this);
    }
}