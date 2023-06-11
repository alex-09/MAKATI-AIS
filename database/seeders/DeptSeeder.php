<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'department_name' => 'Accounting Department',
            'department_code' => '1081',
            'department_head' => 'William B. Dayrit',
            'designation' => 'City Accountant'
        ]);

        Department::create([
            'department_name' => 'Assessment Department',
            'department_code' => '1101',
            'department_head' => 'Atty. Maribert Q. Pagente',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => 'Budget Department',
            'department_code' => '1071',
            'department_head' => 'Aileen M. Soriano',
            'designation' => 'City Budget Officer'
        ]);

        Department::create([
            'department_name' => 'Business Permit Office',
            'department_code' => '1015',
            'department_head' => 'Atty. Maribert Q. Pagente',
            'designation' => 'City Licensing Officer'
        ]);

        Department::create([
            'department_name' => "City Administrator's Office",
            'department_code' => '1031',
            'department_head' => 'Atty Claro F. Certeza',
            'designation' => 'City Administrator'
        ]);

        Department::create([
            'department_name' => "City Building Official",
            'department_code' => '8756',
            'department_head' => 'Engr. Elmer V. Acuesta, MPA',
            'designation' => 'City Building Official'
        ]);

        Department::create([
            'department_name' => "Civil Registration Office",
            'department_code' => '1051',
            'department_head' => 'Atty Rene Richard A. Salazar',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "Department of Engineering & Public Works",
            'department_code' => '8751',
            'department_head' => 'Engr. Elmer V. Acuesta, MPA',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "Department of Environmental Services",
            'department_code' => '8731',
            'department_head' => 'Augusto R. Delos Santos',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
        'department_name' => "Dissater Risk Reduction and Management Office",
            'department_code' => 'DRRMO',
            'department_head' => 'Richard Raymund R. Rodriguez',
            'designation' => 'Disaster Risk Reduction Management Officer'
        ]);

        Department::create([
            'department_name' => "Economic Enterprise Management Office",
            'department_code' => '8853',
            'department_head' => 'Ma. Katherina C. Mangahas',
            'designation' => 'OIC & Concurrently City Veterinarian'
        ]);

        Department::create([
            'department_name' => "Education Department",
            'department_code' => '3311',
            'department_head' => 'Leni C. Fermin',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "Finance Department",
            'department_code' => '1091',
            'department_head' => 'Jesusa E. Cuneta',
            'designation' => 'City Treasurer'
        ]);

        Department::create([
            'department_name' => "General Services Department",
            'department_code' => '1061',
            'department_head' => 'Arnold C. Magpantay',
            'designation' => 'City General Service officer'
        ]);

        Department::create([
            'department_name' => "Human Resource Development Office",
            'department_code' => '1032',
            'department_head' => 'Atty. Neil-San G. Patag',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "Information & Community Relations Department",
            'department_code' => '1020',
            'department_head' => 'Romulo S.J Salagado Jr.',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "Internal Audit Services",
            'department_code' => '1019',
            'department_head' => 'Atty. Neil-San G. Patag',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "International Relations Department",
            'department_code' => '1018',
            'department_head' => 'Maria Concepcion M. Yabut',
            'designation' => 'City Government Department Head II'
        ]);

        Department::create([
            'department_name' => "Law Departmnet",
            'department_code' => '1131',
            'department_head' => 'Atty. Michael Arthur R. Camiña',
            'designation' => 'City Attorney'
        ]);

        Department::create([
            'department_name' => "Liga ng mga Barangay",
            'department_code' => '1014',
            'department_head' => 'Maribel F. Vitales',
            'designation' => 'President, Liga ng mga Barangay'
        ]);

        Department::create([
            'department_name' => "Makati Action Center",
            'department_code' => '1993',
            'department_head' => 'Arleen R. Pangilinan',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "Makati Cooperative Development Office",
            'department_code' => '8761',
            'department_head' => 'Vivian D. Gabriel',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "Makati Health Department",
            'department_code' => '4411',
            'department_head' => 'Dr. Vergel P. Binayl',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "Makati Social Welfare Department",
            'department_code' => '7611',
            'department_head' => "Maribel M. Lumang",
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "Museum and Cultural Affairs Office",
            'department_code' => '8852',
            'department_head' => 'Maria Concepcion M. Yabut',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "Office of the Mayor",
            'department_code' => '1011',
            'department_head' => 'Atty Claro F. Certeza',
            'designation' => 'City Administrator'
        ]);

        Department::create([
            'department_name' => "Office of the Secretary",
            'department_code' => '1022',
            'department_head' => 'Atty. Dindo R. Cervantes',
            'designation' => 'Secretary to the Sangguniang Panlungsod'
        ]);

        Department::create([
            'department_name' => "Office of the Vice Mayor",
            'department_code' => '1016',
            'department_head' => 'Hon. Monique Yazmin Maria Q. Lagdameo',
            'designation' => 'City Vice-Mayor'
        ]);

        Department::create([
            'department_name' => "Ospital ng Makati",
            'department_code' => '4421',
            'department_head' => 'Dr. Vergel P. Binay',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "Public Employment Service Office",
            'department_code' => '5999',
            'department_head' => 'Josephine C. Camata-Copada',
            'designation' => 'Officer-in-Charge'
        ]);

        Department::create([
            'department_name' => "Public Safety Department",
            'department_code' => '1013',
            'department_head' => 'Atty Claro F. Certeza',
            'designation' => 'OI & Concurrently City Administrator'
        ]);

        Department::create([
            'department_name' => "Sangguniang Panlungsod",
            'department_code' => '1021',
            'department_head' => 'Hon. Monique Yazmin Maria Q. Lagdameo',
            'designation' => 'City Vice-Mayor'
        ]);

        Department::create([
            'department_name' => "University of Makati",
            'department_code' => '3323',
            'department_head' => 'Engr. Luke Ivan B. Moro',
            'designation' => 'Vice President for Finance'
        ]);

        Department::create([
            'department_name' => "Urban Development Department",
            'department_code' => '1041',
            'department_head' => 'Engr. Merlina G. Panganiban',
            'designation' => 'City Government Department Head II'
        ]);

        Department::create([
            'department_name' => "Veterinary Services Department",
            'department_code' => '8721',
            'department_head' => 'Ma. Katherina C. Mangahas',
            'designation' => 'City Veterinarian'
        ]);
        
        Department::create([
            'department_name' => "Youth and Sports Development Department",
            'department_code' => '3361',
            'department_head' => 'Arleen R. Pangilinan',
            'designation' => 'City Government Department Head II'
        ]);

        Department::create([
            'department_name' => "Bids and Awards Committee",
            'department_code' => 'Trust Fund',
            'department_head' => 'Aileen M. Soriano',
            'designation' => 'Head, BAC Secretariat Office & Concurrently City Budget Officer'
        ]);

        Department::create([
            'department_name' => "Department of Education, School Division Office",
            'department_code' => '3311',
            'department_head' => 'Dr. Maria Magdalena M. Lim, CESO V',
            'designation' => 'Schools Division Superintendent'
        ]);

        Department::create([
            'department_name' => "Others",
            'department_code' => '0001',
            'department_head' => 'N/A',
            'designation' => 'N/A'
        ]);
    }
}
