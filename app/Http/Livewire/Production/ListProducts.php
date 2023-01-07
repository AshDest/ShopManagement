<?php

namespace App\Http\Livewire\Production;

use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ListProducts extends Component
{
    use WithPagination;
    use LivewireAlert;

    public  $reseach, $page_active = 4;
    public  $categories;
    
    public function render()
    {
        return view('livewire.production.list-products');
    }
}
