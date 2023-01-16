<?php

namespace App\Http\Livewire\Terminal;

use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Ventes extends Component
{
    use WithPagination;
    use LivewireAlert;
    public  $reseach, $page_active = 3;
    public $id_produit, $pu_prod, $numvente, $description, $qtvendu, $qte_stock, $mttotal;
    public $flag = 0;
    protected $rules = [
        'numvente' => 'required',
        'description' => 'required',
        'qtvendu' => 'required',
    ];

    protected $messages = [
        'description.required' => 'veuillez renseigner la description du produit',
        'qtvendu.required' => 'veuillez entrer la quantité vendue',
    ];
    public function render()
    {

        if ($this->reseach) {
            return view('livewire.terminal.ventes', [
                'products' => Produit::where('description', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhere('designationmesure', 'LIKE', '%' . $this->reseach)
                    ->orwhereHas('categorie', function ($s) {
                        $s->where('designation', 'LIKE', '%' . $this->reseach . '%');
                    })
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.terminal.ventes', [
                'products' => Produit::orderBy('id', 'DESC')->paginate($this->page_active),
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
        $this->numvente = 'VENT-' . str_shuffle($pin);
    }
    public function formvente($id, $code, $description, $qte_stock, $puprod)
    {
        if ($id !== null) {
            $this->flag = 1;
        }
        $this->id_produit = $id;
        $this->qte_stock = $qte_stock;
        $this->pu_prod = $puprod;
        $this->description = $code . ' ' . $description . ' à ' . number_format($this->pu_prod) . ' CDF l\'unité';
    }
    public function savepanier()
    {
        $this->validate();
        try {
            // `id`, `client_id`, `total`, `montant_paie`, `rest_paie`, `user_id`, `created_at`, `updated_at`, `code`
            if ($this->qtvendu <= $this->qte_stock) {
                Vente::create([
                    'code' => $this->code,
                    'total' => $this->mttotal,
                    'montant_paie' => 0,
                    'rest_paie' => $this->mttotal,
                    'user_id' => Auth::user()->id,
                ])->save();
                // Set Flash Message
                $this->alert('success', 'Ajouté au panier');
                // Reset Form Fields After Creating departement
                $this->reset_fields();
            } else {
                $this->alert('info', 'Il n\'y a pas cette quantité dans le stock pour ce produit,');
            }
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec: ' . $e->getMessage());
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        }
    }
    public function reset_fields()
    {
        $this->id_produit = "";
        $this->qte_stock = "";
        $this->description = "";
    }
    public function updatedqtvendu()
    {

        $this->mttotal = floatval($this->qtvendu) * floatval($this->pu_prod);
    }
}