<?php

namespace App\Http\Livewire\Terminal;

use Livewire\Component;
use App\Models\Conversion;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
class ConversionTerminal extends Component
{
    use WithPagination;
    public  $reseach, $page_active = 4;
    public function render()
    {

        if ($this->reseach) {
            return view('livewire.terminal.conversion-terminal', [
                'conversions' => Conversion::where('id', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhereHas('produit', function ($s) {
                        $s->where('user_id', Auth::user()->id)
                        ->where('description', 'LIKE', '%' . $this->reseach . '%');
                    })
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.terminal.conversion-terminal', [
                'conversions' => Conversion::whereHas('produit', function ($s) {
                    $s->where('user_id', Auth::user()->id);
                })->orderBy('id', 'DESC')->paginate($this->page_active)
            ]);
        }
    }
}
