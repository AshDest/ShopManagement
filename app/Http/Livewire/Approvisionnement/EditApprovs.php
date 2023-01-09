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
                'produit_id' => $this->ids,
                'qte_approv' => $this->qte_approv,
                'pu_approv' => $this->pu_approv,
                'pt_approv' => ($this->pu_approv * $this->qte_approv),
            ])->save();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function mount()
    {
        $vars = Approvisionnement::find($this->ids);
        $this->code = $vars->code;
        $this->produit_id = $vars->produit_id;
        $this->qte_approv = $vars->oldQte;
        $this->pu_approv = $vars->pu_approv;
    }
    public function render()
    {
        $produits = Produit::all();
        return view('livewire.approvisionnement.edit-approvs', ['produits' => $produits]);
    }
}
