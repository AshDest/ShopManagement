<?php

namespace App\Http\Livewire\Terminal;

use App\Models\Dette;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Paiements extends Component
{
    use WithPagination;
    use LivewireAlert;
    public  $reseach, $reseach2, $page_active = 4;

    public $montant_dette;
    public $dette;
    public $montant_paie;
    public $dette_id;


    protected $rules = [
        'montant_paie' => 'required',
    ];

    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function paiementview($id)
    {
        $vars = Dette::where('id', $id)->first();
        $this->dette_id = $vars->id;
        $this->dette = $vars->total_dette;
        $this->montant_dette = number_format($vars->total_dette) . ' CDF';
        $this->dispatchBrowserEvent('paiementview');
    }

    public function savepaiement()
    {
        $this->validate();
        try {
            Paiement::create([
                'dette_id' => $this->dette_id,
                'montant_paie' => $this->montant_paie,
                'reste_paie' => ($this->dette - $this->montant_paie),
                'user_id' => Auth::user()->id,
            ])->save();

            Dette::find($this->dette_id)->fill([
                'total_dette' => ($this->dette - $this->montant_paie),
            ])->save();
            // Set Flash Message
            $this->alert('success', 'Paiement bien enregistrer');
            // Reset Form Fields After Creating departement
            return redirect()->to(route('paiements'));
        } catch (\Throwable $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement: ' . $e->getMessage());
            // Reset Form Fields After Creating departement
        }
    }
    public function render()
    {
        if ($this->reseach) {
            return view('livewire.terminal.paiements', [
                'dettes' => Dette::where('client_id', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhereHas('client', function ($s) {
                        $s->where('noms', 'LIKE', '%' . $this->reseach . '%');
                    })
                    ->paginate($this->page_active),
                'paies' => Paiement::orderBy('created_at', 'DESC')->paginate($this->page_active)
            ]);
        }
        if ($this->reseach2) {
            return view('livewire.terminal.paiements', [
                'paies' => Paiement::where('montant_paie', 'LIKE', '%' . $this->reseach2 . '%')
                    ->orwhereHas('dette', function ($s) {
                        $s->orwhereHas('client', function ($t) {
                            $t->where('noms', 'LIKE', '%' . $this->reseach2 . '%');
                        });
                    })
                    ->paginate($this->page_active),
                'dettes' => Dette::orderBy('created_at', 'DESC')->paginate($this->page_active),
            ]);
        } else {
            return view('livewire.terminal.paiements', [
                'dettes' => Dette::orderBy('created_at', 'DESC')->paginate($this->page_active),
                'paies' => Paiement::orderBy('created_at', 'DESC')->paginate($this->page_active)
            ]);
        }
    }
}