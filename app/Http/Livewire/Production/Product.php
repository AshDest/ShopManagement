<?php

namespace App\Http\Livewire\Production;

use App\Models\Categorie;
use App\Models\Produit;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Product extends Component
{
    use WithPagination;
    use LivewireAlert;
    public  $reseach, $page_active = 4;
    public $code, $description, $qte_stock, $pvu, $categoryselected, $categories;
    public  $categoryselectedvalue, $categorie_id;

    public $desplayeditform = null;
    protected $rules = [
        'code' => 'required',
        'description' => 'required',
        'pvu' => 'required|integer',
    ];

    protected $messages = [
        'description.required' => 'veuillez renseigner la description du produit',
        'pvu.required' => 'veuillez renseigner le prix vente unitaire',
    ];
    protected $listeners = [
        'confirmed'
    ];
    public function delete($id)
    {
        $this->desplayeditform = $id;
        $this->alert('warning', 'Etes vous sur?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Suprimer',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled',
            'position' => 'center'
        ]);
    }
    public function confirmed()
    {
        $categdel = Produit::whereId($this->desplayeditform)->delete();
        if ($categdel) {
            $this->alert('info', 'produit bien Suprime!');
            $this->reset_fields();
        }
    }
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function saveproduit()
    {
        $this->validate();
        // Validate Form Request
        try {
            Produit::create([
                'code' => $this->code,
                'description' => $this->description,
                'pu' => $this->pvu,
                'category_id' => $this->categoryselected,
            ])->save();
            // Set Flash Message
            $this->alert('success', 'produit bien enregistré');
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement');
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        }
    }
    public function editproduct($id)
    {
        $this->desplayeditform = $id;
        $products = Produit::find($this->desplayeditform);
        $this->code = $products->code;
        $this->description = $products->description;
        $this->pvu = $products->pu;
        $this->categoryselectedvalue = $products->categorie->designation;
        $this->categorie_id = $products->category_id;
    }
    public function reset_fields()
    {
        $this->description = '';
        $this->code = '';
        $this->pvu = '';
        $this->codeproduit();
        $this->desplayeditform = null;
    }
    public function editproduit()
    {
        try {
            Produit::find($this->desplayeditform)->fill([
                'description' => $this->description,
                'pu' => $this->pvu,
                'category_id' => $this->categoryselected,
            ])->save();
            $this->alert('success', 'Produit bien Modifier!');
            $this->reset_fields();
        } catch (\Exception $e) {
            $this->alert('warning', 'Echec de modification!' . $e->getMessage());
        }
    }
    public function render()
    {
        $this->categories = Categorie::all();
        if ($this->reseach) {
            return view('livewire.production.product', [
                'products' => Produit::where('description', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhereHas('categorie', function ($s) {
                        $s->where('designation', 'LIKE', '%' . $this->reseach . '%');
                    })
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.production.product', [
                'products' => Produit::orderBy('id', 'DESC')->paginate($this->page_active)
            ]);
        }
    }
    public function mount()
    {
        $this->codeproduit();
    }
    public function codeproduit()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000, 9999) . $characters[rand(0, strlen('ABCDEFGHIJKLMNOPQRSTUVWXYZ') - 1)];
        $this->code = 'PROD-' . str_shuffle($pin);
    }
}