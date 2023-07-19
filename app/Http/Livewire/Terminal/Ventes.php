<?php

namespace App\Http\Livewire\Terminal;

use App\Models\Caisse;
use App\Models\Client;
use App\Models\DetailVente;
use App\Models\Dette;
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
    public $id_produit, $pu_prod, $numvente, $description, $qtvendu, $qte_stock, $mttotal, $pu_achat;
    public $flag = 0;
    public $numventepaiement, $mtapayer, $mtpayer, $formclient = false;
    public $numphoneclient, $nomcompletclient, $client_id, $idvente;
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
                'products' => Produit::where('user_id', Auth::user()->id)
                    ->where(
                        function ($query) {
                            $query->where('description', 'LIKE', '%' . $this->reseach . '%')
                                ->orwhere('designationmesure', 'LIKE', '%' . $this->reseach)
                                ->orwhereHas('categorie', function ($s) {
                                    $s->where('designation', 'LIKE', '%' . $this->reseach . '%');
                                });
                        }
                    )
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.terminal.ventes', [
                'products' => Produit::where('user_id', Auth::user()->id)
                    ->orderBy('qte_stock', 'DESC')->paginate($this->page_active),
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
    public function formvente($id, $code, $description, $qte_stock, $puprod, $pa_u)
    {
        $this->qtvendu = "";
        $this->mttotal = "";
        if ($id !== null) {
            $this->flag = 1;
        }
        $this->id_produit = $id;
        $this->qte_stock = $qte_stock;
        $this->pu_prod = $puprod;
        $this->pu_achat = $pa_u;
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
                        'resultat' => $this->mttotal - ($this->pu_achat * $this->qtvendu),
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
        $vente_total = Vente::where('code', $this->numvente)->first();
        $this->mtapayer = $vente_total->total;
        $this->numventepaiement = $this->numvente;
        $this->idvente = $vente_total->id;
        $this->dispatchBrowserEvent('paiementsave');
    }
    public function updatedMtpayer()
    {
        if ($this->mtapayer > $this->mtpayer) {
            $this->formclient = true;
        } else if ($this->mtpayer >= $this->mtapayer) {
            $this->formclient = false;
            $this->nomcompletclient = "";
            $this->numphoneclient = "";
        }
    }
    public function savepaiement()
    {
        $caisse = Caisse::where('user_id', Auth::user()->id)->first();
        if (!$caisse) {
            $caisse = Caisse::create([
                'user_id' => Auth::user()->id,
                'solde' => 0
            ]);
        }
        if ($this->mtapayer > $this->mtpayer) {
            // le client est a enregister on constate une dette
            $cl_id = Client::where('numero', $this->numphoneclient)->first();
            if (!$cl_id) {
                Client::create([
                    'noms' => $this->nomcompletclient,
                    'numero' => $this->numphoneclient,
                ])->save();
            }
            $this->client_id = Client::where('numero', $this->numphoneclient)->first(['id'])->id;
            // enregistrement du paiement(update vente)
            $vente = Vente::find($this->idvente)->fill([
                'client_id' => $this->client_id,
                'montant_paie' => $this->mtpayer,
                'rest_paie' => $this->mtapayer - $this->mtpayer,
            ])->save();
            if ($vente) {
                $caisse = Caisse::where('user_id', Auth::user()->id)->first();
                $caisse->solde += $this->mtpayer;
                $caisse->save();
                $dettes = Dette::where('client_id', $this->client_id)->first();
                if (!$dettes) {
                    Dette::create([
                        'client_id' => $this->client_id,
                        'total_dette' => $this->mtapayer - $this->mtpayer,
                        'user_id' => Auth::user()->id,
                    ])->save();
                } else {
                    Dette::find($dettes->id)->fill([
                        'client_id' => $this->client_id,
                        'total_dette' => $dettes->total_dette + ($this->mtapayer - $this->mtpayer),
                        'user_id' => Auth::user()->id,
                    ])->save();
                }

                $this->alert('success', 'Paiement bien effectué et dette enregistre!');
            }
        } else if ($this->mtpayer >= $this->mtapayer) {
            $vente = Vente::find($this->idvente)->fill([
                'montant_paie' => $this->mtpayer,
                'rest_paie' => $this->mtapayer - $this->mtpayer,
            ])->save();
            if ($vente) {
                $caisse = Caisse::where('user_id', Auth::user()->id)->first();
                $caisse->solde += $this->mtpayer;
                $caisse->save();
                $this->alert('success', 'Paiement bien effectué!');
            }
            // pas de dette payement cach...on a pas besoin d'enregist le client
        }

        // $this->dispatchBrowserEvent('close_modal');
         redirect('/seller/vente');
    }
    public function updatedNumphoneclient()
    {
        $infoclient = Client::where('numero', $this->numphoneclient)->first();
        if ($infoclient) {
            $this->nomcompletclient = $infoclient->noms;
        } else {
            $this->nomcompletclient = "";
        }
    }
}
