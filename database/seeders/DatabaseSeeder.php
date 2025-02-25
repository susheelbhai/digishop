<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $type = 1;
        if($type == 1){
            $this->call(UserGenderSeeder::class);
            $this->call(ThemeSeeder::class);
            $this->call(AdminSeeder::class);
            $this->call(PartnerSeeder::class);
            $this->call(StateSeeder::class);
            $this->call(InvoiceFormatSeeder::class);
            $this->call(InvoiceNumberFormatSeeder::class);
            $this->call(SubscriptionTypeSeeder::class);
            $this->call(BusinessOnboardApplicationSeeder::class);
            $this->call(BusinessSeeder::class);
            $this->call(UserSeeder::class);
            $this->call(BusinessEmployeeSeeder::class);
            $this->call(BusinessUserSeeder::class);
            $this->call(BusinessUserRelationSeeder::class);
            $this->call(CustomerSeeder::class);
            // $this->call(ProductSeeder::class);
            $this->call(InvoiceSettingSeeder::class);
            // $this->call(OrderSeeder::class);
            // $this->call(OrderProductSeeder::class);
            $this->call(TransactionTypeSeeder::class);
            // $this->call(PaymentSeeder::class);
            // $this->call(TransactionSeeder::class);
            $this->call(SettingSeeder::class);
        }
        else{
            $this->call(UserGenderSeeder::class);
            $this->call(ThemeSeeder::class);
            $this->call(AdminSeeder::class);
            $this->call(PartnerSeeder::class);
            $this->call(StateSeeder::class);
            $this->call(InvoiceFormatSeeder::class);
            $this->call(InvoiceNumberFormatSeeder::class);
            $this->call(SubscriptionTypeSeeder::class);
            $this->call(BusinessOnboardApplicationSeeder::class);
            $this->call(BusinessSeeder::class);
            $this->call(UserSeeder::class);
            $this->call(BusinessEmployeeSeeder::class);
            $this->call(BusinessUserSeeder::class);
            $this->call(BusinessUserRelationSeeder::class);
            $this->call(CustomerSeeder::class);
            $this->call(ProductSeeder::class);
            $this->call(InvoiceSettingSeeder::class);
            $this->call(OrderSeeder::class);
            $this->call(OrderProductSeeder::class);
            $this->call(TransactionTypeSeeder::class);
            $this->call(PaymentSeeder::class);
            $this->call(TransactionSeeder::class);
            $this->call(SettingSeeder::class);
        }

        
    }
}
