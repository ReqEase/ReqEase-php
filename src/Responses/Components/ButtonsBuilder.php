<?php /** @noinspection PhpUnusedPrivateMethodInspection */

/** @noinspection PhpSameParameterValueInspection */

namespace HichemtabTech\ReqeasePhp\Responses\Components;

use BadMethodCallException;
use HichemtabTech\ReqeasePhp\Responses\Components\Buttons\CallFunctionActionButton;
use HichemtabTech\ReqeasePhp\Responses\Components\Buttons\CancelActionButton;
use HichemtabTech\ReqeasePhp\Responses\Components\Buttons\CloseActionButton;
use HichemtabTech\ReqeasePhp\Responses\Components\Buttons\ConfirmActionButton;
use HichemtabTech\ReqeasePhp\Responses\Components\Buttons\RedirectActionButton;
use HichemtabTech\ReqeasePhp\Responses\Components\Buttons\RefreshActionButton;
use HichemtabTech\ReqeasePhp\Responses\Components\Buttons\RetryActionButton;

/**
 * @method ButtonsBuilder addCloseButton(string $text = null, string $color = null)
 * @method ButtonsBuilder addCancelButton(string $text = null, string $color = null)
 * @method ButtonsBuilder addConfirmButton(string $text = null, string $color = null)
 * @method ButtonsBuilder addRedirectButton(string $url, string $text = null, string $color = null)
 * @method ButtonsBuilder addRefreshButton(string $text = null, string $color = null)
 * @method ButtonsBuilder addRetryButton(string $text = null, string $color = null)
 * @method ButtonsBuilder addCallFunctionButton(string $functionName, string $text = null, string $color = null)
 * @method ButtonsBuilder addCustomButton(string $actionType, array $buttonData)
 *
 * now add them all but with static methods
 * @method static ButtonsBuilder addCloseButton(string $text = null, string $color = null)
 * @method static ButtonsBuilder addCancelButton(string $text = null, string $color = null)
 * @method static ButtonsBuilder addConfirmButton(string $text = null, string $color = null)
 * @method static ButtonsBuilder addRedirectButton(string $url, string $text = null, string $color = null)
 * @method static ButtonsBuilder addRefreshButton(string $text = null, string $color = null)
 * @method static ButtonsBuilder addRetryButton(string $text = null, string $color = null)
 * @method static ButtonsBuilder addCallFunctionButton(string $functionName, string $text = null, string $color = null)
 * @method static ButtonsBuilder addCustomButton(string $actionType, array $buttonData)
 */
class ButtonsBuilder
{
    private static ?self $instance = null;
    private array $buttons = [];

    private function __addCloseButton(string $text = null, string $color = null): ButtonsBuilder
    {
        $this->buttons[] = new CloseActionButton($text, $color);
        return $this;
    }

    private function __addCancelButton(string $text = null, string $color = null): ButtonsBuilder
    {
        $this->buttons[] = new CancelActionButton($text, $color);
        return $this;
    }

    private function __addConfirmButton(string $text = null, string $color = null): ButtonsBuilder
    {
        $this->buttons[] = new ConfirmActionButton($text, $color);
        return $this;
    }

    private function __addRedirectButton(string $url, string $text = null, string $color = null): ButtonsBuilder
    {
        $this->buttons[] = new RedirectActionButton($url, $text, $color);
        return $this;
    }

    private function __addRefreshButton(string $text = null, string $color = null): ButtonsBuilder
    {
        $this->buttons[] = new RefreshActionButton($text, $color);
        return $this;
    }

    private function __addRetryButton(string $text = null, string $color = null): ButtonsBuilder
    {
        $this->buttons[] = new RetryActionButton($text, $color);
        return $this;
    }

    private function __addCallFunctionButton(string $functionName, string $text = null, string $color = null): ButtonsBuilder
    {
        $this->buttons[] = new CallFunctionActionButton($functionName, $text, $color);
        return $this;
    }

    private function __addCustomButton(string $actionType, array $buttonData): ButtonsBuilder
    {
        $this->buttons[] = array_merge($buttonData, ['action_type' => $actionType]);
        return $this;
    }
    public static function __callStatic($method, $args) {
        if (!static::$instance) {
            static::$instance = new static();
        }
        return call_user_func_array([static::$instance, $method], $args);
    }

    public function __call(string $method, array $arguments)
    {
        if (method_exists($this, $method)) {
            return call_user_func_array([static::$instance, $method], $arguments);
        } elseif (method_exists($this, "__".$method)) {
            return call_user_func_array([static::$instance, "__".$method], $arguments);
        } else {
                throw new BadMethodCallException("Method $method does not exist.");
            }
        }

    public function build(): array
    {
        return $this->buttons;
    }
}