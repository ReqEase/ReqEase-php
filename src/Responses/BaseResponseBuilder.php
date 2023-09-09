<?php

namespace HichemtabTech\ReqeasePhp\Responses;

use BadMethodCallException;

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
trait BaseResponseBuilder
{
    private static ?self $instance = null;
    protected readonly string $version;
    public readonly string $environment;
    protected ?int $timestamp = null;
    protected ?int $httpCode = null;
    protected ?string $color = null;
    protected ?array $extraData = null;

    public static function __callStatic($method, $args) {
        if (!static::$instance) {
            static::$instance = new static();
        }
        return call_user_func_array([static::$instance, $method], $args);
    }

    public function __call(string $method, array $arguments)
    {
        if (method_exists($this, $method)) {
            if (in_array($method, ["setField", "getField"])) {
                throw new BadMethodCallException("Method $method does not exist.");
            }
            return call_user_func_array([static::$instance, $method], $arguments);
        } else {
            if (str_starts_with($method, "set")) {
                return $this->setField(lcfirst(substr($method, 3)), $arguments[0]??null);
            }
            elseif (str_starts_with($method, "get")) {
                return $this->getField(strtolower(substr($method, 3)));
            }
            throw new BadMethodCallException("Method $method does not exist.");
        }
    }

    public function __construct()
    {
        $composerJson = json_decode(file_get_contents(__DIR__ . '/../../composer.json'), true);
        $this->environment = "PHP";
        $this->version = $composerJson['version'];
        $this->timestamp = time();
        $this->httpCode = 200;
    }

    private function setField(string $field, mixed $value): self
    {
        $this->$field = $value;
        return $this;
    }

    private function getField(string $field): mixed
    {
        return $this->$field;
    }
}