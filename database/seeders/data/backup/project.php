<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 5.2.1
 */

use Illuminate\Support\Facades\Hash;

/**
 * Database `digishop2`
 */

/* `digishop2`.`admins` */
$admins = array(
  array('id' => '1','created_at' => '2023-12-24 12:42:32','updated_at' => '2024-03-26 10:04:05','name' => 'Susheel Kumar Singh','email' => 'admin@gmail.com','phone' => '9090653356','designation' => 'Super Admin','profile_pic' => '6602503de227b.png','email_verified_at' => '2023-12-24 12:42:32','password' => '$2y$12$QTx.fLEBOLYyfLUynp0bPutER4BGaGzpxBy8QVBBjLtc9jfOA9otm','gender_id' => '1','theme_id' => '1','color1' => '1','color2' => '1','color3' => '1','remember_token' => 'kOjA4nORtYQpOR2lBFb4HddpA9zR5o2J9AXMafLWaMIOIn3m6rvgXrWybSxW')
);

/* `digishop2`.`businesses` */
$businesses = array(
  array('id' => '11','created_at' => '2024-03-29 14:49:57','updated_at' => '2024-03-29 14:49:57','name' => 'The forgotten explorer','email' => 'shivamkumar6207172063@gmail.com','phone' => '06207172063','address' => 'Pwd colony','city' => 'Purnia','pin' => '854301','state_id' => '10','logo' => '','gst_number' => '654654467f77hh','gst_certificate' => 'business/documents/2/yPDNiB8QG1BWMNc5nCii52Xv4Uc9T8cG8JqIPcuz.jpg','registration_number' => NULL,'registration_certificate' => '','iec_code' => NULL,'ad_code' => NULL,'arn_code' => NULL,'bank_name' => NULL,'bank_ifsc' => NULL,'bank_swift' => NULL,'bank_account_number' => NULL,'bank_account_holder_name' => NULL,'payment_terms' => NULL,'partner_id' => '6','admin_id' => NULL,'approved_by' => '1','business_onboard_application_id' => '2','authorised_sign' => '','authorised_stamp' => '','invoice_start_id' => '1','subscription_type_id' => '1'),
  array('id' => '12','created_at' => '2024-03-31 23:03:18','updated_at' => '2024-03-31 23:03:18','name' => 'Brody Bell','email' => 'jijytufim@mailinator.com','phone' => '+1 (445) 684-9281','address' => 'Minim sint mollitia','city' => 'Recusandae Eius est','pin' => '28','state_id' => '10','logo' => '','gst_number' => '935','gst_certificate' => 'business/documents/4/CqUOP1nPcBHpUpF0y9iFd86P9PgHruOfzbUSc9Rr.png','registration_number' => '685','registration_certificate' => '','iec_code' => 'Dolores est in conse','ad_code' => 'Iusto eaque eius nes','arn_code' => 'Nulla sed nihil quos','bank_name' => NULL,'bank_ifsc' => 'SBIN0002322','bank_swift' => 'Rem quisquam non obc','bank_account_number' => '862','bank_account_holder_name' => 'Chiquita Alvarez','payment_terms' => 'Voluptatem dolor dol','partner_id' => '7','admin_id' => NULL,'approved_by' => '1','business_onboard_application_id' => '4','authorised_sign' => '','authorised_stamp' => '','invoice_start_id' => '1','subscription_type_id' => '1')
);

/* `digishop2`.`business_data_changes` */
$business_data_changes = array(
  array('id' => '1','name' => 'Male','email' => 'test@example.com', 'password'=> Hash::make('password'))
);

/* `digishop2`.`business_onboard_applications` */
$business_onboard_applications = array(
  array('id' => '1','created_at' => '2024-03-29 14:42:31','updated_at' => '2024-03-29 14:46:53','name' => '7th heaven','email' => NULL,'phone' => '06207172063','address' => 'Pwd colony','city' => 'Purnia','pin' => '854301','state_id' => '10','logo' => '','gst_number' => '9687687687ytty78','gst_certificate' => 'business/documents/1/bLkopLGb3z82V8WZgZmGxiXJ8KjM6enAGePcHtB8.jpg','registration_number' => '465577787965','registration_certificate' => '','iec_code' => NULL,'ad_code' => NULL,'arn_code' => NULL,'owner_name' => 'kumar','owner_phone' => '266131346','owner_email' => 'shiv@gmail.com','owner_photo' => 'images/profile_pic/user/dummy.png','bank_name' => NULL,'bank_ifsc' => NULL,'bank_swift' => NULL,'bank_account_number' => NULL,'bank_account_holder_name' => NULL,'payment_terms' => NULL,'partner_id' => '6','admin_id' => NULL,'approved_at' => NULL,'rejected_at' => '2024-03-29 14:46:53','authorised_sign' => '','authorised_stamp' => '','subscription_type_id' => '1'),
  array('id' => '2','created_at' => '2024-03-29 14:49:16','updated_at' => '2024-03-29 14:50:02','name' => 'The forgotten explorer','email' => 'shivamkumar6207172063@gmail.com','phone' => '06207172063','address' => 'Pwd colony','city' => 'Purnia','pin' => '854301','state_id' => '10','logo' => '','gst_number' => '654654467f77hh','gst_certificate' => 'business/documents/2/yPDNiB8QG1BWMNc5nCii52Xv4Uc9T8cG8JqIPcuz.jpg','registration_number' => NULL,'registration_certificate' => '','iec_code' => NULL,'ad_code' => NULL,'arn_code' => NULL,'owner_name' => 'abc','owner_phone' => '06207172063','owner_email' => 'shivamkumar6207172063@gmail.com','owner_photo' => 'images/profile_pic/user/dummy.png','bank_name' => NULL,'bank_ifsc' => NULL,'bank_swift' => NULL,'bank_account_number' => NULL,'bank_account_holder_name' => NULL,'payment_terms' => NULL,'partner_id' => '6','admin_id' => NULL,'approved_at' => '2024-03-29 14:50:02','rejected_at' => NULL,'authorised_sign' => '','authorised_stamp' => '','subscription_type_id' => '1'),
  array('id' => '3','created_at' => '2024-03-29 14:56:07','updated_at' => '2024-03-29 14:56:51','name' => '99moile','email' => 'shivamkumar6207172063@gmail.com','phone' => '06207172063','address' => 'Pwd colony','city' => 'Purnia','pin' => '854301','state_id' => '10','logo' => '','gst_number' => '9687687687ytty78','gst_certificate' => 'business/documents/3/Wh1Um3I16vT2ON8PqZJIygIqU4Qi17hRAlx30qP2.jpg','registration_number' => NULL,'registration_certificate' => '','iec_code' => NULL,'ad_code' => NULL,'arn_code' => NULL,'owner_name' => 'abcd','owner_phone' => '65464315','owner_email' => 'cbhjdsbhshj@gmaol.com','owner_photo' => 'images/profile_pic/user/dummy.png','bank_name' => NULL,'bank_ifsc' => NULL,'bank_swift' => NULL,'bank_account_number' => NULL,'bank_account_holder_name' => NULL,'payment_terms' => NULL,'partner_id' => '6','admin_id' => NULL,'approved_at' => NULL,'rejected_at' => '2024-03-29 14:56:51','authorised_sign' => '','authorised_stamp' => '','subscription_type_id' => '1'),
  array('id' => '4','created_at' => '2024-03-31 23:02:39','updated_at' => '2024-03-31 23:03:18','name' => 'Brody Bell','email' => 'jijytufim@mailinator.com','phone' => '+1 (445) 684-9281','address' => 'Minim sint mollitia','city' => 'Recusandae Eius est','pin' => '28','state_id' => '24','logo' => '','gst_number' => '935','gst_certificate' => 'business/documents/4/CqUOP1nPcBHpUpF0y9iFd86P9PgHruOfzbUSc9Rr.png','registration_number' => '685','registration_certificate' => '','iec_code' => 'Dolores est in conse','ad_code' => 'Iusto eaque eius nes','arn_code' => 'Nulla sed nihil quos','owner_name' => 'Yoshio Morton','owner_phone' => '+1 (394) 587-5075','owner_email' => 'user1@gmail.com','owner_photo' => 'images/profile_pic/user/dummy.png','bank_name' => NULL,'bank_ifsc' => 'SBIN0002322','bank_swift' => 'Rem quisquam non obc','bank_account_number' => '862','bank_account_holder_name' => 'Chiquita Alvarez','payment_terms' => 'Voluptatem dolor dol','partner_id' => '7','admin_id' => NULL,'approved_at' => '2024-03-31 23:03:18','rejected_at' => NULL,'authorised_sign' => '','authorised_stamp' => '','subscription_type_id' => '1')
);

/* `digishop2`.`business_users` */
$business_users = array(
  array('id' => '1','created_at' => '2024-03-29 14:49:58','updated_at' => '2024-03-31 09:52:25','business_id' => '11','name' => 'abc','email' => 'test@example.com','phone' => '6207172063','designation' => NULL,'profile_pic' => 'images/profile_pic/user/6608e50185d43.jpeg','email_verified_at' => NULL,'password' => Hash::make('password'),'gender_id' => '1','theme_id' => '1','color1' => '1','color2' => '1','color3' => '1','remember_token' => NULL),
  array('id' => '12','created_at' => '2024-03-31 23:03:18','updated_at' => '2024-03-31 23:13:55','business_id' => '12','name' => 'Yoshio Morton','email' => 'user1@gmail.com','phone' => '+1 (394) 587-5075','designation' => NULL,'profile_pic' => 'images/profile_pic/user/dummy.png','email_verified_at' => NULL,'password' => '$2y$12$9.1PW4u7c9q8eY87E5NE9.Yu2Q/Ungy5IMDmUEFHS0jW0LDcLw26m','gender_id' => '1','theme_id' => '1','color1' => '1','color2' => '1','color3' => '1','remember_token' => '781cqQkcuD7JWJCubVQXP0c4aaQ4pV1973gH1vZoYRP07q0q8ymtdscOdaVr')
);

/* `digishop2`.`cache` */
$cache = array(
);

/* `digishop2`.`cache_locks` */
$cache_locks = array(
);

/* `digishop2`.`customers` */
$customers = array(
  array('id' => '3','created_at' => '2024-03-29 20:21:52','updated_at' => '2024-03-29 20:21:52','gender_id' => '1','business_id' => '11','name' => 'Shivam Kumar','gstin' => '','email' => 'shivamkumar6207172063@gmail.com','phone' => '6207172063','address' => 'Pwd colony','city' => 'Purnia','pin' => '854301','state_id' => '10'),
  array('id' => '4','created_at' => '2024-03-31 08:52:40','updated_at' => '2024-03-31 08:52:40','gender_id' => '1','business_id' => '11','name' => 'Shivam Kumar','gstin' => '','email' => 'shivamkumar6207172063@gmail.com','phone' => '06207172063','address' => 'Pwd colony','city' => 'Purnia','pin' => '','state_id' => '10'),
  array('id' => '8','created_at' => '2024-03-31 09:42:08','updated_at' => '2024-03-31 09:42:08','gender_id' => '1','business_id' => '11','name' => 'Shivam Kumar','gstin' => '','email' => '','phone' => '6201722842','address' => '','city' => '','pin' => '','state_id' => '10'),
  array('id' => '9','created_at' => '2024-03-31 09:51:52','updated_at' => '2024-03-31 09:51:52','gender_id' => '1','business_id' => '11','name' => 'Shivam Kumar','gstin' => '','email' => '','phone' => '6202722842','address' => '','city' => '','pin' => '','state_id' => '10'),
  array('id' => '10','created_at' => '2024-03-31 23:51:06','updated_at' => '2024-03-31 23:51:06','gender_id' => '1','business_id' => '12','name' => 'Susheel Kumar Singh','gstin' => '07AAICD5565A1ZT','email' => 'susheelkrsingh306@gmail.com','phone' => '9090653356','address' => 'vill- pandh, post- chakbahauddin, district- samastipur','city' => 'dalsingh sarai','pin' => '','state_id' => '10')
);

/* `digishop2`.`failed_jobs` */
$failed_jobs = array(
);

/* `digishop2`.`important_links` */
$important_links = array(
);

/* `digishop2`.`invoices` */
$invoices = array(
);

/* `digishop2`.`invoice_formats` */
$invoice_formats = array(
  array('id' => '1','created_at' => NULL,'updated_at' => '2024-04-01 00:02:09','slug' => 'format1','name' => 'Theme 1','image' => '/images/invoice_sample/6609ac29f0479.png','pdf' => NULL),
  array('id' => '2','created_at' => '2024-04-01 00:02:37','updated_at' => '2024-04-01 00:02:37','slug' => 'format2','name' => 'Format 2','image' => '/images/invoice_sample/6609ac459ed1b.png','pdf' => NULL),
  array('id' => '3','created_at' => '2024-04-01 00:02:57','updated_at' => '2024-04-01 00:02:57','slug' => 'format3','name' => 'Format 3','image' => '/images/invoice_sample/6609ac59a4cd2.png','pdf' => NULL),
  array('id' => '4','created_at' => '2024-04-01 00:03:17','updated_at' => '2024-04-01 00:03:17','slug' => 'format4','name' => 'Format 4','image' => '/images/invoice_sample/6609ac6dcba58.png','pdf' => NULL)
);

/* `digishop2`.`invoice_number_formats` */
$invoice_number_formats = array(
  array('id' => '1','created_at' => NULL,'updated_at' => '2024-03-31 23:52:13','slug' => 'format1','name' => 'Format 1','sample1' => '1','sample2' => '2','sample3' => '3','explanation' => NULL),
  array('id' => '2','created_at' => NULL,'updated_at' => '2024-03-31 23:56:04','slug' => 'format2','name' => 'Format 2','sample1' => '2324000001','sample2' => '2324000002','sample3' => '2324000003','explanation' => NULL),
  array('id' => '3','created_at' => NULL,'updated_at' => '2024-03-31 23:57:07','slug' => 'format3','name' => 'Format 3','sample1' => 'BR000001','sample2' => 'BR000002','sample3' => 'BR000003','explanation' => NULL),
  array('id' => '4','created_at' => NULL,'updated_at' => '2024-03-31 23:58:06','slug' => 'format4','name' => 'Format 4','sample1' => 'BR2324000001','sample2' => 'BR2324000002','sample3' => 'BR2324000003','explanation' => NULL),
  array('id' => '5','created_at' => NULL,'updated_at' => '2024-04-01 00:01:24','slug' => 'format5','name' => 'Format 5','sample1' => 'BR202425000001','sample2' => 'BR202425000002','sample3' => 'BR202425000003','explanation' => NULL)
);

/* `digishop2`.`invoice_settings` */
$invoice_settings = array(
  array('id' => '11','created_at' => '2024-03-29 14:49:58','updated_at' => '2024-03-29 14:49:58','business_id' => '11','invoice_format_id' => '1','invoice_number_format_id' => '1','authorised_sign' => '1','authorised_stamp' => '1','bank_detail' => '1','pan' => '1','gstin' => '1','payment_terms' => '1','amount_in_words' => '1'),
  array('id' => '12','created_at' => '2024-03-31 23:03:18','updated_at' => '2024-03-31 23:58:15','business_id' => '12','invoice_format_id' => '1','invoice_number_format_id' => '5','authorised_sign' => '1','authorised_stamp' => '1','bank_detail' => '1','pan' => '1','gstin' => '1','payment_terms' => '1','amount_in_words' => '1')
);

/* `digishop2`.`jobs` */
$jobs = array(
);

/* `digishop2`.`job_batches` */
$job_batches = array(
);

/* `digishop2`.`migrations` */
$migrations = array(
  array('id' => '1','migration' => '0001_01_01_000001_create_cache_table','batch' => '1'),
  array('id' => '2','migration' => '0001_01_01_000002_create_jobs_table','batch' => '1'),
  array('id' => '3','migration' => '2013_12_15_074741_create_user_genders_table','batch' => '1'),
  array('id' => '4','migration' => '2013_12_15_075659_create_themes_table','batch' => '1'),
  array('id' => '5','migration' => '2013_12_17_151247_create_states_table','batch' => '1'),
  array('id' => '6','migration' => '2014_10_12_000000_create_users_table','batch' => '1'),
  array('id' => '7','migration' => '2019_12_14_000001_create_personal_access_tokens_table','batch' => '1'),
  array('id' => '8','migration' => '2022_04_01_223228_create_payment_gateways_table','batch' => '1'),
  array('id' => '9','migration' => '2023_01_11_132426_create_settings_table','batch' => '1'),
  array('id' => '10','migration' => '2023_02_12_112123_create_important_links_table','batch' => '1'),
  array('id' => '11','migration' => '2023_02_12_112123_create_testimonials_table','batch' => '1'),
  array('id' => '12','migration' => '2023_03_05_185524_create_user_query_statuses_table','batch' => '1'),
  array('id' => '13','migration' => '2023_03_05_185525_create_user_queries_table','batch' => '1'),
  array('id' => '14','migration' => '2023_03_17_185525_create_page_about_table','batch' => '1'),
  array('id' => '15','migration' => '2023_03_17_185525_create_page_contact_table','batch' => '1'),
  array('id' => '16','migration' => '2023_03_17_185525_create_page_home_table','batch' => '1'),
  array('id' => '17','migration' => '2023_03_17_185525_create_page_privacy_table','batch' => '1'),
  array('id' => '18','migration' => '2023_03_17_185525_create_page_tnc_table','batch' => '1'),
  array('id' => '19','migration' => '2023_03_17_185525_create_slider1_table','batch' => '1'),
  array('id' => '20','migration' => '2023_09_19_154803_create_invoices_table','batch' => '1'),
  array('id' => '21','migration' => '2023_12_15_000412_create_subscription_types_table','batch' => '1'),
  array('id' => '22','migration' => '2023_12_15_075340_create_admins_table','batch' => '1'),
  array('id' => '23','migration' => '2023_12_15_075356_create_partners_table','batch' => '1'),
  array('id' => '24','migration' => '2023_12_15_075600_create_business_onboard_applications_table','batch' => '1'),
  array('id' => '25','migration' => '2023_12_15_075618_create_businesses_table','batch' => '1'),
  array('id' => '26','migration' => '2023_12_15_075632_create_business_users_table','batch' => '1'),
  array('id' => '27','migration' => '2023_12_15_081243_create_business_data_changes_table','batch' => '1'),
  array('id' => '28','migration' => '2023_12_18_085624_create_ticket_types_table','batch' => '1'),
  array('id' => '29','migration' => '2023_12_18_085625_create_ticket_titles_table','batch' => '1'),
  array('id' => '30','migration' => '2023_12_18_085629_create_tickets_table','batch' => '1'),
  array('id' => '31','migration' => '2023_12_18_085711_create_ticket_processes_table','batch' => '1'),
  array('id' => '32','migration' => '2023_12_24_105004_create_customers_table','batch' => '1'),
  array('id' => '33','migration' => '2023_12_28_113730_create_invoice_formats_table','batch' => '1'),
  array('id' => '34','migration' => '2023_12_28_113738_create_invoice_number_formats_table','batch' => '1'),
  array('id' => '35','migration' => '2023_12_28_142150_create_products_table','batch' => '1'),
  array('id' => '36','migration' => '2023_12_29_034257_create_orders_table','batch' => '1'),
  array('id' => '37','migration' => '2024_01_27_100156_create_order_products_table','batch' => '1'),
  array('id' => '38','migration' => '2024_01_28_164606_create_invoice_settings_table','batch' => '1'),
  array('id' => '39','migration' => '2024_02_01_223228_create_payment_temps_table copy','batch' => '1'),
  array('id' => '40','migration' => '2024_02_01_223228_create_payments_table','batch' => '1'),
  array('id' => '41','migration' => '2024_02_13_144815_create_transaction_types_table','batch' => '1'),
  array('id' => '42','migration' => '2024_02_14_095414_create_transaction_prepaids_table','batch' => '1'),
  array('id' => '43','migration' => '2024_02_14_095423_create_transaction_postpaids_table','batch' => '1'),
  array('id' => '44','migration' => '2024_02_14_115757_create_transactions_table','batch' => '1'),
  array('id' => '45','migration' => '2024_02_23_185841_add_columns_to_payment_temps_table','batch' => '1'),
  array('id' => '46','migration' => '2024_02_23_185841_add_columns_to_payments_table','batch' => '1')
);

/* `digishop2`.`orders` */
$orders = array(
  array('id' => '3','created_at' => '2024-03-29 20:21:52','updated_at' => '2024-03-29 20:22:41','invoice_number' => '1','invoice_date' => '2024-03-29','business_id' => '11','invoice_format_id' => '1','business_order_id' => '1','business_cin' => NULL,'business_gstin' => '654654467f77hh','business_name' => 'The forgotten explorer','business_email' => 'shivamkumar6207172063@gmail.com','business_phone' => '06207172063','business_address' => 'Pwd colony','business_city' => 'Purnia','business_pin' => '854301','business_state_id' => '10','customer_id' => '3','customer_gstin' => '','customer_name' => 'Shivam Kumar','customer_email' => 'shivamkumar6207172063@gmail.com','customer_phone' => '6207172063','customer_address' => 'Pwd colony','customer_city' => 'Purnia','customer_pin' => '854301','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => NULL,'bank_account_holder_name' => NULL,'bank_ifsc' => NULL,'bank_swift' => NULL,'authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/11/1_original.pdf','invoice_duplicate_name' => NULL),
  array('id' => '5','created_at' => '2024-03-30 23:06:54','updated_at' => '2024-03-31 08:53:43','invoice_number' => '2','invoice_date' => '2024-03-30','business_id' => '11','invoice_format_id' => '1','business_order_id' => '2','business_cin' => NULL,'business_gstin' => '654654467f77hh','business_name' => 'The forgotten explorer','business_email' => 'shivamkumar6207172063@gmail.com','business_phone' => '06207172063','business_address' => 'Pwd colony','business_city' => 'Purnia','business_pin' => '854301','business_state_id' => '10','customer_id' => '3','customer_gstin' => '','customer_name' => 'Shivam Kumar','customer_email' => 'shivamkumar6207172063@gmail.com','customer_phone' => '6207172063','customer_address' => 'Pwd colony','customer_city' => 'Purnia','customer_pin' => '854301','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => NULL,'bank_account_holder_name' => NULL,'bank_ifsc' => NULL,'bank_swift' => NULL,'authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/11/2_original.pdf','invoice_duplicate_name' => 'business/invoice/11/2_duplicate.pdf'),
  array('id' => '6','created_at' => '2024-03-31 08:52:40','updated_at' => '2024-03-31 08:52:40','invoice_number' => '3','invoice_date' => '2024-03-31','business_id' => '11','invoice_format_id' => '1','business_order_id' => '3','business_cin' => NULL,'business_gstin' => '654654467f77hh','business_name' => 'The forgotten explorer','business_email' => 'shivamkumar6207172063@gmail.com','business_phone' => '06207172063','business_address' => 'Pwd colony','business_city' => 'Purnia','business_pin' => '854301','business_state_id' => '10','customer_id' => '4','customer_gstin' => '','customer_name' => 'Shivam Kumar','customer_email' => 'shivamkumar6207172063@gmail.com','customer_phone' => '06207172063','customer_address' => 'Pwd colony','customer_city' => 'Purnia','customer_pin' => '','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => NULL,'bank_account_holder_name' => NULL,'bank_ifsc' => NULL,'bank_swift' => NULL,'authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/11/3_original.pdf','invoice_duplicate_name' => NULL),
  array('id' => '7','created_at' => '2024-03-31 08:58:34','updated_at' => '2024-03-31 08:58:34','invoice_number' => '4','invoice_date' => '2024-03-31','business_id' => '11','invoice_format_id' => '1','business_order_id' => '4','business_cin' => NULL,'business_gstin' => '654654467f77hh','business_name' => 'The forgotten explorer','business_email' => 'shivamkumar6207172063@gmail.com','business_phone' => '06207172063','business_address' => 'Pwd colony','business_city' => 'Purnia','business_pin' => '854301','business_state_id' => '10','customer_id' => '4','customer_gstin' => '','customer_name' => 'Shivam Kumar','customer_email' => 'shivamkumar6207172063@gmail.com','customer_phone' => '06207172063','customer_address' => 'Pwd colony','customer_city' => 'Purnia','customer_pin' => '','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => NULL,'bank_account_holder_name' => NULL,'bank_ifsc' => NULL,'bank_swift' => NULL,'authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/11/4_original.pdf','invoice_duplicate_name' => NULL),
  array('id' => '8','created_at' => '2024-03-31 09:09:43','updated_at' => '2024-03-31 09:09:43','invoice_number' => '5','invoice_date' => '2024-03-31','business_id' => '11','invoice_format_id' => '1','business_order_id' => '5','business_cin' => NULL,'business_gstin' => '654654467f77hh','business_name' => 'The forgotten explorer','business_email' => 'shivamkumar6207172063@gmail.com','business_phone' => '06207172063','business_address' => 'Pwd colony','business_city' => 'Purnia','business_pin' => '854301','business_state_id' => '10','customer_id' => '4','customer_gstin' => '','customer_name' => 'Shivam Kumar','customer_email' => 'shivamkumar6207172063@gmail.com','customer_phone' => '06207172063','customer_address' => 'Pwd colony','customer_city' => 'Purnia','customer_pin' => '','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => NULL,'bank_account_holder_name' => NULL,'bank_ifsc' => NULL,'bank_swift' => NULL,'authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/11/5_original.pdf','invoice_duplicate_name' => NULL),
  array('id' => '9','created_at' => '2024-03-31 09:13:00','updated_at' => '2024-03-31 09:13:00','invoice_number' => '6','invoice_date' => '2024-03-31','business_id' => '11','invoice_format_id' => '1','business_order_id' => '6','business_cin' => NULL,'business_gstin' => '654654467f77hh','business_name' => 'The forgotten explorer','business_email' => 'shivamkumar6207172063@gmail.com','business_phone' => '06207172063','business_address' => 'Pwd colony','business_city' => 'Purnia','business_pin' => '854301','business_state_id' => '10','customer_id' => '3','customer_gstin' => '','customer_name' => 'Shivam Kumar','customer_email' => 'shivamkumar6207172063@gmail.com','customer_phone' => '6207172063','customer_address' => 'Pwd colony','customer_city' => 'Purnia','customer_pin' => '854301','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => NULL,'bank_account_holder_name' => NULL,'bank_ifsc' => NULL,'bank_swift' => NULL,'authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/11/6_original.pdf','invoice_duplicate_name' => NULL),
  array('id' => '13','created_at' => '2024-03-31 09:42:08','updated_at' => '2024-03-31 09:42:09','invoice_number' => '7','invoice_date' => '2024-03-31','business_id' => '11','invoice_format_id' => '1','business_order_id' => '7','business_cin' => NULL,'business_gstin' => '654654467f77hh','business_name' => 'The forgotten explorer','business_email' => 'shivamkumar6207172063@gmail.com','business_phone' => '06207172063','business_address' => 'Pwd colony','business_city' => 'Purnia','business_pin' => '854301','business_state_id' => '10','customer_id' => '8','customer_gstin' => '','customer_name' => 'Shivam Kumar','customer_email' => '','customer_phone' => '6201722842','customer_address' => '','customer_city' => '','customer_pin' => '','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => NULL,'bank_account_holder_name' => NULL,'bank_ifsc' => NULL,'bank_swift' => NULL,'authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/11/7_original.pdf','invoice_duplicate_name' => NULL),
  array('id' => '14','created_at' => '2024-03-31 09:51:52','updated_at' => '2024-03-31 09:51:52','invoice_number' => '8','invoice_date' => '2024-03-31','business_id' => '11','invoice_format_id' => '1','business_order_id' => '8','business_cin' => NULL,'business_gstin' => '654654467f77hh','business_name' => 'The forgotten explorer','business_email' => 'shivamkumar6207172063@gmail.com','business_phone' => '06207172063','business_address' => 'Pwd colony','business_city' => 'Purnia','business_pin' => '854301','business_state_id' => '10','customer_id' => '9','customer_gstin' => '','customer_name' => 'Shivam Kumar','customer_email' => '','customer_phone' => '6202722842','customer_address' => '','customer_city' => '','customer_pin' => '','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => NULL,'bank_account_holder_name' => NULL,'bank_ifsc' => NULL,'bank_swift' => NULL,'authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/11/8_original.pdf','invoice_duplicate_name' => NULL),
  array('id' => '15','created_at' => '2024-03-31 23:51:06','updated_at' => '2024-03-31 23:51:16','invoice_number' => '1','invoice_date' => '2024-03-31','business_id' => '12','invoice_format_id' => '1','business_order_id' => '1','business_cin' => '685','business_gstin' => '935','business_name' => 'Brody Bell','business_email' => 'jijytufim@mailinator.com','business_phone' => '+1 (445) 684-9281','business_address' => 'Minim sint mollitia','business_city' => 'Recusandae Eius est','business_pin' => '28','business_state_id' => '24','customer_id' => '10','customer_gstin' => '07AAICD5565A1ZT','customer_name' => 'Susheel Kumar Singh','customer_email' => 'susheelkrsingh306@gmail.com','customer_phone' => '9090653356','customer_address' => 'vill- pandh, post- chakbahauddin, district- samastipur','customer_city' => 'dalsingh sarai','customer_pin' => '','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => '862','bank_account_holder_name' => 'Chiquita Alvarez','bank_ifsc' => 'SBIN0002322','bank_swift' => 'Rem quisquam non obc','authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/12/1_original.pdf','invoice_duplicate_name' => NULL),
  array('id' => '16','created_at' => '2024-03-31 23:55:23','updated_at' => '2024-03-31 23:55:23','invoice_number' => '2324000002','invoice_date' => '2024-03-31','business_id' => '12','invoice_format_id' => '1','business_order_id' => '2','business_cin' => '685','business_gstin' => '935','business_name' => 'Brody Bell','business_email' => 'jijytufim@mailinator.com','business_phone' => '+1 (445) 684-9281','business_address' => 'Minim sint mollitia','business_city' => 'Recusandae Eius est','business_pin' => '28','business_state_id' => '10','customer_id' => '10','customer_gstin' => '07AAICD5565A1ZT','customer_name' => 'Susheel Kumar Singh','customer_email' => 'susheelkrsingh306@gmail.com','customer_phone' => '9090653356','customer_address' => 'vill- pandh, post- chakbahauddin, district- samastipur','customer_city' => 'dalsingh sarai','customer_pin' => '','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => '862','bank_account_holder_name' => 'Chiquita Alvarez','bank_ifsc' => 'SBIN0002322','bank_swift' => 'Rem quisquam non obc','authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/12/2324000002_original.pdf','invoice_duplicate_name' => NULL),
  array('id' => '17','created_at' => '2024-03-31 23:56:31','updated_at' => '2024-03-31 23:56:32','invoice_number' => 'BR000003','invoice_date' => '2024-03-31','business_id' => '12','invoice_format_id' => '1','business_order_id' => '3','business_cin' => '685','business_gstin' => '935','business_name' => 'Brody Bell','business_email' => 'jijytufim@mailinator.com','business_phone' => '+1 (445) 684-9281','business_address' => 'Minim sint mollitia','business_city' => 'Recusandae Eius est','business_pin' => '28','business_state_id' => '10','customer_id' => '10','customer_gstin' => '07AAICD5565A1ZT','customer_name' => 'Susheel Kumar Singh','customer_email' => 'susheelkrsingh306@gmail.com','customer_phone' => '9090653356','customer_address' => 'vill- pandh, post- chakbahauddin, district- samastipur','customer_city' => 'dalsingh sarai','customer_pin' => '','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => '862','bank_account_holder_name' => 'Chiquita Alvarez','bank_ifsc' => 'SBIN0002322','bank_swift' => 'Rem quisquam non obc','authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/12/BR000003_original.pdf','invoice_duplicate_name' => NULL),
  array('id' => '18','created_at' => '2024-03-31 23:57:37','updated_at' => '2024-03-31 23:57:37','invoice_number' => 'BR2324000004','invoice_date' => '2024-03-31','business_id' => '12','invoice_format_id' => '1','business_order_id' => '4','business_cin' => '685','business_gstin' => '935','business_name' => 'Brody Bell','business_email' => 'jijytufim@mailinator.com','business_phone' => '+1 (445) 684-9281','business_address' => 'Minim sint mollitia','business_city' => 'Recusandae Eius est','business_pin' => '28','business_state_id' => '10','customer_id' => '10','customer_gstin' => '07AAICD5565A1ZT','customer_name' => 'Susheel Kumar Singh','customer_email' => 'susheelkrsingh306@gmail.com','customer_phone' => '9090653356','customer_address' => 'vill- pandh, post- chakbahauddin, district- samastipur','customer_city' => 'dalsingh sarai','customer_pin' => '','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => '862','bank_account_holder_name' => 'Chiquita Alvarez','bank_ifsc' => 'SBIN0002322','bank_swift' => 'Rem quisquam non obc','authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/12/BR2324000004_original.pdf','invoice_duplicate_name' => NULL),
  array('id' => '19','created_at' => '2024-03-31 23:58:37','updated_at' => '2024-03-31 23:58:37','invoice_number' => 'BR2324000005','invoice_date' => '2024-03-31','business_id' => '12','invoice_format_id' => '1','business_order_id' => '5','business_cin' => '685','business_gstin' => '935','business_name' => 'Brody Bell','business_email' => 'jijytufim@mailinator.com','business_phone' => '+1 (445) 684-9281','business_address' => 'Minim sint mollitia','business_city' => 'Recusandae Eius est','business_pin' => '28','business_state_id' => '10','customer_id' => '10','customer_gstin' => '07AAICD5565A1ZT','customer_name' => 'Susheel Kumar Singh','customer_email' => 'susheelkrsingh306@gmail.com','customer_phone' => '9090653356','customer_address' => 'vill- pandh, post- chakbahauddin, district- samastipur','customer_city' => 'dalsingh sarai','customer_pin' => '','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => '862','bank_account_holder_name' => 'Chiquita Alvarez','bank_ifsc' => 'SBIN0002322','bank_swift' => 'Rem quisquam non obc','authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/12/BR2324000005_original.pdf','invoice_duplicate_name' => NULL),
  array('id' => '20','created_at' => '2024-04-01 00:00:47','updated_at' => '2024-04-01 00:00:48','invoice_number' => 'BR202425000006','invoice_date' => '2024-04-01','business_id' => '12','invoice_format_id' => '1','business_order_id' => '6','business_cin' => '685','business_gstin' => '935','business_name' => 'Brody Bell','business_email' => 'jijytufim@mailinator.com','business_phone' => '+1 (445) 684-9281','business_address' => 'Minim sint mollitia','business_city' => 'Recusandae Eius est','business_pin' => '28','business_state_id' => '10','customer_id' => '10','customer_gstin' => '07AAICD5565A1ZT','customer_name' => 'Susheel Kumar Singh','customer_email' => 'susheelkrsingh306@gmail.com','customer_phone' => '9090653356','customer_address' => 'vill- pandh, post- chakbahauddin, district- samastipur','customer_city' => 'dalsingh sarai','customer_pin' => '','customer_state_id' => '10','bank_name' => NULL,'bank_account_number' => '862','bank_account_holder_name' => 'Chiquita Alvarez','bank_ifsc' => 'SBIN0002322','bank_swift' => 'Rem quisquam non obc','authorised_sign' => '','authorised_stamp' => '','invoice_original_name' => 'business/invoice/12/BR202425000006_original.pdf','invoice_duplicate_name' => NULL)
);

/* `digishop2`.`order_products` */
$order_products = array(
  array('id' => '6','created_at' => '2024-03-29 20:21:52','updated_at' => '2024-03-29 20:21:52','order_id' => '3','name' => 'b','hsn_code' => '54641','description' => '1kg','sale_price' => '40','quantity' => '4','gst_percentage' => '18'),
  array('id' => '7','created_at' => '2024-03-29 20:21:52','updated_at' => '2024-03-29 20:21:52','order_id' => '3','name' => 'a','hsn_code' => '86876','description' => 'kg','sale_price' => '35','quantity' => '4','gst_percentage' => '18'),
  array('id' => '9','created_at' => '2024-03-30 23:06:54','updated_at' => '2024-03-30 23:06:54','order_id' => '5','name' => 'a','hsn_code' => '86876','description' => 'kg','sale_price' => '44','quantity' => '1','gst_percentage' => '18'),
  array('id' => '10','created_at' => '2024-03-31 08:52:40','updated_at' => '2024-03-31 08:52:40','order_id' => '6','name' => 'a','hsn_code' => '86876','description' => 'kg','sale_price' => '44','quantity' => '1','gst_percentage' => '18'),
  array('id' => '11','created_at' => '2024-03-31 08:58:34','updated_at' => '2024-03-31 08:58:34','order_id' => '7','name' => 'c','hsn_code' => '515454','description' => '1pac','sale_price' => '426','quantity' => '1','gst_percentage' => '18'),
  array('id' => '12','created_at' => '2024-03-31 09:09:43','updated_at' => '2024-03-31 09:09:43','order_id' => '8','name' => 'b','hsn_code' => '54641','description' => '1kg','sale_price' => '36','quantity' => '1','gst_percentage' => '18'),
  array('id' => '13','created_at' => '2024-03-31 09:13:00','updated_at' => '2024-03-31 09:13:00','order_id' => '9','name' => 'a','hsn_code' => '86876','description' => 'kg','sale_price' => '44','quantity' => '1','gst_percentage' => '18'),
  array('id' => '14','created_at' => '2024-03-31 09:13:00','updated_at' => '2024-03-31 09:13:00','order_id' => '9','name' => 'b','hsn_code' => '54641','description' => '1kg','sale_price' => '36','quantity' => '1','gst_percentage' => '18'),
  array('id' => '21','created_at' => '2024-03-31 09:42:08','updated_at' => '2024-03-31 09:42:08','order_id' => '13','name' => 'a','hsn_code' => '86876','description' => 'kg','sale_price' => '44','quantity' => '1','gst_percentage' => '18'),
  array('id' => '22','created_at' => '2024-03-31 09:51:52','updated_at' => '2024-03-31 09:51:52','order_id' => '14','name' => 'a','hsn_code' => '86876','description' => 'kg','sale_price' => '44','quantity' => '1','gst_percentage' => '18'),
  array('id' => '23','created_at' => '2024-03-31 23:51:06','updated_at' => '2024-03-31 23:51:06','order_id' => '15','name' => 'a','hsn_code' => '86876','description' => 'kg','sale_price' => '44','quantity' => '1','gst_percentage' => '18'),
  array('id' => '24','created_at' => '2024-03-31 23:55:23','updated_at' => '2024-03-31 23:55:23','order_id' => '16','name' => 'a','hsn_code' => '86876','description' => 'kg','sale_price' => '44','quantity' => '1','gst_percentage' => '18'),
  array('id' => '25','created_at' => '2024-03-31 23:56:31','updated_at' => '2024-03-31 23:56:31','order_id' => '17','name' => 'a','hsn_code' => '86876','description' => 'kg','sale_price' => '44','quantity' => '1','gst_percentage' => '18'),
  array('id' => '26','created_at' => '2024-03-31 23:57:37','updated_at' => '2024-03-31 23:57:37','order_id' => '18','name' => 'a','hsn_code' => '86876','description' => 'kg','sale_price' => '44','quantity' => '1','gst_percentage' => '18'),
  array('id' => '27','created_at' => '2024-03-31 23:58:37','updated_at' => '2024-03-31 23:58:37','order_id' => '19','name' => 'a','hsn_code' => '86876','description' => 'kg','sale_price' => '44','quantity' => '1','gst_percentage' => '18'),
  array('id' => '28','created_at' => '2024-04-01 00:00:47','updated_at' => '2024-04-01 00:00:47','order_id' => '20','name' => 'a','hsn_code' => '86876','description' => 'kg','sale_price' => '44','quantity' => '1','gst_percentage' => '18')
);

/* `digishop2`.`page_about` */
$page_about = array(
);

/* `digishop2`.`page_contact` */
$page_contact = array(
);

/* `digishop2`.`page_home` */
$page_home = array(
);

/* `digishop2`.`page_privacy` */
$page_privacy = array(
);

/* `digishop2`.`page_tnc` */
$page_tnc = array(
);

/* `digishop2`.`partners` */
$partners = array(
  array('id' => '6','created_at' => '2024-03-29 14:37:58','updated_at' => '2024-04-01 00:04:26','name' => 'Shivam Kumar','email' => 'shivamkumar6207172063@gmail.com','phone' => '6207172063','designation' => 'student','profile_pic' => 'images/profile_pic/partner/6609acb2884ea.png','email_verified_at' => NULL,'password' => '$2y$12$OqoXkLyYPpslHmI7GE395eqbgOSd/eGZHG1F7/z9NFBGaxjEVZfVu','gender_id' => '1','theme_id' => '1','color1' => '#070707','color2' => '#0f0404','color3' => '#150e0e','remember_token' => NULL),
  array('id' => '7','created_at' => '2024-03-31 22:59:16','updated_at' => '2024-03-31 23:00:05','name' => 'Susheel Kumar Singh','email' => 'partner1@gmail.com','phone' => '9090653356','designation' => 'Maxime sit modi opt','profile_pic' => 'images/profile_pic/partner/dummy.png','email_verified_at' => NULL,'password' => '$2y$12$ZFDQ6WaXUzI92A6IMuOxPOuJXTy0syQr7LgRcTznAludnSny5VBGa','gender_id' => '1','theme_id' => '1','color1' => '#982828','color2' => '#ab5a5a','color3' => '#8b3535','remember_token' => 'hY7zqlogNfCONFBSNMDP48o3icN3YQZaZiuKtmI7znroMrpngVWdgGPCdLmQ')
);

/* `digishop2`.`password_reset_tokens` */
$password_reset_tokens = array(
);

/* `digishop2`.`payments` */
$payments = array(
  array('id' => '1','created_at' => '2024-03-31 09:48:09','updated_at' => '2024-03-31 09:48:09','payment_gateway_id' => NULL,'invoice_id' => NULL,'email' => NULL,'phone' => NULL,'amount' => '118','order_id' => 'order_NspN0fUjtD5hLR','payment_id' => 'pay_NspNFoidS8VWQ3','product_id' => NULL,'receipt' => NULL,'billing_gstin' => NULL,'billing_name' => NULL,'billing_email' => NULL,'billing_phone' => NULL,'billing_address' => NULL,'billing_city' => NULL,'billing_pin' => NULL,'billing_state_id' => NULL,'payment_status' => '1','business_id' => '11')
);

/* `digishop2`.`payment_gateways` */
$payment_gateways = array(
  array('id' => '1','name' => 'COD','is_active' => '1','is_default' => '0'),
  array('id' => '2','name' => 'Razorpay','is_active' => '1','is_default' => '0'),
  array('id' => '3','name' => 'PineLabs','is_active' => '1','is_default' => '0'),
  array('id' => '4','name' => 'Stripe','is_active' => '1','is_default' => '0'),
  array('id' => '5','name' => 'CCAvanue','is_active' => '1','is_default' => '0'),
  array('id' => '6','name' => 'Phonepe','is_active' => '1','is_default' => '0')
);

/* `digishop2`.`payment_temps` */
$payment_temps = array(
);

/* `digishop2`.`personal_access_tokens` */
$personal_access_tokens = array(
);

/* `digishop2`.`products` */
$products = array(
  array('id' => '1','created_at' => '2024-03-29 15:09:54','updated_at' => '2024-03-30 23:03:07','business_id' => '11','sku' => '1','hsn_code' => '86876','name' => 'a','description' => 'kg','mrp' => '55','sale_price' => '44','gst_percentage' => '18'),
  array('id' => '2','created_at' => '2024-03-29 15:11:50','updated_at' => '2024-03-31 09:09:20','business_id' => '11','sku' => '2','hsn_code' => '54641','name' => 'b','description' => '1kg','mrp' => '45','sale_price' => '36','gst_percentage' => '18'),
  array('id' => '3','created_at' => '2024-03-29 15:12:26','updated_at' => '2024-03-31 08:57:55','business_id' => '11','sku' => '3','hsn_code' => '515454','name' => 'c','description' => '1pac','mrp' => '456','sale_price' => '426','gst_percentage' => '18'),
  array('id' => '4','created_at' => '2024-03-31 23:50:27','updated_at' => '2024-03-31 23:50:27','business_id' => '12','sku' => '1','hsn_code' => '86876','name' => 'a','description' => 'kg','mrp' => '55','sale_price' => '44','gst_percentage' => '18')
);

/* `digishop2`.`sessions` */
$sessions = array(
  array('id' => 'tlpz4apmRwVKHOr1TnpdchEBC4HAA2ZrKhQPUoYX','user_id' => '1','ip_address' => '::1','user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36','payload' => 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoickpDUXpQYzVVQ3dObXpFZmJVZ0hZVFFReGRuMTBpc3BjSVpCNFNseiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU0OiJodHRwOi8vbG9jYWxob3N0L2RpZ2lzaG9wMi9wdWJsaWNfaHRtbC9hZG1pbi9wYXJ0bmVyLzYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMjtzOjQ6InVzZXIiO2E6Mjp7czo1OiJsb2dpbiI7TzoxNjoiQXBwXE1vZGVsc1xBZG1pbiI6MzI6e3M6MTM6IgAqAGNvbm5lY3Rpb24iO3M6NToibXlzcWwiO3M6ODoiACoAdGFibGUiO3M6NjoiYWRtaW5zIjtzOjEzOiIAKgBwcmltYXJ5S2V5IjtzOjI6ImlkIjtzOjEwOiIAKgBrZXlUeXBlIjtzOjM6ImludCI7czoxMjoiaW5jcmVtZW50aW5nIjtiOjE7czo3OiIAKgB3aXRoIjthOjA6e31zOjEyOiIAKgB3aXRoQ291bnQiO2E6MDp7fXM6MTk6InByZXZlbnRzTGF6eUxvYWRpbmciO2I6MDtzOjEwOiIAKgBwZXJQYWdlIjtpOjE1O3M6NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO3M6MTM6IgAqAGF0dHJpYnV0ZXMiO2E6MTY6e3M6MjoiaWQiO2k6MTtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIzLTEyLTI0IDEyOjQyOjMyIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI0LTAzLTI2IDEwOjA0OjA1IjtzOjQ6Im5hbWUiO3M6MTk6IlN1c2hlZWwgS3VtYXIgU2luZ2giO3M6NToiZW1haWwiO3M6MTU6ImFkbWluQGdtYWlsLmNvbSI7czo1OiJwaG9uZSI7czoxMDoiOTA5MDY1MzM1NiI7czoxMToiZGVzaWduYXRpb24iO3M6MTE6IlN1cGVyIEFkbWluIjtzOjExOiJwcm9maWxlX3BpYyI7czoxNzoiNjYwMjUwM2RlMjI3Yi5wbmciO3M6MTc6ImVtYWlsX3ZlcmlmaWVkX2F0IjtzOjE5OiIyMDIzLTEyLTI0IDEyOjQyOjMyIjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTIkUVR4LmZMRUJPTFl5ZkxVeW5wMGJQdXRFUjRCR2FHenB4Qnk4UVZCQmpMdGM5amZPQTlvdG0iO3M6OToiZ2VuZGVyX2lkIjtpOjE7czo4OiJ0aGVtZV9pZCI7aToxO3M6NjoiY29sb3IxIjtzOjE6IjEiO3M6NjoiY29sb3IyIjtzOjE6IjEiO3M6NjoiY29sb3IzIjtzOjE6IjEiO3M6MTQ6InJlbWVtYmVyX3Rva2VuIjtzOjYwOiJrT2pBNG5PUnRZUXBPUjJsQkZiNEhkZHBBOXpSNW8ySjlBWE1hZkxXYU1JT0luM202cnZnWHJXeWJTeFciO31zOjExOiIAKgBvcmlnaW5hbCI7YToxNjp7czoyOiJpZCI7aToxO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjMtMTItMjQgMTI6NDI6MzIiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjQtMDMtMjYgMTA6MDQ6MDUiO3M6NDoibmFtZSI7czoxOToiU3VzaGVlbCBLdW1hciBTaW5naCI7czo1OiJlbWFpbCI7czoxNToiYWRtaW5AZ21haWwuY29tIjtzOjU6InBob25lIjtzOjEwOiI5MDkwNjUzMzU2IjtzOjExOiJkZXNpZ25hdGlvbiI7czoxMToiU3VwZXIgQWRtaW4iO3M6MTE6InByb2ZpbGVfcGljIjtzOjE3OiI2NjAyNTAzZGUyMjdiLnBuZyI7czoxNzoiZW1haWxfdmVyaWZpZWRfYXQiO3M6MTk6IjIwMjMtMTItMjQgMTI6NDI6MzIiO3M6ODoicGFzc3dvcmQiO3M6NjA6IiQyeSQxMiRRVHguZkxFQk9MWXlmTFV5bnAwYlB1dEVSNEJHYUd6cHhCeThRVkJCakx0YzlqZk9BOW90bSI7czo5OiJnZW5kZXJfaWQiO2k6MTtzOjg6InRoZW1lX2lkIjtpOjE7czo2OiJjb2xvcjEiO3M6MToiMSI7czo2OiJjb2xvcjIiO3M6MToiMSI7czo2OiJjb2xvcjMiO3M6MToiMSI7czoxNDoicmVtZW1iZXJfdG9rZW4iO3M6NjA6ImtPakE0bk9SdFlRcE9SMmxCRmI0SGRkcEE5elI1bzJKOUFYTWFmTFdhTUlPSW4zbTZydmdYcld5YlN4VyI7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6Mjp7czoxNzoiZW1haWxfdmVyaWZpZWRfYXQiO3M6ODoiZGF0ZXRpbWUiO3M6ODoicGFzc3dvcmQiO3M6NjoiaGFzaGVkIjt9czoxNzoiACoAY2xhc3NDYXN0Q2FjaGUiO2E6MDp7fXM6MjE6IgAqAGF0dHJpYnV0ZUNhc3RDYWNoZSI7YTowOnt9czoxMzoiACoAZGF0ZUZvcm1hdCI7TjtzOjEwOiIAKgBhcHBlbmRzIjthOjA6e31zOjE5OiIAKgBkaXNwYXRjaGVzRXZlbnRzIjthOjA6e31zOjE0OiIAKgBvYnNlcnZhYmxlcyI7YTowOnt9czoxMjoiACoAcmVsYXRpb25zIjthOjA6e31zOjEwOiIAKgB0b3VjaGVzIjthOjA6e31zOjEwOiJ0aW1lc3RhbXBzIjtiOjE7czoxMzoidXNlc1VuaXF1ZUlkcyI7YjowO3M6OToiACoAaGlkZGVuIjthOjI6e2k6MDtzOjg6InBhc3N3b3JkIjtpOjE7czoxNDoicmVtZW1iZXJfdG9rZW4iO31zOjEwOiIAKgB2aXNpYmxlIjthOjA6e31zOjExOiIAKgBmaWxsYWJsZSI7YTozOntpOjA7czo0OiJuYW1lIjtpOjE7czo1OiJlbWFpbCI7aToyO3M6ODoicGFzc3dvcmQiO31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO31zOjE5OiIAKgBhdXRoUGFzc3dvcmROYW1lIjtzOjg6InBhc3N3b3JkIjtzOjIwOiIAKgByZW1lbWJlclRva2VuTmFtZSI7czoxNDoicmVtZW1iZXJfdG9rZW4iO31zOjU6InRoZW1lIjtzOjY6InRoZW1lMSI7fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9','last_activity' => '1711910066')
);

/* `digishop2`.`settings` */
$settings = array(
  array('id' => '1','created_at' => '2024-03-26 10:00:28','updated_at' => '2024-03-26 10:03:36','app_name' => 'Digamite Private Limited','favicon' => '660250180c02f.png','dark_logo' => '660250180c662.png','light_logo' => '660250201c012.png','title' => NULL,'address' => NULL,'detailed_address' => NULL,'email' => NULL,'phone' => NULL,'short_description' => NULL,'facebook' => NULL,'instagram' => NULL,'linkedin' => NULL,'twitter' => NULL,'google_map' => NULL,'whatsapp' => NULL,'admin_theme' => NULL,'user_theme' => NULL,'partner_theme' => NULL,'color1' => '#f1c232','color2' => '#cfe2f3','color3' => '#38761d','color4' => '#f1c232','color5' => '#cc0000','color6' => '#a55b5b')
);

/* `digishop2`.`slider1` */
$slider1 = array(
);

/* `digishop2`.`states` */
$states = array(
  array('id' => '1','name' => 'Jammu and Kashmir','gst_state_code' => '01','gst_state_short_name' => 'JK'),
  array('id' => '2','name' => 'Himachal Pradesh','gst_state_code' => '02','gst_state_short_name' => 'HP'),
  array('id' => '3','name' => 'Punjab','gst_state_code' => '03','gst_state_short_name' => 'PB'),
  array('id' => '4','name' => 'Chandigarh','gst_state_code' => '04','gst_state_short_name' => 'CH'),
  array('id' => '5','name' => 'Uttarakhand','gst_state_code' => '05','gst_state_short_name' => 'UA'),
  array('id' => '6','name' => 'Haryana','gst_state_code' => '06','gst_state_short_name' => 'HR'),
  array('id' => '7','name' => 'Delhi','gst_state_code' => '07','gst_state_short_name' => 'DL'),
  array('id' => '8','name' => 'Rajasthan','gst_state_code' => '08','gst_state_short_name' => 'RJ'),
  array('id' => '9','name' => 'Uttar Pradesh','gst_state_code' => '09','gst_state_short_name' => 'UP'),
  array('id' => '10','name' => 'Bihar','gst_state_code' => '10','gst_state_short_name' => 'BR'),
  array('id' => '11','name' => 'Sikkim','gst_state_code' => '11','gst_state_short_name' => 'SK'),
  array('id' => '12','name' => 'Arunachal Pradesh','gst_state_code' => '12','gst_state_short_name' => 'AP'),
  array('id' => '13','name' => 'Nagaland','gst_state_code' => '13','gst_state_short_name' => 'NL'),
  array('id' => '14','name' => 'Manipur','gst_state_code' => '14','gst_state_short_name' => 'MN'),
  array('id' => '15','name' => 'Mizoram','gst_state_code' => '15','gst_state_short_name' => 'MZ'),
  array('id' => '16','name' => 'Tripura','gst_state_code' => '16','gst_state_short_name' => 'TR'),
  array('id' => '17','name' => 'Meghalaya','gst_state_code' => '17','gst_state_short_name' => 'ML'),
  array('id' => '18','name' => 'Assam','gst_state_code' => '18','gst_state_short_name' => 'AS'),
  array('id' => '19','name' => 'West Bengal','gst_state_code' => '19','gst_state_short_name' => 'WB'),
  array('id' => '20','name' => 'Jharkhand','gst_state_code' => '20','gst_state_short_name' => 'JH'),
  array('id' => '21','name' => 'Odisha','gst_state_code' => '21','gst_state_short_name' => 'OR'),
  array('id' => '22','name' => 'Chattisgarh','gst_state_code' => '22','gst_state_short_name' => 'CT'),
  array('id' => '23','name' => 'Madhya Pradesh','gst_state_code' => '23','gst_state_short_name' => 'MP'),
  array('id' => '24','name' => 'Gujarat','gst_state_code' => '24','gst_state_short_name' => 'GJ'),
  array('id' => '25','name' => 'Daman & Diu','gst_state_code' => '25','gst_state_short_name' => 'DD'),
  array('id' => '26','name' => 'Dadra & Nagar Haveli','gst_state_code' => '26','gst_state_short_name' => 'DN'),
  array('id' => '27','name' => 'Maharashtra','gst_state_code' => '27','gst_state_short_name' => 'MH'),
  array('id' => '28','name' => 'Andhra Pradesh','gst_state_code' => '28','gst_state_short_name' => 'AP'),
  array('id' => '29','name' => 'Karnataka','gst_state_code' => '29','gst_state_short_name' => 'KA'),
  array('id' => '30','name' => 'Goa','gst_state_code' => '30','gst_state_short_name' => 'GA'),
  array('id' => '31','name' => 'Lakshadweep','gst_state_code' => '31','gst_state_short_name' => 'LD'),
  array('id' => '32','name' => 'Kerala','gst_state_code' => '32','gst_state_short_name' => 'KL'),
  array('id' => '33','name' => 'Tamil Nadu','gst_state_code' => '33','gst_state_short_name' => 'TN'),
  array('id' => '34','name' => 'Puducherry','gst_state_code' => '34','gst_state_short_name' => 'PY'),
  array('id' => '35','name' => 'Andaman & Nicobar Islands','gst_state_code' => '35','gst_state_short_name' => 'AN'),
  array('id' => '36','name' => 'Telangana','gst_state_code' => '36','gst_state_short_name' => 'TL'),
  array('id' => '37','name' => 'Hyderabad GST Commissionerate','gst_state_code' => '37','gst_state_short_name' => 'AD'),
  array('id' => '38','name' => 'Kurnool GST Commissionerate','gst_state_code' => '38','gst_state_short_name' => 'LA')
);

/* `digishop2`.`subscription_types` */
$subscription_types = array(
  array('id' => '1','name' => 'prepaid'),
  array('id' => '2','name' => 'postpaid'),
  array('id' => '3','name' => 'unlimited')
);

/* `digishop2`.`testimonials` */
$testimonials = array(
);

/* `digishop2`.`themes` */
$themes = array(
  array('id' => '1','name' => 'theme1')
);

/* `digishop2`.`tickets` */
$tickets = array(
);

/* `digishop2`.`ticket_processes` */
$ticket_processes = array(
);

/* `digishop2`.`ticket_titles` */
$ticket_titles = array(
);

/* `digishop2`.`ticket_types` */
$ticket_types = array(
);

/* `digishop2`.`transactions` */
$transactions = array(
  array('id' => '11','created_at' => '2024-03-29 14:49:58','updated_at' => '2024-03-29 14:49:58','business_id' => '11','transaction_type_id' => '2','order_id' => NULL,'payment_id' => NULL,'amount' => '2000','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '14','created_at' => '2024-03-29 20:21:52','updated_at' => '2024-03-29 20:21:52','business_id' => '11','transaction_type_id' => '1','order_id' => '3','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '16','created_at' => '2024-03-30 23:06:54','updated_at' => '2024-03-30 23:06:54','business_id' => '11','transaction_type_id' => '1','order_id' => '5','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '17','created_at' => '2024-03-31 08:52:40','updated_at' => '2024-03-31 08:52:40','business_id' => '11','transaction_type_id' => '1','order_id' => '6','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '18','created_at' => '2024-03-31 08:58:34','updated_at' => '2024-03-31 08:58:34','business_id' => '11','transaction_type_id' => '1','order_id' => '7','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '19','created_at' => '2024-03-31 09:09:43','updated_at' => '2024-03-31 09:09:43','business_id' => '11','transaction_type_id' => '1','order_id' => '8','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '20','created_at' => '2024-03-31 09:13:00','updated_at' => '2024-03-31 09:13:00','business_id' => '11','transaction_type_id' => '1','order_id' => '9','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '24','created_at' => '2024-03-31 09:42:08','updated_at' => '2024-03-31 09:42:08','business_id' => '11','transaction_type_id' => '1','order_id' => '13','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '25','created_at' => '2024-03-31 09:48:09','updated_at' => '2024-03-31 09:48:09','business_id' => '11','transaction_type_id' => '5','order_id' => NULL,'payment_id' => '1','amount' => '100','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '26','created_at' => '2024-03-31 09:51:52','updated_at' => '2024-03-31 09:51:52','business_id' => '11','transaction_type_id' => '1','order_id' => '14','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '27','created_at' => '2024-03-31 23:03:18','updated_at' => '2024-03-31 23:03:18','business_id' => '12','transaction_type_id' => '2','order_id' => NULL,'payment_id' => NULL,'amount' => '2000','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '28','created_at' => '2024-03-31 23:51:06','updated_at' => '2024-03-31 23:51:06','business_id' => '12','transaction_type_id' => '1','order_id' => '15','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '29','created_at' => '2024-03-31 23:55:23','updated_at' => '2024-03-31 23:55:23','business_id' => '12','transaction_type_id' => '1','order_id' => '16','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '30','created_at' => '2024-03-31 23:56:31','updated_at' => '2024-03-31 23:56:31','business_id' => '12','transaction_type_id' => '1','order_id' => '17','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '31','created_at' => '2024-03-31 23:57:37','updated_at' => '2024-03-31 23:57:37','business_id' => '12','transaction_type_id' => '1','order_id' => '18','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '32','created_at' => '2024-03-31 23:58:37','updated_at' => '2024-03-31 23:58:37','business_id' => '12','transaction_type_id' => '1','order_id' => '19','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL),
  array('id' => '33','created_at' => '2024-04-01 00:00:47','updated_at' => '2024-04-01 00:00:47','business_id' => '12','transaction_type_id' => '1','order_id' => '20','payment_id' => NULL,'amount' => '-1','ip_address' => NULL,'mac_address' => NULL,'remark' => NULL)
);

/* `digishop2`.`transaction_postpaids` */
$transaction_postpaids = array(
);

/* `digishop2`.`transaction_prepaids` */
$transaction_prepaids = array(
);

/* `digishop2`.`transaction_types` */
$transaction_types = array(
  array('id' => '1','name' => 'Order created'),
  array('id' => '2','name' => 'Wecome Bonus'),
  array('id' => '3','name' => 'Refferal Bonus'),
  array('id' => '4','name' => 'Other Gift'),
  array('id' => '5','name' => 'Cash Added')
);

/* `digishop2`.`users` */
$users = array(
  array('id' => '1','name' => 'Male','email' => 'test@example.com', 'password'=> Hash::make('password')),
);

/* `digishop2`.`user_genders` */
$user_genders = array(
  array('id' => '1','name' => 'Male','title' => 'Mr')
);

/* `digishop2`.`user_queries` */
$user_queries = array(
);

/* `digishop2`.`user_query_statuses` */
$user_query_statuses = array(
);
