<?php

namespace App\Repositories\Contracts;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

interface EmployeeRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id);
    public function create(array $data);
    public function update(Employee $model, array $data): bool;
    public function delete(Employee $model): bool;
}
