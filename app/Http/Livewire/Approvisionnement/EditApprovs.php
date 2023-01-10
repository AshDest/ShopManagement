<?php

namespace App\Http\Livewire\Approvisionnement;

use App\Models\Approvisionnement;
use App\Models\Produit;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditApprovs extends Component
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
    public $oldQte;
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
        try {
            Approvisionnement::find($this->ids)->fill([
                'code' => $this->code,
                'produit_id' => $this->produit_id,
                'qte_approv' => $this->qte_approv,
                'pu_approv' => $this->pu_approv,
                'pt_approv' => ($this->pu_approv * $this->qte_approv),
            ])->save();

            Produit::find($this->produit_id)->fill([
                'qte_stock' => ($this->currentQte - $this->oldQte) + $this->qte_approv,
                'pu_achat' => $this->pu_approv,
                'pu' => $this->pu_vente,
            ])->save();
            // Set Flash Message
            $this->alert('success', 'Approvisionnement bien enregistrer');
            // Reset Form Fields After Creating departement
            return redirect()->to(route('listapprovisionnement'));
        } catch (\Throwable $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement: ' . $e->getMessage());
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        }
    }
    public function mount()
    {
        $vars = Approvisionnement::find($this->ids);
        $this->code = $vars->code;
        $this->produit_id = $vars->produit_id;
        $this->oldQte = $vars->qte_approv;
        $this->qte_approv = $vars->qte_approv;
        $this->pu_approv = $vars->pu_approv;

        $produit = Produit::find($this->produit_id);
        $this->description = $produit->description;
        $this->currentQte = $produit->qte_stock;
        $this->pu_vente = $produit->pu;
        $this->unite = $produit->categorie->mesure;
    }
    public function render()
    {
        return view('livewire.approvisionnement.edit-approvs');
    }
}