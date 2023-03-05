<?php

namespace App\Http\Livewire\Terminal;

use App\Models\Caisse;
use App\Models\Depense;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Depenses extends Component
{

    use WithPagination;
    use LivewireAlert;
    public  $reseach, $reseach2, $page_active = 4;

    public $depense;
    public $montant;
    public $libelle;
    public $user_id;

    protected $listeners = ['depenseAdded' => '$refresh'];

    public function create()
    {
        $this->validate([
            'montant' => 'required|numeric',
            'libelle' => 'required',
        ]);

        $caisse = Caisse::where('user_id', Auth::user()->id)->first();
        if (!$caisse) {
            $caisse = Caisse::create([
                'user_id' => Auth::user()->id,
                'solde' => 0
            ]);
        }
        if ($caisse->solde > $this->montant) {
            $depense = Depense::create([
                'montant' => $this->montant,
                'libelle' => $this->libelle,
                'user_id' => Auth::user()->id,
            ]);
            $caisse->solde -= $this->montant;
            $caisse->save();
            $this->alert('success', 'Enregistrement Reussi!');
            $this->closeModal();
            $this->reset();
        } else {
            $this->alert('warning', 'La caisse est Insuffisante!');
        }
    }

    public function edit(Depense $depense)
    {
        $this->depense = $depense;
        $this->montant = $depense->montant;
        $this->libelle = $depense->libelle;
        $this->openeditModal();
    }

    public function update()
    {
        $this->validate([
            'montant' => 'required|numeric',
            'libelle' => 'required',
        ]);

        $caisse = Caisse::where('user_id', Auth::user()->id)->first();

        $depense = Depense::find($this->depense->id);

        if ($caisse->solde > $this->montant) {
            $caisse->solde += $depense->montant;
            $caisse->solde -= $this->montant;
            $caisse->save();

            $depense->update([
                'montant' => $this->montant,
                'libelle' => $this->libelle,
                'user_id' => Auth::user()->id,
            ]);
            $this->alert('success', 'Modification Reussie!');
            $this->emit('editmodal');
            $this->closeModal();
            $this->reset();
        } else {
            $this->alert('warning', 'La caisse est Insuffisante!');
        }
    }

    public function delete(Depense $depense)
    {
        $caisse = Caisse::where('user_id', $depense->user_id)->first();

        $caisse->solde += $depense->montant;
        $caisse->save();

        $depense->delete();
        $this->alert('success', 'Suppression Reussie!');
    }
    public function openModal()
    {
        $this->dispatchBrowserEvent('openModal');
    }
    public function openeditModal()
    {
        $this->dispatchBrowserEvent('openeditModal');
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }
    public function render()
    {
        return view('livewire.terminal.depenses', ['depenses' => Depense::orderBy('created_at', 'DESC')->paginate($this->page_active)]);
    }
}