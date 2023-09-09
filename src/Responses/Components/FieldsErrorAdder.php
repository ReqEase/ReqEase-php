<?php

namespace HichemtabTech\ReqeasePhp\Responses\Components;

trait FieldsErrorAdder
{
    protected array $fieldsErrors = [];
    public function setFieldsErrors(FieldsErrorsBuilder|array $fieldsErrorsBuilder): static
    {
        if (is_array($fieldsErrorsBuilder)) {
            $this->fieldsErrors = $fieldsErrorsBuilder;
        }
        else{
            $this->fieldsErrors = $fieldsErrorsBuilder->build();
        }
        return $this;
    }
}