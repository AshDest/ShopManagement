<?php

namespace App\Http\Livewire\Terminal;

use App\Models\Vente;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Listevente extends Component
{
    use WithPagination;
    use LivewireAlert;
    public  $reseach, $page_active = 4;
    public $dt_filtre;
    public function resets()
    {
        $this->dt_filtre = Null;
    }

    public function render()
    {
        if ($this->reseach) {
            return view('livewire.terminal.listevente', [
                'ventes' => Vente::where('user_id', Auth::user()->id)
                    ->where('code', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhere('id', 'LIKE', '%' . $this->reseach)
                    ->paginate($this->page_active)
            ]);
        } else if ($this->dt_filtre) {
            $now = Carbon::now()->toDateTimeString();
            // dd($now);
            return view('livewire.terminal.listevente', [
                'ventes' => Vente::where('user_id', Auth::user()->id)
                    ->whereBetween('created_at', [$this->dt_filtre, $now])
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.terminal.listevente', [
                'ventes' => Vente::where('user_id', Auth::user()->id)
                    ->orderBy('id', 'DESC')->paginate($this->page_active),
            ]);
        }
    }
}
