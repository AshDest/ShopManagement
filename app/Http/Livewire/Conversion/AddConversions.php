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

    public function addproducts($id)
    {
        $vars = Produit::whereId($id)->first();
        if ($this->selectProdui1) {
            $this->idprod2 = $id;
            $this->catprod2 = $vars->categorie_id;
            if ($this->idprod1 == $this->idprod2) {
                $this->alert('error', 'Vous avez selectionné le même Produit', [
                    'position' => 'center'
                ]);
                $this->selectProdui2 = null;
            } else {
                if ($this->catprod1 != $this->catprod2) {
                    $this->alert('error', 'Vous avez selectionné des Produits de catégories différentes', [
                        'position' => 'center'
                    ]);
                    $this->selectProdui2 = null;
                }
            }
            // $this->selectProdui2 = $vars->description;
            // $this->unite2 = $vars->designationmesure;
        } else {
            $this->idprod1 = $id;
            $this->catprod1 = $vars->categorie_id;
            $this->selectProdui1 = $vars->description;
            $this->unite = $vars->designationmesure;
        }
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
    // public function mount()
    // {
    //     $this->produits = Produit::all();
    // }
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
