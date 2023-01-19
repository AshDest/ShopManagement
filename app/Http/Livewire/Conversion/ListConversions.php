<?php

namespace App\Http\Livewire\Conversion;

use App\Models\Conversion;
use Livewire\Component;
use Livewire\WithPagination;

class ListConversions extends Component
{
    use WithPagination;
    public  $reseach, $page_active = 4;
    public function render()
    {
        if ($this->reseach) {
            return view('livewire.conversion.list-conversions', [
                'conversions' => Conversion::where('id', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhereHas('produit', function ($s) {
                        $s->where('description', 'LIKE', '%' . $this->reseach . '%');
                    })
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.conversion.list-conversions', [
                'conversions' => Conversion::orderBy('id', 'DESC')->paginate($this->page_active)
            ]);
        }
    }
}