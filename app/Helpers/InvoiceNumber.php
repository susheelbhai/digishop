<?php

namespace App\Helpers;

class InvoiceNumber
{

    // format rules
    // 1. state code ['0'=> '', '1'=> 'BR']
    // 2. state code suffix ['0'=> '', '1'=> '-', '2'=> '/']
    // 3. financial year ['0'=> '', '1'=> '2526', '2'=> '202526', '3'=>'20252026']
    // 4. financial year interfix ['0'=> '', '1'=> '-', '2'=> '/']
    // 5. financial year suffix ['0'=> '', '1'=> '-', '2'=> '/']
    // 6. business order id ['1'=> '1', '2'=> '01', '3'=> '001', '4'=> '0001', '5'=> '00001', '6'=> '000001', '7'=> '0000001', '8'=> '00000001']
    private static function financial_year($date, $format1 = "y", $format2 = "y", $separator = '')
    {
        if (date_format($date, "m") > 3) { //On or After April (FY is current year - next year)
            $financial_year = (date_format($date, $format1)) . $separator . (date_format($date, $format2) + 1);
        } else { //On or Before March (FY is previous year - current year)
            $financial_year = (date_format($date, $format1) - 1) . $separator . date_format($date, $format2);
        }
        return $financial_year;
    }
 

    public static function generateNumber($data, $invoicer_format)
    {
        $number = '';
        if ($invoicer_format['state_code'] == 1) {
            $number .= $data['businessState']['gst_state_short_name']
                . $invoicer_format['state_code_suffix'];
        }
        if ($invoicer_format['financial_year'] == 1) {
            $number .= self::financial_year(date_create($data['invoice_date']), 'y', 'y', $invoicer_format['financial_year_interfix'])
                . $invoicer_format['financial_year_suffix'];
        }
        if ($invoicer_format['financial_year'] == 2) {
            $number .= self::financial_year(date_create($data['invoice_date']), 'Y', 'y', $invoicer_format['financial_year_interfix'])
                . $invoicer_format['financial_year_suffix'];
        }
        if ($invoicer_format['financial_year'] == 3) {
            $number .= self::financial_year(date_create($data['invoice_date']), 'Y', 'Y', $invoicer_format['financial_year_interfix'])
                . $invoicer_format['financial_year_suffix'];
        }
        $number .= str_pad($data['business_order_id'], $invoicer_format['business_order_id_digit'], '0', STR_PAD_LEFT);
        // dd($number);
        return $number;
    }
}
