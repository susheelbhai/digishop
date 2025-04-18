<?php

include('backup/new.php');
include('backup/digishop.php');


/* `digishop`.`invoice_number_formats` */
$invoice_number_formats = array(
              array('id' => '1', 'created_at' => '0000-00-00 00:00:00', 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'slug', 'name' => 'Sample 1', 'sample1' => '1', 'sample2' => '2', 'sample3' => '3', 'state_code' => '0', 'state_code_suffix' => 'state_code_suffix', 'financial_year' => '0', 'financial_year_hint' => '0', 'financial_year_interfix' => 'financial_year_interfix', 'financial_year_suffix' => 'financial_year_suffix', 'business_order_id_digit' => '0', 'explanation' => 'explanation'),
              array('id' => '2', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format2', 'name' => 'Sample 2', 'sample1' => '2526000001', 'sample2' => '2526000002', 'sample3' => '2526000003', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '', 'financial_year_suffix' => '', 'business_order_id_digit' => '6', 'explanation' => NULL),
              array('id' => '3', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format3', 'name' => 'Sample 3', 'sample1' => '2526-1', 'sample2' => '2526-2', 'sample3' => '2526-3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '4', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format4', 'name' => 'Sample 4', 'sample1' => '2526/1', 'sample2' => '2526/2', 'sample3' => '2526/3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '5', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 5', 'sample1' => '25-26-1', 'sample2' => '25-26-2', 'sample3' => '25-26-3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '-', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '6', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 6', 'sample1' => '25-26/1', 'sample2' => '25-26/2', 'sample3' => '25-26/3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '-', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '7', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 7', 'sample1' => '25/26-1', 'sample2' => '25/26-2', 'sample3' => '25/26-3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '/', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '8', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 8', 'sample1' => '25/26/1', 'sample2' => '25/26/2', 'sample3' => '25/26/3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '/', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '9', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format2', 'name' => 'Sample 9', 'sample1' => '202526000001', 'sample2' => '202526000002', 'sample3' => '202526000003', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '', 'financial_year_suffix' => '', 'business_order_id_digit' => '6', 'explanation' => NULL),
              array('id' => '10', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format3', 'name' => 'Sample 10', 'sample1' => '202526-1', 'sample2' => '202526-2', 'sample3' => '202526-3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '11', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format4', 'name' => 'Sample 11', 'sample1' => '202526/1', 'sample2' => '202526/2', 'sample3' => '202526/3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '12', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 12', 'sample1' => '2025-26-1', 'sample2' => '2025-26-2', 'sample3' => '2025-26-3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '-', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '13', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 13', 'sample1' => '2025-26/1', 'sample2' => '2025-26/2', 'sample3' => '2025-26/3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '-', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '14', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 14', 'sample1' => '2025/26-1', 'sample2' => '2025/26-2', 'sample3' => '2025/26-3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '/', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '15', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 15', 'sample1' => '2025/26/1', 'sample2' => '2025/26/2', 'sample3' => '2025/26/3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '/', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '16', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format2', 'name' => 'Sample 16', 'sample1' => '20252026000001', 'sample2' => '20252026000002', 'sample3' => '20252026000003', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '', 'financial_year_suffix' => '', 'business_order_id_digit' => '6', 'explanation' => NULL),
              array('id' => '17', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format3', 'name' => 'Sample 17', 'sample1' => '20252026-1', 'sample2' => '20252026-2', 'sample3' => '20252026-3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '18', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format4', 'name' => 'Sample 18', 'sample1' => '20252026/1', 'sample2' => '20252026/2', 'sample3' => '20252026/3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '19', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 19', 'sample1' => '2025-2026-1', 'sample2' => '2025-2026-2', 'sample3' => '2025-2026-3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '-', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '20', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 20', 'sample1' => '2025-2026/1', 'sample2' => '2025-2026/2', 'sample3' => '2025-2026/3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '-', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '21', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 21', 'sample1' => '2025/2026-1', 'sample2' => '2025/2026-2', 'sample3' => '2025/2026-3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '/', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '22', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 22', 'sample1' => '2025/2026/1', 'sample2' => '2025/2026/2', 'sample3' => '2025/2026/3', 'state_code' => '0', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '/', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '23', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format2', 'name' => 'Sample 23', 'sample1' => 'BR2526000001', 'sample2' => 'BR2526000002', 'sample3' => 'BR2526000003', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '', 'financial_year_suffix' => '', 'business_order_id_digit' => '6', 'explanation' => NULL),
              array('id' => '24', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format3', 'name' => 'Sample 24', 'sample1' => 'BR2526-1', 'sample2' => 'BR2526-2', 'sample3' => 'BR2526-3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '25', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format4', 'name' => 'Sample 25', 'sample1' => 'BR2526/1', 'sample2' => 'BR2526/2', 'sample3' => 'BR2526/3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '26', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 26', 'sample1' => 'BR25-26-1', 'sample2' => 'BR25-26-2', 'sample3' => 'BR25-26-3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '-', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '27', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 27', 'sample1' => 'BR25-26/1', 'sample2' => 'BR25-26/2', 'sample3' => 'BR25-26/3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '-', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '28', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 28', 'sample1' => 'BR25/26-1', 'sample2' => 'BR25/26-2', 'sample3' => 'BR25/26-3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '/', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '29', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 29', 'sample1' => 'BR25/26/1', 'sample2' => 'BR25/26/2', 'sample3' => 'BR25/26/3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '/', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '30', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format2', 'name' => 'Sample 30', 'sample1' => 'BR202526000001', 'sample2' => 'BR202526000002', 'sample3' => 'BR202526000003', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '', 'financial_year_suffix' => '', 'business_order_id_digit' => '6', 'explanation' => NULL),
              array('id' => '31', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format3', 'name' => 'Sample 31', 'sample1' => 'BR202526-1', 'sample2' => 'BR202526-2', 'sample3' => 'BR202526-3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '32', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format4', 'name' => 'Sample 32', 'sample1' => 'BR202526/1', 'sample2' => 'BR202526/2', 'sample3' => 'BR202526/3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '33', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 33', 'sample1' => 'BR2025-26-1', 'sample2' => 'BR2025-26-2', 'sample3' => 'BR2025-26-3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '-', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '34', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 34', 'sample1' => 'BR2025-26/1', 'sample2' => 'BR2025-26/2', 'sample3' => 'BR2025-26/3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '-', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '35', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 35', 'sample1' => 'BR2025/26-1', 'sample2' => 'BR2025/26-2', 'sample3' => 'BR2025/26-3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '/', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '36', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 36', 'sample1' => 'BR2025/26/1', 'sample2' => 'BR2025/26/2', 'sample3' => 'BR2025/26/3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '/', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '37', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format2', 'name' => 'Sample 37', 'sample1' => 'BR20252026000001', 'sample2' => 'BR20252026000002', 'sample3' => 'BR20252026000003', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '', 'financial_year_suffix' => '', 'business_order_id_digit' => '6', 'explanation' => NULL),
              array('id' => '38', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format3', 'name' => 'Sample 38', 'sample1' => 'BR20252026-1', 'sample2' => 'BR20252026-2', 'sample3' => 'BR20252026-3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '39', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format4', 'name' => 'Sample 39', 'sample1' => 'BR20252026/1', 'sample2' => 'BR20252026/2', 'sample3' => 'BR20252026/3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '40', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 40', 'sample1' => 'BR2025-2026-1', 'sample2' => 'BR2025-2026-2', 'sample3' => 'BR2025-2026-3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '-', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '41', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 41', 'sample1' => 'BR2025-2026/1', 'sample2' => 'BR2025-2026/2', 'sample3' => 'BR2025-2026/3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '-', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '42', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 42', 'sample1' => 'BR2025/2026-1', 'sample2' => 'BR2025/2026-2', 'sample3' => 'BR2025/2026-3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '/', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '43', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 43', 'sample1' => 'BR2025/2026/1', 'sample2' => 'BR2025/2026/2', 'sample3' => 'BR2025/2026/3', 'state_code' => '1', 'state_code_suffix' => '', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '/', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '44', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format2', 'name' => 'Sample 44', 'sample1' => 'BR-2526000001', 'sample2' => 'BR-2526000002', 'sample3' => 'BR-2526000003', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '', 'financial_year_suffix' => '', 'business_order_id_digit' => '6', 'explanation' => NULL),
              array('id' => '45', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format3', 'name' => 'Sample 45', 'sample1' => 'BR-2526-1', 'sample2' => 'BR-2526-2', 'sample3' => 'BR-2526-3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '46', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format4', 'name' => 'Sample 46', 'sample1' => 'BR-2526/1', 'sample2' => 'BR-2526/2', 'sample3' => 'BR-2526/3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '47', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 47', 'sample1' => 'BR-25-26-1', 'sample2' => 'BR-25-26-2', 'sample3' => 'BR-25-26-3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '-', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '48', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 48', 'sample1' => 'BR-25-26/1', 'sample2' => 'BR-25-26/2', 'sample3' => 'BR-25-26/3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '-', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '49', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 49', 'sample1' => 'BR-25/26-1', 'sample2' => 'BR-25/26-2', 'sample3' => 'BR-25/26-3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '/', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '50', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 50', 'sample1' => 'BR-25/26/1', 'sample2' => 'BR-25/26/2', 'sample3' => 'BR-25/26/3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '/', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '51', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format2', 'name' => 'Sample 51', 'sample1' => 'BR-202526000001', 'sample2' => 'BR-202526000002', 'sample3' => 'BR-202526000003', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '', 'financial_year_suffix' => '', 'business_order_id_digit' => '6', 'explanation' => NULL),
              array('id' => '52', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format3', 'name' => 'Sample 52', 'sample1' => 'BR-202526-1', 'sample2' => 'BR-202526-2', 'sample3' => 'BR-202526-3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '53', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format4', 'name' => 'Sample 53', 'sample1' => 'BR-202526/1', 'sample2' => 'BR-202526/2', 'sample3' => 'BR-202526/3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '54', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 54', 'sample1' => 'BR-2025-26-1', 'sample2' => 'BR-2025-26-2', 'sample3' => 'BR-2025-26-3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '-', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '55', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 55', 'sample1' => 'BR-2025-26/1', 'sample2' => 'BR-2025-26/2', 'sample3' => 'BR-2025-26/3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '-', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '56', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 56', 'sample1' => 'BR-2025/26-1', 'sample2' => 'BR-2025/26-2', 'sample3' => 'BR-2025/26-3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '/', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '57', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 57', 'sample1' => 'BR-2025/26/1', 'sample2' => 'BR-2025/26/2', 'sample3' => 'BR-2025/26/3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '/', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '58', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format2', 'name' => 'Sample 58', 'sample1' => 'BR-20252026000001', 'sample2' => 'BR-20252026000002', 'sample3' => 'BR-20252026000003', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '', 'financial_year_suffix' => '', 'business_order_id_digit' => '6', 'explanation' => NULL),
              array('id' => '59', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format3', 'name' => 'Sample 59', 'sample1' => 'BR-20252026-1', 'sample2' => 'BR-20252026-2', 'sample3' => 'BR-20252026-3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '60', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format4', 'name' => 'Sample 60', 'sample1' => 'BR-20252026/1', 'sample2' => 'BR-20252026/2', 'sample3' => 'BR-20252026/3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '61', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 61', 'sample1' => 'BR-2025-2026-1', 'sample2' => 'BR-2025-2026-2', 'sample3' => 'BR-2025-2026-3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '-', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '62', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 62', 'sample1' => 'BR-2025-2026/1', 'sample2' => 'BR-2025-2026/2', 'sample3' => 'BR-2025-2026/3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '-', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '63', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 63', 'sample1' => 'BR-2025/2026-1', 'sample2' => 'BR-2025/2026-2', 'sample3' => 'BR-2025/2026-3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '/', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '64', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 64', 'sample1' => 'BR-2025/2026/1', 'sample2' => 'BR-2025/2026/2', 'sample3' => 'BR-2025/2026/3', 'state_code' => '1', 'state_code_suffix' => '-', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '/', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '65', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format2', 'name' => 'Sample 65', 'sample1' => 'BR/2526000001', 'sample2' => 'BR/2526000002', 'sample3' => 'BR/2526000003', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '', 'financial_year_suffix' => '', 'business_order_id_digit' => '6', 'explanation' => NULL),
              array('id' => '66', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format3', 'name' => 'Sample 66', 'sample1' => 'BR/2526-1', 'sample2' => 'BR/2526-2', 'sample3' => 'BR/2526-3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '67', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format4', 'name' => 'Sample 67', 'sample1' => 'BR/2526/1', 'sample2' => 'BR/2526/2', 'sample3' => 'BR/2526/3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '68', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 68', 'sample1' => 'BR/25-26-1', 'sample2' => 'BR/25-26-2', 'sample3' => 'BR/25-26-3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '-', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '69', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 69', 'sample1' => 'BR/25-26/1', 'sample2' => 'BR/25-26/2', 'sample3' => 'BR/25-26/3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '-', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '70', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 70', 'sample1' => 'BR/25/26-1', 'sample2' => 'BR/25/26-2', 'sample3' => 'BR/25/26-3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '/', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '71', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 71', 'sample1' => 'BR/25/26/1', 'sample2' => 'BR/25/26/2', 'sample3' => 'BR/25/26/3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '1', 'financial_year_hint' => '2526', 'financial_year_interfix' => '/', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '72', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format2', 'name' => 'Sample 72', 'sample1' => 'BR/202526000001', 'sample2' => 'BR/202526000002', 'sample3' => 'BR/202526000003', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '', 'financial_year_suffix' => '', 'business_order_id_digit' => '6', 'explanation' => NULL),
              array('id' => '73', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format3', 'name' => 'Sample 73', 'sample1' => 'BR/202526-1', 'sample2' => 'BR/202526-2', 'sample3' => 'BR/202526-3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '74', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format4', 'name' => 'Sample 74', 'sample1' => 'BR/202526/1', 'sample2' => 'BR/202526/2', 'sample3' => 'BR/202526/3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '75', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 75', 'sample1' => 'BR/2025-26-1', 'sample2' => 'BR/2025-26-2', 'sample3' => 'BR/2025-26-3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '-', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '76', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 76', 'sample1' => 'BR/2025-26/1', 'sample2' => 'BR/2025-26/2', 'sample3' => 'BR/2025-26/3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '-', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '77', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 77', 'sample1' => 'BR/2025/26-1', 'sample2' => 'BR/2025/26-2', 'sample3' => 'BR/2025/26-3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '/', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '78', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 78', 'sample1' => 'BR/2025/26/1', 'sample2' => 'BR/2025/26/2', 'sample3' => 'BR/2025/26/3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '2', 'financial_year_hint' => '32767', 'financial_year_interfix' => '/', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '79', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format2', 'name' => 'Sample 79', 'sample1' => 'BR/20252026000001', 'sample2' => 'BR/20252026000002', 'sample3' => 'BR/20252026000003', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '', 'financial_year_suffix' => '', 'business_order_id_digit' => '6', 'explanation' => NULL),
              array('id' => '80', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format3', 'name' => 'Sample 80', 'sample1' => 'BR/20252026-1', 'sample2' => 'BR/20252026-2', 'sample3' => 'BR/20252026-3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '81', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format4', 'name' => 'Sample 81', 'sample1' => 'BR/20252026/1', 'sample2' => 'BR/20252026/2', 'sample3' => 'BR/20252026/3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '82', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 82', 'sample1' => 'BR/2025-2026-1', 'sample2' => 'BR/2025-2026-2', 'sample3' => 'BR/2025-2026-3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '-', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '83', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 83', 'sample1' => 'BR/2025-2026/1', 'sample2' => 'BR/2025-2026/2', 'sample3' => 'BR/2025-2026/3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '-', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '84', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format5', 'name' => 'Sample 84', 'sample1' => 'BR/2025/2026-1', 'sample2' => 'BR/2025/2026-2', 'sample3' => 'BR/2025/2026-3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '/', 'financial_year_suffix' => '-', 'business_order_id_digit' => '0', 'explanation' => NULL),
              array('id' => '85', 'created_at' => NULL, 'updated_at' => '2025-04-18 09:04:47', 'slug' => 'format6', 'name' => 'Sample 85', 'sample1' => 'BR/2025/2026/1', 'sample2' => 'BR/2025/2026/2', 'sample3' => 'BR/2025/2026/3', 'state_code' => '1', 'state_code_suffix' => '/', 'financial_year' => '3', 'financial_year_hint' => '2025', 'financial_year_interfix' => '/', 'financial_year_suffix' => '/', 'business_order_id_digit' => '0', 'explanation' => NULL)
);
