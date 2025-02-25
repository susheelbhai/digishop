<?php

namespace App\Contracts;

interface BusinessOnboardApplicationContract
{
    public function store($request);
    public function update($request, $id);
    public function approve($id);
    public function reject($id);
    
}
