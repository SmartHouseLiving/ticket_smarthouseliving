<?php

namespace Database\Seeders;

use App\Models\Header;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Header::create([
            'company_name' => 'SmartHouse Living',
            'header_badge' => 'Automation Support Portal',
            'header_title' => 'Centro de Suporte Técnico',
            'logo' => 'images/logo.png',
            'account_button_label' => 'Conta',
            'logout_button_label' => 'Logout',
            'is_active' => true,
        ]);
    }
}
