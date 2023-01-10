<?php

namespace App\Http\Livewire\Tableudeboard;

use App\Models\Client;
use App\Models\DetailVente;
use App\Models\Produit;
use App\Models\Vente;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Dashaboard extends Component
{
    use LivewireAlert;
    public $dt_filtre, $nbr_client, $nbr_produit, $nbr_vente, $nbr_benefice;
    public function charger()
    {
        if ($this->dt_filtre) {
            dd($this->dt_filtre);
        } else {
            $this->alert('warning', 'Veuillez selectionner une date svp!');
        }
    }
    public function render()
    {
        $this->nbr_client = Client::count();
        $this->nbr_produit = Produit::where('qte_stock', '!=', '0')->count();
        $this->nbr_benefice = DetailVente::sum('resultat');
        $this->nbr_vente = Vente::count();
        return view('livewire.tableudeboard.dashaboard');
    }
}