<?php

namespace App\Http\Livewire\Conversion;

use App\Models\Conversion;
use App\Models\Produit;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class AddConversions extends Component
{
    use WithPagination;
    use LivewireAlert;
    public  $reseach, $page_active = 4;

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

    public $toto;

    protected $rules = [
        'selectProdui1' => 'required',
        'quantite' => 'required',
        'selectProdui2' => 'required',
        'qte_ajout' => 'required',
        'prix_vente' => 'required'
    ];

    public function save()
    {
        $this->validate();
        try {
            $prod1 = Produit::whereId($this->idprod1)->first();
            $prod2 = Produit::whereId($this->idprod2)->first();

            if ($prod1 && $prod2) {
                if ($this->quantite > $prod1->qte_stock) {
                    $this->alert('error', 'La quantité de produit à convertir est supérieur à la quantité disponible en stock', [
                        'position' => 'center'
                    ]);
                    return;
                } else {
                    Conversion::create([
                        'produit_id' => $this->idprod1,
                        'quantite' => $this->quantite,
                        'produit_code' => $this->idprod2,
                        'qte_ajout' => $this->qte_ajout,
                    ])->save();

                    $prod1->update([
                        'qte_stock' => $prod1->qte_stock - $this->quantite
                    ]);
                    $prod2->update([
                        'qte_stock' => $prod2->qte_stock + $this->qte_ajout,
                        'pu' => $this->prix_vente
                    ]);
                    $this->alert('success', 'Conversion bien enregistrer');

                    return redirect()->to(route('listconversion'));
                }
            }
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }
    public function addproducts($id)
    {
        $vars = Produit::whereId($id)->first();
        // dd($vars->category_id);
        if ($this->selectProdui1) {
            $this->idprod2 = $id;
            $this->catprod2 = $vars->category_id;
            if ($this->idprod1 == $this->idprod2) {
                $this->alert('error', 'Vous avez selectionné le même Produit', [
                    'position' => 'center'
                ]);
                $this->selectProdui2 = null;
            } else {

                if ($this->catprod1 != $this->catprod2) {
                    $this->alert('error', 'Les deux produits ne peuvent pas être convertis!!! Veuillez recommencer', [
                        'position' => 'center'
                    ]);
                    $this->selectProdui2 = null;
                } else {
                    $this->selectProdui2 = $vars->description;
                    $this->unite2 = $vars->designationmesure;
                }
            }
        } else {
            $this->idprod1 = $id;
            $this->catprod1 = $vars->category_id;
            $this->selectProdui1 = $vars->description;
            $this->unite = $vars->designationmesure;
        }
    }
    public function render()
    {
        // return view('livewire.conversion.add-conversions');
        if ($this->reseach) {
            return view('livewire.conversion.add-conversions', [
                'produits' => Produit::where('description', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhereHas('categorie', function ($s) {
                        $s->where('designation', 'LIKE', '%' . $this->reseach . '%');
                    })
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.conversion.add-conversions', [
                'produits' => Produit::orderBy('id', 'DESC')->paginate($this->page_active)
            ]);
        }
    }
}
