<?php

namespace HichemtabTech\ReqeasePhp\Responses\Components;

class FieldsErrorsBuilder
{
    protected array $fieldsErrors = [];

    public function addFieldError(string $field, string $message): static
    {
        $this->fieldsErrors = array_merge($this->fieldsErrors, [$field => $message]);
        return $this;
    }

    public function build(): array
    {
        return $this->fieldsErrors;
    }

}