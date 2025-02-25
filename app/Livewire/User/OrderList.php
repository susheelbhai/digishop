<?php

namespace App\Livewire\User;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;
    public $business_id;
    public $page;
    public $page_heading;
    public $customer_id;
    public $input = '';
    public function mount($page = 'orders', $customer_id='')
    {
        // dd($customer_id);
        $this->page = $page;
        $this->customer_id = $customer_id;
        $this->business_id = Auth::guard('web')->user()->business_id;
        switch ($page) {
            case 'dashboard':
                $this->page_heading = 'Todays Order';
                break;
            case 'customer':
                $this->page_heading = 'Order';
                break;
            
            default:
                $this->page_heading = 'Order';
                break;
        }
    }
    public function updatedInput($input)
    {
        $this->input = $input;
    }
    public function render()
    {
        $order_data = Order::where('business_id', $this->business_id)
            ->where(function ($query) {
                $this->query($query);
            })
            ->withSum([
                'products' => fn ($query) => $query->select(DB::raw('sum(quantity*sale_price)'))
            ], 'amount')
            ->latest()
            ->paginate(12);
        return view('livewire.user.order-list', compact('order_data'));
    }

    public function query($query)
    {
        if ($this->page == 'orders') {
            if ($this->input != '') {
                $query
                ->where('customer_phone', 'like', '%' . $this->input . '%')
                ->orWhere('customer_name', 'like', '%' . $this->input . '%')
                ->orWhere('customer_email', 'like', '%' . $this->input . '%')
                ->orWhere('customer_gstin', 'like', '%' . $this->input . '%');           
            } 
        }
        // dd($this->page);
        if ($this->page == 'customer') {
            $query
            ->where('customer_id', '=', $this->customer_id );
            if ($this->input != '') {
                $query
                ->where('id', '=', $this->input );
                       
            } 
        }
        if ($this->page == 'dashboard') {
            // dd(Carbon::today());
            $query
            ->where('created_at', '>=', Carbon::today());
            if ($this->input != '') {
                $query
                ->where('customer_phone', 'like', '%' . $this->input . '%')
                ->orWhere('customer_name', 'like', '%' . $this->input . '%')
                ->orWhere('customer_email', 'like', '%' . $this->input . '%');
                       
            } 
        }
    }
}
