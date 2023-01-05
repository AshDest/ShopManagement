<?php

namespace App\Http\Livewire\Approvisionnement;

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

    public function render()
    {
        $produits = Produit::all();
        return view('livewire.approvisionnement.edit-approvs', ['produits' => $produits]);
    }
}
