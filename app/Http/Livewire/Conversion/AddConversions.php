<?php

namespace App\Http\Livewire\Conversion;

use App\Models\Conversion;
use App\Models\Produit;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddConversions extends Component
{
    use LivewireAlert;
    public $selectProdui1;
    public $quantite;
    public $selectProdui2;
    public $qte_ajout;
    public $motif;

    public $oldqte;
    public $oldquantite;

    public $produits;
    public $unite;
    public $unite2;

    public $toto;

    protected $rules = [
        'selectProdui1' => 'required',
        'quantite' => 'required',
        'selectProdui2' => 'required',
        'qte_ajout' => 'required',
        'motif' => 'required',
    ];

    public function save()
    {
        $this->validate();
        Conversion::create([
            'produit_id' => $this->selectProdui1,
            'quantite' => $this->quantite,
            'produit_code' => $this->selectProdui2,
            'qte_ajout' => $this->qte_ajout,
            'motif' => $this->motif,
        ])->save();
    }

    public function updatedselectProdui1($id)
    {
        $vars = Produit::whereId($id)->first();
        $this->unite = $vars->designationmesure;
    }

    public function updatedselectProdui2($id)
    {
        if ($this->selectProdui1 == $this->selectProdui2) {
            $this->alert('error', 'Vous avez selectionné le même Produit', [
                'position' => 'center'
            ]);
            $this->selectProdui2 = null;
        }
        $vars = Produit::whereId($id)->first();
        $this->unite2 = $vars->designationmesure;
    }
    public function mount()
    {
        $this->produits = Produit::all();
    }
    public function render()
    {
        return view('livewire.conversion.add-conversions');
    }
}