<?php

namespace App\Http\Controllers;

use App\DTO\EmployeeDTO;
use App\Services\EmployeeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(private readonly EmployeeService $service) {}

    public function store(Request $request): JsonResponse
    {
        $data = new EmployeeDTO(
            $request->input('name'),
            $request->input('email'),
            $request->input('statusId')
        );

        return response()->json($this->service->createEmployee($data));
    }
}
