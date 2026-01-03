<?php

namespace App\Exports;

use App\Models\MasterItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MasterItemsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return MasterItem::all()->map(function ($item, $index) {
            return [
                'No' => $index + 1,
                'Nama items' => $item->nama,
                'Nama supplier' => $item->supplier,
                'Harga' => $item->harga_beli,
                'Laba' => $item->laba,
                'Harga jual' => $item->harga_beli + $item->laba,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama items',
            'Nama supplier',
            'Harga',
            'Laba',
            'Harga jual',
        ];
    }
}
