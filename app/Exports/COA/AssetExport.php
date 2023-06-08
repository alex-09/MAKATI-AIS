<?php

namespace App\Exports\COA;

use App\Models\COAAssets;
use App\Models\COAAssetsPrevious;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AssetExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $date;

    function __construct($date) {

            $this->date = $date;

    }

    public function collection()
    {
        return COAAssetsPrevious::where('date_effectivity', $this->date)->select(
            'account_group',
            'major_account_group',
            'sub_major_account_group',
            'general_ledger_accounts',
            'sub_ledger_accounts',
            'sub_sub_ledger_accounts',
            'account_code',
            'account_title',
            'description',
            'status',
        )->get();
    }

    public function headings(): array
    {
        return [
            'account_group',
            'major_account_group',
            'sub_major_account_group',
            'general_ledger_accounts',
            'sub_ledger_accounts',
            'sub_sub_ledger_accounts',
            'account_code',
            'account_title',
            'description',
            'status',
        ];
    }
}
