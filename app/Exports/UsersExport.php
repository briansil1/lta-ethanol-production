<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithColumnFormatting, WithMapping, WithHeadings, ShouldAutoSize
{
    use Exportable;

    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            '#',
            'Name',
            'Email',
            'Company',
            'Job Title',
            'Country',
            'Phone',
            'Creation Date'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_DATE_DATETIME
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->company,
            $user->position,
            $user->country_id,
            $user->phone,
            $user->created_at ? Date::dateTimeToExcel($user->created_at) : '-'
        ];
    }


}
