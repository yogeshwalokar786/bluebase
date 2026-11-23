<?php

namespace App\Rules;

use App\Services\SecurityShieldService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoUrlsOrLinks implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_string($value) && SecurityShieldService::containsForbiddenUrl($value)) {
            $fail('For security and anti-spam protection, URLs, web addresses, and domain links are not allowed in the ' . str_replace('_', ' ', $attribute) . '. Please remove any links.');
        }

        if (is_string($value) && SecurityShieldService::containsMaliciousPayload($value)) {
            $fail('Suspicious characters or security risk detected in the ' . str_replace('_', ' ', $attribute) . '.');
        }
    }
}
