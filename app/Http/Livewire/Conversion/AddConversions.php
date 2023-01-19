<?php

namespace App\Http\Livewire\Conversion;

use App\Models\Conversion;
use Livewire\Component;

class AddConversions extends Component
{
    public $produit_id;
    public $quantite;
    public $produit_code;
    public $qte_ajout;
    public $motif;

    public $oldqte;
    public $oldquantite;

    protected $rules = [
        'produit_id' => 'required',
        'quantite' => 'required',
        'produit_code' => 'required',
        'qte_ajout' => 'required',
        'motif' => 'required',
    ];

    public function save()
    {
        $this->validate();
        Conversion::create([
            'produit_id' => $this->produit_id,
            'quantite' => $this->quantite,
            'produit_code' => $this->produit_code,
            'qte_ajout' => $this->qte_ajout,
            'motif' => $this->motif,
        ])->save();
    }
    public function render()
    {
        return view('livewire.conversion.add-conversions');
    }
}