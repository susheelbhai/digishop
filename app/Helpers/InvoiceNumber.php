<?php

namespace App\Helpers;

class InvoiceNumber
{
    private static function financial_year($date, $format1 = "y", $format2 = "y")
    {
        if (date_format($date, "m") > 3) { //On or After April (FY is current year - next year)
            $financial_year = (date_format($date, $format1)) . '' . (date_format($date, $format2) + 1);
        } else { //On or Before March (FY is previous year - current year)
            $financial_year = (date_format($date, $format1) - 1) . '' . date_format($date, $format2);
        }
        return $financial_year;
    }
    public static function format1($data)
    {
        return $data['business_order_id'];
    }
    public static function format2($data)
    {
        $financial_year = self::financial_year(date_create($data['invoice_date']));
        return $financial_year * 1000000 + $data['business_order_id'];
    }
    public static function format3($data)
    {
        $state_code = $data['businessState']['gst_state_short_name'];
        return $state_code . sprintf('%06s', $data['business_order_id']) ;
    }
    public static function format4($data)
    {
        $state_code = $data['businessState']['gst_state_short_name'];
        $financial_year = self::financial_year(date_create($data['invoice_date']));
        return $state_code . $financial_year * 1000000 + $data['business_order_id'];
    }
    public static function format5($data)
    {
        $state_code = $data['businessState']['gst_state_short_name'];
        $financial_year = self::financial_year(date_create($data['invoice_date']), 'Y', 'y');
        return $state_code . $financial_year * 1000000 + $data['business_order_id'];
    }
}
