<?php

namespace App\Http\Livewire\Conversion;

use App\Models\Conversion;
use App\Models\Produit;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditConversion extends Component
{
    use LivewireAlert;
    public $conversion;
    public $selectProdui1;
    public $quantite;
    public $selectProdui2;
    public $qte_ajout;
    public $motif;
    public $prix_vente;

    public $oldqte;
    public $oldquantite;

    public $unite;
    public $unite2;

    public $idprod1 = null;
    public $idprod2 = null;

    public $catprod1 = null;
    public $catprod2 = null;

    public function mount()
    {
        $vars = Conversion::find($this->conversion);
        $this->selectProdui1 = $vars->produit->description;
        $this->selectProdui2 = $vars->convertis->description;
        $this->oldqte = $vars->quantite;
        $this->oldquantite = $vars->qte_ajout;
        $this->quantite = $vars->quantite;
        $this->qte_ajout = $vars->qte_ajout;
        $this->unite = $vars->produit->designationmesure;
        $this->unite2 = $vars->convertis->designationmesure;
        $this->prix_vente = $vars->convertis->pu;
        $this->idprod1 = $vars->produit_id;
        $this->idprod2 = $vars->produit_code;
    }

    public function update()
    {
        $this->validate([
            'selectProdui1' => 'required',
            'quantite' => 'required',
            'selectProdui2' => 'required',
            'qte_ajout' => 'required',
            'prix_vente' => 'required'
        ]);
        try {
            $prod1 = Produit::whereId($this->idprod1)->first();
            $prod2 = Produit::whereId($this->idprod2)->first();
            $vars = Conversion::whereId($this->conversion)->first();

            if ($prod1 && $prod2) {
                if ($this->quantite > $prod1->qte_stock) {
                    $this->alert('error', 'La quantité de produit à convertir est supérieur à la quantité disponible en stock', [
                        'position' => 'center'
                    ]);
                    return;
                } else {
                    $vars->produit_id = $this->idprod1;
                    $vars->quantite = $this->quantite;
                    $vars->produit_code = $this->idprod2;
                    $vars->qte_ajout = $this->qte_ajout;
                    $vars->save();
                    // restituer la quantité du produit converti dans le stock et diminuer la quantité du produit converti dans le stock
                    $prod1->qte_stock = ($prod1->qte_stock + $this->oldqte) - $this->quantite;
                    $prod1->save();

                    // diminuer la quantité du produit converti dans le stock et ajouter la quantité du produit converti dans le stock
                    $prod2->qte_stock = ($prod2->qte_stock - $this->oldquantite) + $this->qte_ajout;
                    $prod2->pu = $this->prix_vente;
                    $prod2->save();

                    $this->alert('success', 'Conversion modifiée avec succès', [
                        'position' => 'center'
                    ]);
                    return redirect()->to(route('listconversion'));
                }
            } else {
                $this->alert('error', 'Veuillez choisir un produit', [
                    'position' => 'center'
                ]);
            }
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.conversion.edit-conversion');
    }
}
