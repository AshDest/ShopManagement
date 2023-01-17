<?php

namespace App\Http\Livewire\Terminal;

use App\Models\DetailVente;
use App\Models\Panier;
use App\Models\Produit;
use App\Models\Vente;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Ventes extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $paniers = null;
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
        $this->paniers = DetailVente::whereHas('vente', function ($s) {
            $s->where('code', $this->numvente);
        })->get();

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
                'products' => Produit::orderBy('qte_stock', 'DESC')->paginate($this->page_active),
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
        $this->qtvendu = "";
        $this->mttotal = "";
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

                $v_id = Vente::where('code', $this->numvente)->first();
                $vente = false;
                if ($v_id) {
                    $vente = Vente::find($v_id->id)->fill([
                        'total' => $this->mttotal + $v_id->total,
                        'rest_paie' => $this->mttotal + $v_id->rest_paie,
                    ])->save();
                } else {
                    $vente = Vente::create([
                        'code' => $this->numvente,
                        'total' => $this->mttotal,
                        'montant_paie' => 0,
                        'rest_paie' => $this->mttotal,
                        'user_id' => Auth::user()->id,
                    ])->save();
                }
                if ($vente) {
                    $vente_id = Vente::where('code', $this->numvente)->first(['id'])->id;
                    $now = Carbon::now();
                    $detailsvente = DetailVente::create([
                        'produit_id' => $this->id_produit,
                        'vente_id' => $vente_id,
                        'qte_vente' => $this->qtvendu,
                        'pu_vente' => $this->pu_prod,
                        'pt_vente' => $this->mttotal,
                        'resultat' => 0,
                        'month' => $now->month,
                    ])->save();
                }
                // Set Flash Message
                if ($detailsvente) {
                    // $updateproduits = Produit::where('id', $this->id_produit)->first();
                    $newprod = $this->qte_stock - $this->qtvendu;
                    $prod = Produit::find($this->id_produit)->fill([
                        'qte_stock' => $newprod,
                    ])->save();
                    if ($prod) {
                        $this->alert('success', 'Ajouté au panier');
                        $this->reset_fields();
                    }
                }
                // Reset Form Fields After Creating departement

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
        $this->mttotal = "";
        $this->description = "";
    }
    public function updatedqtvendu()
    {
        $this->mttotal = floatval($this->qtvendu) * floatval($this->pu_prod);
    }
    public function suppannier($id, $qte, $vente_id, $mttotal)
    {
        $detaildel = DetailVente::where('produit_id', $id)->delete();
        if ($detaildel) {
            $produitqt = Produit::where('id', $id)->first();
            $qte_updated = $qte + $produitqt->qte_stock;
            $produp = Produit::find($id)->fill([
                'qte_stock' => $qte_updated,
            ])->save();
            $vente_upd = Vente::where('id', $vente_id)->first();
            $vente = Vente::find($vente_id)->fill([
                'total' => $vente_upd->total - $mttotal,
                'rest_paie' => $vente_upd->rest_paie - $mttotal,
            ])->save();
            $revente_upd = Vente::where('id', $vente_id)->first();
            if (($revente_upd->total == "0.00") && ($revente_upd->code == $this->numvente)) {
                Vente::where('code', $this->numvente)->delete();
            }
            if ($produp) {
                $this->alert('info', 'Produit suprimer dans le panier!');
            }
        }
    }
    public function paiement()
    {
        $this->dispatchBrowserEvent('paiementsave');
    }
}