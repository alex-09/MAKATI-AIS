<?php

namespace App\Imports;

use App\Imports\COA\AssetsCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class COAImport implements WithMultipleSheets
{
    /**
    * @param array $row
    *
    * @return 
    */
    public function sheets(): array
    {
        return [
            new AssetsCollection(),
            // 'coa_liabilities' => new LiabilitiesCollection(),
            // 'coa_equity' => new EquityCollection(),
            // 'coa_expenses' => new ExpensesCollection(),
            // 'coa_income' => new IncomeCollection(),
        ];
    }
}
