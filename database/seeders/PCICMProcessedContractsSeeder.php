<?php

namespace Database\Seeders;

use App\Models\DmContractpo;
use App\Models\PCICMProcessedContracts;
use App\Models\PCICMProcessedContractsDeliveryTerm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PCICMProcessedContractsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DmContractpo::create([
            "transaction_id" => "PT-2023-07-0000001",
            "description" => "test",
            "payee_name" => "Christian",
            "department_id" => 123,
            "amount" => 123,
            "current_bearer" => "test-04-19",
            "current_bearer_dept" => "test",
            "current_bearer_contact_number" => 123,
            "current_bearer_email" => "ffsdfdfdf",
            "status" => 1
        ]);

        DmContractpo::create([
            "transaction_id" => "PT-2023-07-0000002",
            "description" => "test",
            "payee_name" => "Waldorf",
            "department_id" => 123,
            "amount" => 123,
            "current_bearer" => "test-04-19",
            "current_bearer_dept" => "test",
            "current_bearer_contact_number" => 123,
            "current_bearer_email" => "ffsdfdfdf",
            "status" => 1
        ]);

        PCICMProcessedContracts::create([
            'transaction_id' => "PT-2023-07-0000001",
            'contract_type' => "goods",
            'contract_date' => "2023-07-18",
            'contract_amount' => 500,
            'contract_number' => "123456789",
            'procurement' => "direct procurement",
            'purchase_req_no' => "123456",
            'cost_estimate_num' => "1234567",
            'project_name' => "MAKATI",
            'payee_name' => "Christian",
            'payee_address' => "Las Pinas",
            'name_of_authorized' => "Christian",
            'payee_designation' => "not sure what to put here",
            'payee_contact_number' => "09121231234",
            'company_tin' => "000-123-234-567",
            'place_of_delivery' => "Pasay",
            'payment_terms' => "COD",
            'assign_to' => "Manalili",
            'status' => 1
        ]);

        PCICMProcessedContractsDeliveryTerm::create([
            "transaction_id" => "PT-2023-07-0000001",
            "particulars" => "particular1",
            "delivery_term" => "sample1",
            "due_date" => "2023-07-19"
        ]);

        PCICMProcessedContractsDeliveryTerm::create([
            "transaction_id" => "PT-2023-07-0000001",
            "particulars" => "particular2",
            "delivery_term" => "sample2",
            "due_date" => "2023-07-19"
        ]);

        PCICMProcessedContracts::create([
            'transaction_id' => "PT-2023-07-0000002",
            'contract_type' => "framework-agreement",
            'contract_date' => "2023-07-18",
            'contract_amount' => 500,
            'contract_number' => "123456789",
            'procurement' => "direct procurement",
            'purchase_req_no' => "123456",
            'cost_estimate_num' => "1234567",
            'project_name' => "MAKATI",
            'payee_name' => "Waldorf",
            'payee_address' => "Las Pinas",
            'name_of_authorized' => "Christian",
            'payee_designation' => "not sure what to put here",
            'payee_contact_number' => "09121231234",
            'company_tin' => "000-123-234-567",
            'place_of_delivery' => "Pasay",
            'payment_terms' => "COD",
            'assign_to' => "Manalili",
            'status' => 1
        ]);

        PCICMProcessedContractsDeliveryTerm::create([
            "transaction_id" => "PT-2023-07-0000002",
            "particulars" => "particular3",
            "delivery_term" => "sample3",
            "due_date" => "2023-07-19"
        ]);

        PCICMProcessedContractsDeliveryTerm::create([
            "transaction_id" => "PT-2023-07-0000002",
            "particulars" => "particular4",
            "delivery_term" => "sample4",
            "due_date" => "2023-07-19"
        ]);

        PCICMProcessedContracts::create([
            'transaction_id' => "PT-2023-07-0000003",
            'contract_type' => "ordering-agreement",
            'contract_date' => "2023-07-18",
            'contract_amount' => 500,
            'contract_number' => "123456789",
            'procurement' => "direct procurement",
            'purchase_req_no' => "123456",
            'cost_estimate_num' => "1234567",
            'project_name' => "MAKATI",
            'payee_name' => "Waldorf",
            'payee_address' => "Las Pinas",
            'name_of_authorized' => "Christian",
            'payee_designation' => "not sure what to put here",
            'payee_contact_number' => "09121231234",
            'company_tin' => "000-123-234-567",
            'place_of_delivery' => "Pasay",
            'payment_terms' => "COD",
            'assign_to' => "Manalili",
            'status' => 1
        ]);

        PCICMProcessedContracts::create([
            'transaction_id' => "PT-2023-07-0000004",
            'contract_type' => "services",
            'contract_date' => "2023-07-18",
            'contract_amount' => 500,
            'contract_number' => "123456789",
            'procurement' => "direct procurement",
            'purchase_req_no' => "123456",
            'cost_estimate_num' => "1234567",
            'project_name' => "MAKATI",
            'payee_name' => "TestForServices",
            'payee_address' => "Las Pinas",
            'name_of_authorized' => "Christian",
            'payee_designation' => "not sure what to put here",
            'payee_contact_number' => "09121231234",
            'company_tin' => "000-123-234-567",
            'place_of_delivery' => "Pasay",
            'payment_terms' => "COD",
            'assign_to' => "Waldorf",
            'status' => 1
        ]);
    }
}
