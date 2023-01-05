<?php

namespace App\Http\Livewire\Approvisionnement;

use App\Models\Approvisionnement;
use App\Models\Produit;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddApprovs extends Component
{
    use LivewireAlert;
    public $code;
    public $produit_id;
    public $qte_approv;
    public $pu_approv;
    public $pt_approv;
    
    protected $rules = [
        'code' => 'required',
        'produit_id' => 'required',
        'qte_approv' => 'required|integer',
        'pu_approv' => 'required|float',
    ];
        // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        $this->validate();
        // Validate Form Request
        try {
            Approvisionnement::create([
                'code' => $this->code,
                'produit_id' => $this->produit_id,
                'qte_approv' => $this->qte_approv,
                'pu_approv' => $this->pu_approv,
                'pt_approv' => ($this->pu_approv * $this->qte_approv)
            ])->save();
            // Set Flash Message
            $this->alert('success', 'Categorie bien enregistrer');
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement');
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        }
    }
    public function mount(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000, 9999).$characters[rand(0, strlen('ABCDEFGHIJKLMNOPQRSTUVWXYZ') - 1)];
        $this->code = 'AP-'. str_shuffle($pin);
    }
    public function render()
    {
        $produits = Produit::all();
        return view('livewire.approvisionnement.add-approvs', ['produits' => $produits]);
    }
}
