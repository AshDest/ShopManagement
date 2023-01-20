<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $collumns = [
        'id',
        'name',
        'email',
        'role',
        'created_at',
    ];
    public function collection()
    {
        return User::query()
            ->select($this->collumns)
            ->where('role', 'Admin')->get();
    }
    public function headings(): array
    {
        return $this->collumns;
    }
}