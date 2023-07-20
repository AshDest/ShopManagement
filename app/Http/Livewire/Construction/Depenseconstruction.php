<?php

namespace App\Http\Livewire\Construction;

use App\Models\Depensecontrusction;
use App\Models\Projetcontrustion;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\Rule;


class Depenseconstruction extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $deleted, $desplayedit = false, $desplaydepense = false;
    public  $reseach,$reseach_dep, $page_active = 3,$depenses;
    //  variables pour la table projet
    public $idprojet, $codeprojet, $designationprojet, $responsableprojet, $contactreponsable;
    // variable pour la table depense
    public $codeprojet_dep, $designationprojet_dep, $designationdepense, $mtdepense, $depensedevise;
    public $formType = ''; // Variable to track the current form being used

    // Définir les règles de validation pour le premier formulaire
    protected function rulesFirstForm()
    {
        return [
            'codeprojet' => ['required', Rule::unique('projetcontrustions')],
            'designationprojet' => 'required',
            'responsableprojet' => 'required',
            'contactreponsable' => [
                'required',
                'regex:/^[0-9]{10}$/', 'numeric', Rule::unique('projetcontrustions')
            ],
            // Autres règles de validation spécifiques pour le premier formulaire
        ];
    }

    // Définir les règles de validation pour le deuxième formulaire
    protected function rulesSecondForm()
    {
        return [
            'designationdepense' => 'required',
            'mtdepense' => 'required|numeric',
            'depensedevise' => 'required|in:USD,CDF', // Remplacez les valeurs avec les devises acceptées
            // Autres règles de validation spécifiques pour le deuxième formulaire
        ];
    }

    // Méthode pour effectuer des validations séparées pour chaque formulaire
    public function updated($field)
    {
        // Vérifier quel formulaire est en cours d'utilisation et effectuer la validation appropriée
        switch ($this->formType) {
            case 'firstForm':
                $this->validateOnly($field, $this->rulesFirstForm());
            break;
            case 'secondForm':
                    $this->validateOnly($field, $this->rulesSecondForm());
                break;
            default:
                # code...
                break;
        }
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    protected $messages = [
        'codeprojet.required' => 'Le code du projet est requis.',
        'codeprojet.unique' => 'Ce code de projet est déjà utilisé.',
        'designationprojet.required' => 'La désignation du projet est requise.',
        'responsableprojet.required' => 'Le responsable du projet est requis.',
        'contactreponsable.required' => 'Le contact du responsable est requis.',
        'contactreponsable.numeric' => 'Le contact du responsable doit être un numéro.',
        'contactreponsable.unique' => 'Ce contact du responsable est déjà utilisé.',
        'contactreponsable.regex' => 'Le contact du responsable doit être un numéro de téléphone valide.',

        'designationdepense.required' => 'La designation de la dépense est requise.',
        'mtdepense.required' => 'Le montant de la dépense est requis.',
        'mtdepense.numeric' => 'Le montant doit être un nombre.',
        // Messages spécifiques pour la règle 'in'
        'depensedevise.in' => 'La devise sélectionnée n\'est pas valide. Les devises acceptées sont USD et CDF.',
    ];

    protected $listeners = [
        'confirmed'
    ];
    public function delete($id)
    {
        $this->deleted = $id;
        $this->alert('warning', 'Etes vous sur? de vouloir suprimer ce projet', [
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
        $categdel = Projetcontrustion::whereId($this->deleted)->delete();
        if ($categdel) {
            $this->alert('info', 'Projet bien Suprime!', [
                'position' => 'center'
            ]);
            $this->reset_fields();
        }
    }

    public function newproject()
    {
        $this->formType='firstForm';
        $this->reset_fields();
        $this->codeprojet();
        $this->dispatchBrowserEvent('modal_project');
    }
    public function editprojet($id)
    {
        $this->idprojet = $id;
        $projects = Projetcontrustion::where('id', $id)->first();
        $this->codeprojet = $projects->codeprojet;
        $this->designationprojet = $projects->designationprojet;
        $this->responsableprojet = $projects->responsableprojet;
        $this->contactreponsable = $projects->contactreponsable;
        $this->desplayedit = true;
        $this->dispatchBrowserEvent('modal_project');
    }

    public function modifierprojet()
    {
        try {
            $done = Projetcontrustion::find($this->idprojet)->fill([
                'codeprojet' => $this->codeprojet,
                'designationprojet' => $this->designationprojet,
                'responsableprojet' => $this->responsableprojet,
                'contactreponsable' => $this->contactreponsable,
            ])->save();
            // Set Flash Message
            if ($done) {
                $this->alert('success', 'Projet bien modifié', [
                    'position' => 'center'
                ]);
                $this->reset_fields();
            }
            // redirect('/admin/contruction/depense');
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec de modification' . $e->getMessage(), [
                'position' => 'center'
            ]);
            $this->reset_fields();
        }
        $this->dispatchBrowserEvent('close_modal');
    }
    public function saveprojet()
    {
        $this->validate($this->rulesFirstForm());
        try {
            Projetcontrustion::create([
                'codeprojet' => $this->codeprojet,
                'designationprojet' => $this->designationprojet,
                'responsableprojet' => $this->responsableprojet,
                'contactreponsable' => $this->contactreponsable,
            ])->save();
            // Set Flash Message
            $this->alert('success', 'Projet bien enregistré', [
                'position' => 'center'
            ]);
            $this->reset_fields();
            // redirect('/admin/contruction/depense');
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement' . $e->getMessage(), [
                'position' => 'center'
            ]);
            $this->reset_fields();
        }
        $this->dispatchBrowserEvent('close_modal');
        // CA MARCHE BIEN AUSSI
    }
    public function  reset_fields()
    {
        $this->codeprojet = '';
        $this->designationprojet = '';
        $this->responsableprojet = '';
        $this->contactreponsable = '';
        $this->desplayedit = false;
    }
    public function mount()
    {
        $this->codeprojet();
    }
    public function codeprojet()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000, 9999) . $characters[rand(0, strlen('ABCDEFGHIJKLMNOPQRSTUVWXYZ') - 1)];
        $this->codeprojet = 'PROJ-' . str_shuffle($pin);
    }
    public function render()
    {
        if ($this->reseach_dep) {
            $this->depenses = Depensecontrusction::whereHas('projet', function ($s) {
                $s->where('projetcontrustion_id', $this->idprojet)
                ->where(
                    function ($query) {
                        $query->where('designationprojet', 'LIKE', '%' . $this->reseach_dep . '%')
                            ->orwhere('designationdepense', 'LIKE', '%' . $this->reseach_dep . '%')
                            ->orwhere('depensedevise', 'LIKE', '%' . $this->reseach_dep . '%');
                    });
                })
            ->get();
        }
        else{
            $this->depenses = Depensecontrusction::whereHas('projet', function ($s) {
                $s->where('projetcontrustion_id', $this->idprojet);
            })->get();
        }

        // $this->depenses = Depensecontrusction::all();
        if ($this->reseach) {
            return view('livewire.construction.depenseconstruction', [
                'projets' => Projetcontrustion::where('codeprojet', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhere('designationprojet', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhere('responsableprojet', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhere('statutprojet', 'LIKE', '%' . $this->reseach . '%')
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.construction.depenseconstruction', [
                'projets' => Projetcontrustion::orderBy('id', 'DESC')->paginate($this->page_active),
            ]);
        }
    }
    // ajout de depense sur le projet
    public function adddepense($id)
    {
        $this->formType='secondForm';
        $this->idprojet = $id;
        $projects = Projetcontrustion::where('id', $id)->first();
        $this->codeprojet_dep = $projects->codeprojet;
        $this->designationprojet_dep = $projects->designationprojet;
        $this->desplaydepense = true;
    }
    public function savedepense(){
        $this->validate($this->rulesSecondForm());
        try {
            Depensecontrusction::create([
                'designationdepense' => $this->designationdepense,
                'montantdepense' => $this->mtdepense,
                'projetcontrustion_id' => $this->idprojet,
                'depensedevise' => $this->depensedevise,

            ])->save();
            // Set Flash Message
            $this->alert('success', 'Dépense bien enregistreé', [
                'position' => 'center'
            ]);
            $this->reset_fields2();
            // redirect('/admin/contruction/depense');
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement' . $e->getMessage(), [
                'position' => 'center'
            ]);
            $this->reset_fields2();
        }
    }
    public function reset_fields2(){
        $this->designationdepense='';
        $this->mtdepense='';
        $this->depensedevise='';
    }
}
