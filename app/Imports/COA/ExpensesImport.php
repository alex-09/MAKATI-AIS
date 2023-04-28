<?php

namespace App\Imports\COA;

use App\Models\COAExpenses;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExpensesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new COAExpenses([
            'account_group' => $row['account_group'],
            'major_account_group' => $row['major_account_group'],
            'sub_major_account_group' => $row['sub_major_account_group'],
            'general_ledger_accounts' => $row['general_ledger_accounts'],
            'sub_ledger_accounts' => $row['sub_ledger_accounts'],
            'sub_sub_ledger_accounts' => $row['sub_sub_ledger_accounts'],
            'account_code' => $row['account_code'],
            'account_title' => $row['account_title'],
            'description' => $row['description'],
            'status' => $row['status'],
            'date_effect_index' => $row['date_effect_index'],
            'date_effectivity' => $row['date_effectivity'],
            'coa_title' => $row['coa_title']
        ]);
    }

    public function rules(): array
    {
        return [
            'date_effect_index' => 'nullable|sometimes|unique:coa_expenses,date_effect_index',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'date_effect_index' => 'Effectivity date already exist in the previous effectivity dates',
        ];
    }
}
