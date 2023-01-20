<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class TotoExport extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
        // return Excel::download(new UsersExport, 'invoices.csv', \Maatwebsite\Excel\Excel::CSV);
        // return Excel::download(new UsersExport, 'invoices.pdf', \Maatwebsite\Excel\Excel::MPDF);
    }
}