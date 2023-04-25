<?php

namespace App\Exports\COA;

use App\Models\COAIncome;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IncomeExport implements FromCollection, WithHeadings
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
        return COAIncome::where('date_effectivity', $this->date)->select(
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
            'date_effectivity',
            'coa_title'
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
            'date_effectivity',
            'coa_title'
        ];
    }
}
