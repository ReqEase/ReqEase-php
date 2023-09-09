<?php /** @noinspection PhpUnused */

namespace HichemtabTech\ReqeasePhp;

use HichemtabTech\ReqeasePhp\Responses\Custom\CustomResponseBuilder;
use HichemtabTech\ReqeasePhp\Responses\FieldsErrors\FieldsErrorResponseBuilder;
use HichemtabTech\ReqeasePhp\Responses\Message\MessageResponseBuilder;

class ReqEase
{
    public static function createMessageResponse(): MessageResponseBuilder
    {
        return new MessageResponseBuilder();
    }

    public static function createFieldsErrorResponse(): FieldsErrorResponseBuilder
    {
        return new FieldsErrorResponseBuilder();
    }

    public static function createCustomResponse(): CustomResponseBuilder
    {
        return new CustomResponseBuilder();
    }
}