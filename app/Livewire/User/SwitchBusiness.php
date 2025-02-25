<?php

namespace App\Livewire\User;

use App\Models\Business;
use App\Models\BusinessUserRelation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SwitchBusiness extends Component
{
    public $business;
    public function render()
    {
        $businesses = BusinessUserRelation::whereUserId(Auth::user()->id)->with('business')->get();
        $this->business = Auth::user()->business_id;
        return view('livewire.user.switch-business', compact('businesses'));
    }

    public function updatedBusiness($id)
    {
        $this->business = $id;
        User::whereId(Auth::user()->id)->update(['business_id' => $id]);
        $this->js('window.location.reload()'); 
    }
}
