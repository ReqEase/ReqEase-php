<?php
require 'vendor/autoload.php';

use HichemtabTech\ReqeasePhp\ReqEase;
use HichemtabTech\ReqeasePhp\Responses\Components\ButtonsBuilder;
use HichemtabTech\ReqeasePhp\Responses\Message\MessageContent;
use HichemtabTech\ReqeasePhp\Responses\Message\MessageResponseType;

$response = ReqEase::createMessageResponse()
    ->setContent(
        new MessageContent(
            'Hello BOSS!',
            'Hello BOSS! How are you doing today?'
        )
    )
    ->setButtons(
        ButtonsBuilder::addCancelButton("Cancel")
        ->addRedirectButton('https://google.com')
    )
    ->setType(MessageResponseType::MODAL_BIG)
    ->setHttpCode(200)
    ->setColor('green')
    ->build();
$response->send();