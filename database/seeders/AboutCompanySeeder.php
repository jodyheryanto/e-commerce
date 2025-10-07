<?php

namespace Database\Seeders;

use App\Models\AboutCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleDocument = 'assets/sample-document/test.pdf';

        AboutCompany::create([
            'company_name' => 'Company Name',
            'description' => 'Description',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'instagram' => 'Instagram',
            'youtube' => 'Youtube',
            'twitter' => 'Twitter',
            'facebook' => 'Facebook',
            'privacy_policy' => $sampleDocument,
            'terms_and_conditions' => $sampleDocument,
            'sales_and_refund' => $sampleDocument,
        ]);
    }
}
