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
        $type = 2;
        if($type == 1){
            $this->call(UserGenderSeeder::class);
            $this->call(ThemeSeeder::class);
            $this->call(AdminSeeder::class);
            // $this->call(PartnerSeeder::class);
            $this->call(TaxTypeSeeder::class);
            $this->call(StateSeeder::class);
            $this->call(InvoiceFormatSeeder::class);
            $this->call(InvoiceNumberFormatSeeder::class);
            $this->call(SubscriptionTypeSeeder::class);
            // $this->call(BusinessOnboardApplicationSeeder::class);
            // $this->call(BusinessSeeder::class);
            // $this->call(BusinessDataChangeSeeder::class);
            // $this->call(BusinessEmployeeSeeder::class);
            // $this->call(BusinessOwnerSeeder::class);
            // $this->call(BusinessUserRelationSeeder::class);
            // $this->call(CustomerSeeder::class);
            // $this->call(ProductSeeder::class);
            // $this->call(InventorySeeder::class);
            // $this->call(InvoiceSettingSeeder::class);
            // $this->call(OrderSeeder::class);
            // $this->call(OrderProductSeeder::class);
            $this->call(TransactionTypeSeeder::class);
            // $this->call(PaymentSeeder::class);
            // $this->call(TransactionSeeder::class);
            $this->call(SettingSeeder::class);
            // $this->call(TicketTypeSeeder::class);
            // $this->call(TicketTitleSeeder::class);
            // $this->call(TicketSeeder::class);
            // $this->call(TicketProcessSeeder::class);
            // $this->call(MediaSeeder::class);
        }
        else{
            $this->call(UserGenderSeeder::class);
            $this->call(ThemeSeeder::class);
            $this->call(AdminSeeder::class);
            $this->call(PartnerSeeder::class);
            $this->call(TaxTypeSeeder::class);
            $this->call(StateSeeder::class);
            $this->call(InvoiceFormatSeeder::class);
            $this->call(InvoiceNumberFormatSeeder::class);
            $this->call(SubscriptionTypeSeeder::class);
            $this->call(BusinessOnboardApplicationSeeder::class);
            $this->call(BusinessSeeder::class);
            $this->call(BusinessDataChangeSeeder::class);
            $this->call(BusinessEmployeeSeeder::class);
            $this->call(BusinessOwnerSeeder::class);
            $this->call(BusinessUserRelationSeeder::class);
            $this->call(CustomerSeeder::class);
            $this->call(ProductSeeder::class);
            $this->call(SettingProductSeeder::class);
            $this->call(InvoiceSettingSeeder::class);
            $this->call(OrderSeeder::class);
            $this->call(OrderProductSeeder::class);
            $this->call(WarehouseSeeder::class);
            $this->call(WarehouseRackSeeder::class);
            $this->call(InventorySeeder::class);
            $this->call(TransactionTypeSeeder::class);
            $this->call(PaymentSeeder::class);
            $this->call(TransactionSeeder::class);
            $this->call(SettingSeeder::class);
            $this->call(TicketTypeSeeder::class);
            $this->call(TicketTitleSeeder::class);
            $this->call(TicketSeeder::class);
            $this->call(TicketProcessSeeder::class);
            $this->call(MediaSeeder::class);
            $this->call(SessionSeeder::class);
        }

        
    }
}
