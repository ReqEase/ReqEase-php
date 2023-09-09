<?php /** @noinspection PhpUnused */

namespace HichemtabTech\ReqeasePhp\Responses\Custom;

use HichemtabTech\ReqeasePhp\Responses\BaseResponseBuilder;
use HichemtabTech\ReqeasePhp\Responses\Components\ButtonsAdder;

class CustomResponseBuilder
{
    use BaseResponseBuilder, ButtonsAdder;

    private ?string $label;

    /**
     * @param string|null $label
     * @return CustomResponseBuilder
     */
    public function setLabel(?string $label): CustomResponseBuilder
    {
        $this->label = $label;
        return $this;
    }

    public function build(): CustomResponse
    {
        return new CustomResponse(
            $this->version, $this->environment, $this->timestamp, $this->httpCode, $this->color, $this->extraData,
            $this->label);
    }
}