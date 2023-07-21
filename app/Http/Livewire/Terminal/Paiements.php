<?php

namespace App\Http\Livewire\Terminal;

use App\Models\Caisse;
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

    public $dets;
    public $montant;
    public $paiement_id;

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

    public function paiementedit(Paiement $paiement)
    {
        // $vars = Paiement::where('id', $ids)->first();
        $this->paiement_id = $paiement->id;
        $this->dette_id = $paiement->dette_id;
        $this->montant = $paiement->montant_paie;
        $this->dispatchBrowserEvent('paiementedit');
    }

    public function update()
    {
        try {
            $caisse = Caisse::where('user_id', Auth::user()->id)->first();
            $paies = Paiement::find($this->paiement_id);
            $old_dettes = Dette::find($this->dette_id);
            // dd($this->paiement_id);
            if (!$caisse) {
                $caisse = Caisse::create([
                    'user_id' => Auth::user()->id,
                    'solde' => 0
                ]);
            }

            if ($this->montant <= $old_dettes->total_dette + $paies->montant_paie) {


                // Mofification de la caisse
                $caisse->solde -= $paies->montant_paie;
                $caisse->solde += $this->montant;
                $caisse->save();

                //Modification de la dette
                $old_dettes->total_dette += $paies->montant_paie;
                $old_dettes->total_dette -= $this->montant;
                $old_dettes->save();

                // modification du paiement
                $paies->update([
                    'dette_id' => $this->dette_id,
                    'montant_paie' => $this->montant,
                    'reste_paie' => ($paies->montant_paie + $paies->reste_paie) - $this->montant,
                    'user_id' => Auth::user()->id,
                ]);

                // Set Flash Message
                $this->alert('success', 'Paiement bien Modifier!!');
                // Reset Form Fields After Creating departement
                return redirect()->to(route('paiements'));
            } else {
                $this->alert('warning', 'Montant Superieur à la dette!!');
            }
        } catch (\Throwable $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement: ' . $e->getMessage());
            // Reset Form Fields After Creating departement
        }
    }

    public function savepaiement()
    {
        $this->validate();
        try {
            $caisse = Caisse::where('user_id', Auth::user()->id)->first();
            if (!$caisse) {
                $caisse = Caisse::create([
                    'user_id' => Auth::user()->id,
                    'solde' => 0
                ]);
            }
            if ($this->montant_paie <= $this->dette) {
                Paiement::create([
                    'dette_id' => $this->dette_id,
                    'montant_paie' => $this->montant_paie,
                    'reste_paie' => ($this->dette - $this->montant_paie),
                    'user_id' => Auth::user()->id,
                ])->save();

                Dette::find($this->dette_id)->fill([
                    'total_dette' => ($this->dette - $this->montant_paie),
                ])->save();

                $caisse->solde += $this->montant_paie;
                $caisse->save();
                // Set Flash Message
                $this->alert('success', 'Paiement bien enregistrer');
                // Reset Form Fields After Creating departement
                return redirect()->to(route('paiements'));
            } else {
                $this->alert('warning', 'Montant Superieur à la dette!!');
            }
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
                'dettes' => Dette::where('user_id', Auth::user()->id)
                    ->where('client_id', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhereHas('client', function ($s) {
                        $s->where('noms', 'LIKE', '%' . $this->reseach . '%');
                    })
                    ->paginate($this->page_active),
                'paies' => Paiement::where('user_id', Auth::user()->id)
                    ->orderBy('created_at', 'DESC')->paginate($this->page_active)
            ]);
        }
        if ($this->reseach2) {
            return view('livewire.terminal.paiements', [
                'paies' => Paiement::where('user_id', Auth::user()->id)
                    ->where('montant_paie', 'LIKE', '%' . $this->reseach2 . '%')
                    ->orwhereHas('dette', function ($t) {
                        $t->whereHas('client', function ($s) {
                            $s->where('noms', 'LIKE', '%' . $this->reseach2 . '%');
                        });
                    })
                    ->paginate($this->page_active),
                'dettes' => Dette::where('user_id', Auth::user()->id)
                    ->orderBy('created_at', 'DESC')->paginate($this->page_active),
            ]);
        }

        return view('livewire.terminal.paiements', [
            'dettes' => Dette::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate($this->page_active),
            'paies' => Paiement::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate($this->page_active)
        ]);
    }
}
