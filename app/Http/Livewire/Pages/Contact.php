<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Lead;

class Contact extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $service_interest = '';
    public $message = '';
    public $submitted = false;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'phone' => 'nullable',
        'service_interest' => 'nullable',
        'message' => 'nullable|max:2000',
    ];

    public function submit()
    {
        $data = $this->validate();
        Lead::create($data);
        $this->reset(['name','email','phone','service_interest','message']);
        $this->submitted = true;
    }

    public function render()
    {
        return view('livewire.pages.contact')
            ->layout('layouts.base', ['title' => 'Contact']);
    }
}
