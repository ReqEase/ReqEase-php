<?php

namespace HichemtabTech\ReqeasePhp\Responses\Components;

enum ActionType
{
    const CLOSE = 'close';
    const REDIRECT = "redirect";
    const REFRESH = "refresh";
    const CONFIRM = "confirm";
    const CANCEL = "cancel";
    const RETRY = "retry";
    const CALL_FUNCTION = "call-function";
}
