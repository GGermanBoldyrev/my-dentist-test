<?php

namespace App\Http\Controllers;

use App\DTO\EmployeeDTO;
use App\Http\Requests\EmployeeIdRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Services\EmployeeService;
use App\Services\ValidationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;

class EmployeeController extends Controller
{
    public function __construct(
        private readonly EmployeeService $service,
        private readonly ValidationService $validationService,
    ) {}

    public function index(): JsonResponse
    {
        $employees = $this->service->getAllEmployees();
        return response()->json($employees);
    }

    public function show($employeeId): JsonResponse
    {
        try {
            $employeeId = $this->validationService->validateEmployeeId($employeeId);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

        $employee = $this->service->getEmployeeById($employeeId);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json($employee);
    }

    public function update(UpdateEmployeeRequest $request, int $id): JsonResponse
    {
        $dto = new EmployeeDTO(
            $request->input('name'),
            $request->input('email'),
            $request->input('statusId')
        );

        $employee = $this->service->updateEmployee($id, $dto);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json($employee);
    }

    public function store(StoreEmployeeRequest $request): JsonResponse
    {
        $data = new EmployeeDTO(
            $request->input('name'),
            $request->input('email'),
            $request->input('statusId')
        );

        return response()->json($this->service->createEmployee($data), 201);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->service->deleteEmployee($id);

        if (!$deleted) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json(['message' => 'Employee deleted successfully'], 204);
    }
}
