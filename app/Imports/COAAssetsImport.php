<?php

namespace App\Imports;

use App\Models\COAAssets;
use Maatwebsite\Excel\Concerns\ToModel;

class COAAssetsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new COAAssets([
            
            'account_group' => $row[0],
            'major_account_group' => $row[1],
            'sub_major_account_group' => $row[2],
            'general_ledger_accounts' => $row[3],
            'sub_ledger_accounts' => $row[4],
            'sub_sub_ledger_accounts' => $row[5],
            'account_code' => $row[6],
            'account_title' => $row[7],
            'description' => $row[8],
            'status' => $row[9],
            'date_effectivity' => $row[10],

        ]);
    }
}
