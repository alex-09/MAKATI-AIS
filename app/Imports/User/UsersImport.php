<?php

namespace App\Imports\User;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'surname' => $row['surname'],
            'firstname' => $row['firstname'],
            'middlename' => $row['middlename'],
            'userdesignation' => $row['userdesignation'],
            'position' => $row['position'],
            'division' => $row['division'],
            'cluster' => $row['cluster'],
            'gender' => $row['gender'],
            'birthdate' => $row['birthdate'],
            'no_bldg_street' => $row['no_bldg_street'],
            'barangay' => $row['barangay'],
            'city' => $row['city'],
            'province' => $row['province'],
            'email' => $row['emailaddress'],
            'contactnumber' => $row['contactnumber'],
            'alternative_contactnumber' => $row['alternative_contactnumber'],
            'module' => $row['module'],
        ]);
    }
}
