<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ValidationService
{
    /**
     * Validate an employee Id.
     *
     * @param mixed $employeeId employeeId
     * @return int
     *
     * @throws ValidationException
     */
    public function validateEmployeeId(mixed $employeeId): int
    {
        $validator = Validator::make(['employeeId' => $employeeId], [
            'employeeId' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return intval($employeeId);
    }
}
