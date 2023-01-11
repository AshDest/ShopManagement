<?php

namespace App\Http\Livewire\Approvisionnement;

use App\Models\Approvisionnement;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddApprovs extends Component
{
    use LivewireAlert;
    public $code;
    public $produit_id;
    public $description;
    public $qte_approv;
    public $pu_approv;
    public $pt_approv;

    public $ids;
    public $currentQte;
    public $pu_vente;
    public $unite;

    protected $rules = [
        'code' => 'required',
        'qte_approv' => 'required|integer',
        'pu_approv' => 'required|integer',
        'pu_vente' => 'required|integer',
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
                'produit_id' => $this->ids,
                'qte_approv' => $this->qte_approv,
                'pu_approv' => $this->pu_approv,
                'pt_approv' => ($this->pu_approv * $this->qte_approv),
                'user_id' => Auth::user()->id,
            ])->save();

            Produit::find($this->ids)->fill([
                'qte_stock' => ($this->currentQte + $this->qte_approv),
                'pu_achat' => $this->pu_approv,
                'pu' => $this->pu_vente,
            ])->save();
            // Set Flash Message
            $this->alert('success', 'Approvisionnement bien enregistrer');
            // Reset Form Fields After Creating departement
            return redirect()->to(route('listapprovisionnement'));
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement: ' . $e->getMessage());
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        }
    }
    public function mount()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000, 9999) . $characters[rand(0, strlen('ABCDEFGHIJKLMNOPQRSTUVWXYZ') - 1)];
        $this->code = 'AP-' . str_shuffle($pin);

        $produit = Produit::find($this->ids);
        $this->description = $produit->description;
        $this->currentQte = $produit->qte_stock;
        $this->unite = $produit->categorie->mesure;
    }
    public function render()
    {
        return view('livewire.approvisionnement.add-approvs');
    }
}