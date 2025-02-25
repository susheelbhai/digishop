<?php

namespace App\Repository;

use App\Models\Business;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\BusinessUser;
use App\Models\InvoiceSetting;
use Illuminate\Support\Facades\DB;
use App\Events\ApplicationApproved;
use App\Events\ApplicationRejected;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\BusinessOnboardApplication;
use App\Contracts\BusinessOnboardApplicationContract;
use App\Models\InvoiceFormat;

class BusinessOnboardApplicationRepository implements BusinessOnboardApplicationContract
{
    public function store($request)
    {
        $logo = '';
        $registration_certificate = '';
        $gst_certificate = '';
        $authorised_sign = '';
        $authorised_stamp = '';
        $owner_profile_pic = 'images/profile_pic/user/dummy.png';
        $data = BusinessOnboardApplication::updateOrCreate([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'registration_number' => $request->registration_number,
            'gst_number' => $request->gst_number,
            'address' => $request->address,
            'city' => $request->city,
            'pin' => $request->pin,
            'state_id' => $request->state_id,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'owner_email' => $request->owner_email,
            'bank_name' => $request->bank_name,
            'bank_ifsc' => $request->bank_ifsc,
            'bank_swift' => $request->bank_swift,
            'bank_account_holder_name' => $request->bank_account_holder_name,
            'bank_account_number' => $request->bank_account_number,
            'iec_code' => $request->iec_code,
            'ad_code' => $request->ad_code,
            'arn_code' => $request->arn_code,
            'payment_terms' => $request->payment_terms,
            'partner_id' => $request->partner_id,
            'subscription_type_id' => $request->subscription_type_id,
        ]);
        if ($request->logo != '') {
            $logo = Storage::put('images/logo', $request->logo);
        }
        if ($request->registration_certificate != '') {
            $registration_certificate = Storage::put('business/documents/' . $data['id'], $request->registration_certificate);
        }
        if ($request->gst_certificate != '') {
            $gst_certificate = Storage::put('business/documents/' . $data['id'], $request->gst_certificate);
        }
        if ($request->owner_profile_pic != '') {
            $owner_profile_pic = Storage::put('images/profile_pic/user', $request->owner_profile_pic);
        }

        if ($request->authorised_sign != '') {
            $authorised_sign = Storage::put('business/authorised_sign', $request->authorised_sign);
        }
        if ($request->authorised_stamp != '') {
            $authorised_stamp = Storage::put('business/authorised_stamp', $request->authorised_stamp);
        }
        $data->update([
            'logo' => $logo,
            'registration_certificate' => $registration_certificate,
            'gst_certificate' => $gst_certificate,
            'owner_photo' => $owner_profile_pic,
            'authorised_sign' => $authorised_sign,
            'authorised_stamp' => $authorised_stamp,
        ]);
        return $data;
    }

    public function update($request, $id)
    {
        $data = BusinessOnboardApplication::find($id);
        $logo = $data->logo;
        $registration_certificate = $data->registration_certificate;
        $gst_certificate = $data->gst_certificate;
        $owner_profile_pic = $data->owner_profile_pic;
        $authorised_sign = $data->authorised_sign;
        $authorised_stamp = $data->authorised_stamp;
        if ($request->logo != '') {
            $logo = Storage::put('images/logo', $request->logo);
        }
        if ($request->registration_certificate != '') {
            $registration_certificate = Storage::put('business/documents/' . $data['id'], $request->registration_certificate);
        }
        if ($request->gst_certificate != '') {
            $gst_certificate = Storage::put('business/documents/' . $data['id'], $request->gst_certificate);
        }
        if ($request->owner_profile_pic != '') {
            $owner_profile_pic = Storage::put('images/profile_pic', $request->owner_profile_pic);
        }

        if ($request->authorised_sign != '') {
            $authorised_sign = Storage::put('business/authorised_sign', $request->authorised_sign);
        }
        if ($request->authorised_stamp != '') {
            $authorised_stamp = Storage::put('business/authorised_stamp', $request->authorised_stamp);
        }
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'registration_number' => $request->registration_number,
            'gst_number' => $request->gst_number,
            'address' => $request->address,
            'city' => $request->city,
            'pin' => $request->pin,
            'state_id' => $request->state_id,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'owner_email' => $request->owner_email,
            'bank_name' => $request->bank_name,
            'bank_ifsc' => $request->bank_ifsc,
            'bank_swift' => $request->bank_swift,
            'bank_account_holder_name' => $request->bank_account_holder_name,
            'bank_account_number' => $request->bank_account_number,
            'iec_code' => $request->iec_code,
            'ad_code' => $request->ad_code,
            'arn_code' => $request->arn_code,
            'payment_terms' => $request->payment_terms,
            'logo' => $logo,
            'registration_certificate' => $registration_certificate,
            'gst_certificate' => $gst_certificate,
            'owner_photo' => $owner_profile_pic,
            'authorised_sign' => $authorised_sign,
            'authorised_stamp' => $authorised_stamp,
            'subscription_type_id' => $request->subscription_type_id,
        ]);

        return $data;
    }

    public function approve($id)
    {
        $data = BusinessOnboardApplication::find($id);
        $business_data = Business::where('business_onboard_application_id', $id)->first();
        $title = 'Opps!';
        $class = 'error';
        $message = 'Something went wrong';
        
        if ($business_data != null) {
            $class = 'error';
            $title = 'Opps!';
            $message = 'The application has already verified.';
        } else {
            DB::beginTransaction();
            try {
                $user_password = Str::lower(Str::random(12));

                $business = Business::updateOrCreate([
                    'business_onboard_application_id' => $data->id,
                    'name' => $data->name,
                    'email' => $data->email,
                    'phone' => $data->phone,
                    'logo' => $data->logo,
                    'registration_number' => $data->registration_number,
                    'registration_certificate' => $data->registration_certificate,
                    'gst_number' => $data->gst_number,
                    'gst_certificate' => $data->gst_certificate,
                    'address' => $data->address,
                    'city' => $data->city,
                    'pin' => $data->pin,
                    'state_id' => $data->state_id,
                    'bank_name' => $data->bank_name,
                    'bank_ifsc' => $data->bank_ifsc,
                    'bank_swift' => $data->bank_swift,
                    'bank_account_holder_name' => $data->bank_account_holder_name,
                    'bank_account_number' => $data->bank_account_number,
                    'iec_code' => $data->iec_code,
                    'ad_code' => $data->ad_code,
                    'arn_code' => $data->arn_code,
                    'payment_terms' => $data->payment_terms,
                    'partner_id' => $data->partner_id,
                    'admin_id' => $data->admin_id,
                    'approved_by' => Auth::guard('admin')->user()->id,
                    'authorised_sign' => $data->authorised_sign,
                    'authorised_stamp' => $data->authorised_stamp,
                    'subscription_type_id' => $data->subscription_type_id,
                ]);
                BusinessUser::updateOrCreate([
                    'business_id' => $business['id'],
                    'name' => $data->owner_name,
                    'email' => $data->owner_email,
                    'phone' => $data->owner_phone,
                    'profile_pic' => $data->owner_photo,
                    'password' => Hash::make($user_password),
                ]);
                Transaction::updateOrCreate(
                    [
                        'transaction_type_id' => 2,
                        'business_id' => $business['id'],
                        'amount' => 2000,
                    ]
                );
                InvoiceSetting::updateOrCreate(
                    [
                        'business_id' => $business['id'],
                    ]
                );
                ApplicationApproved::dispatch($data, $user_password);
                $data->update(['approved_at' => now()]);
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }

            $class = 'success';
            $title = 'Approved!';
            $message = 'The application has been successfully verified.';
        }
        $response = [
            'title' => $title,
            'class' => $class,
            'message' => $message,
        ];
        return $response;
    }

    public function reject($id)
    {
        $data = BusinessOnboardApplication::find($id);
        
        $business_data = Business::where('business_onboard_application_id', $id)->first();
        $title = 'Opps!';
        $class = 'error';
        $message = 'Something went wrong';

        if ($business_data != null) {
            $class = 'error';
            $title = 'Opps!';
            $message = 'The application has already verified.';
        } else {

            $data->update(['rejected_at' => now()]);
            $class = 'success';
            $title = 'Rejected!';
            $message = 'The application has been rejected successfully.';
        }
        $response = [
            'title' => $title,
            'class' => $class,
            'message' => $message,
        ];
        ApplicationRejected::dispatch($data);
        return $response;
    }
}
