<?php

namespace App\Http\Livewire\Construction;

use App\Models\Projetcontrustion;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\Rule;


class Depenseconstruction extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $paniers = null;
    public  $reseach, $page_active = 3;

    public $codeprojet, $designationprojet, $responsableprojet, $contactreponsable;

    protected function rules()
    {
        return [
            'codeprojet' => ['required', Rule::unique('projetcontrustions')],
            'designationprojet' => 'required',
            'responsableprojet' => 'required',
            'contactreponsable' => ['required',
            'regex:/^[0-9]{10}$/', 'numeric', Rule::unique('projetcontrustions')],
        ];
    }

    protected $messages = [
        'codeprojet.required' => 'Le code du projet est requis.',
        'codeprojet.unique' => 'Ce code de projet est déjà utilisé.',
        'designationprojet.required' => 'La désignation du projet est requise.',
        'responsableprojet.required' => 'Le responsable du projet est requis.',
        'contactreponsable.required' => 'Le contact du responsable est requis.',
        'contactreponsable.numeric' => 'Le contact du responsable doit être un numéro.',
        'contactreponsable.unique' => 'Ce contact du responsable est déjà utilisé.',
        'contactreponsable.regex' => 'Le contact du responsable doit être un numéro de téléphone valide.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function newproject()
    {
        $this->dispatchBrowserEvent('modal_project');
    }
    public function saveprojet()
    {
        $this->validate();
        try {
            Projetcontrustion::create([
                'codeprojet' => $this->codeprojet,
                'designationprojet' => $this->designationprojet,
                'responsableprojet' => $this->responsableprojet,
                'contactreponsable' => $this->contactreponsable,
            ])->save();
            // Set Flash Message
            $this->alert('success', 'Projet bien enregistreé');
            $this->reset_fields();
            redirect('/admin/contruction/depense');
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement' . $e->getMessage());
            $this->reset_fields();
        }

        // $this->dispatchBrowserEvent('close_modal'); CA MARCHE BIEN AUSSI
    }
    public function  reset_fields()
    {
        $this->codeprojet = '';
        $this->designationprojet = '';
        $this->responsableprojet = '';
        $this->contactreponsable = '';
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
        if ($this->reseach) {
            return view('livewire.construction.depenseconstruction', [
                'projets' => Projetcontrustion::where('codeprojet', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhere('designationprojet', 'LIKE', '%' . $this->reseach)
                    ->orwhere('responsableprojet', 'LIKE', '%' . $this->reseach)
                    ->orwhere('statutprojet', 'LIKE', '%' . $this->reseach)
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.construction.depenseconstruction', [
                'projets' => Projetcontrustion::orderBy('id', 'DESC')->paginate($this->page_active),
            ]);
        }
    }
}
