<?php

namespace Vroom\Validation;

class Validation
{
    protected const RULE_REQUIRED = 'required';

    private array $rules;
    private array $body;
    public array $errors = [];

    public function __construct(array $body, array|string $rules)
    {
        $this->rules = $rules;
        $this->body = $body;
    }

    public function validate()
    {
        foreach ($this->rules as $attribute => $rules) {
            if (! in_array($attribute, array_keys($this->body))) {
                echo "There is no field $attribute";
                exit();
            }

            foreach ($rules as $rule) {
                match ($rule) {
                    self::RULE_REQUIRED => $this->checkRequired($attribute)
                };
            }
        }

        return empty($this->errors);
    }

    private function checkRequired($attribute)
    {
        if (! $this->body[$attribute]) {
            $this->addErrorForRule($attribute, self::RULE_REQUIRED);
        }
    }

    private function addErrorForRule(string $attribute, string $ruleName, $params = [])
    {
        $message = $this->errorMessages()[$ruleName] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }

        $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
	{
		return [
			self::RULE_REQUIRED => 'This field is required',
		];
	}
}
