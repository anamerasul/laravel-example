<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Service;

class Services extends Component
{
    public function render()
    {
        $services = Service::orderBy('is_featured', 'desc')->orderBy('name')->get();
        return view('livewire.pages.services', compact('services'))
            ->layout('layouts.base', ['title' => 'Services']);
    }
}
