<?php

namespace App\Http\Livewire\Production;

use App\Models\Categorie as ModelsCategorie;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Categorie extends Component
{
    use WithPagination;
    use LivewireAlert;
    public  $reseach, $page_active = 4;
    public $designation, $mesure;
    public $desplayeditform = null;
    protected $rules = [
        'designation' => 'required',
        'mesure' => 'required',
    ];

    protected $messages = [
        'designation.required' => 'veuillez renseigner la desination',
        'mesure.required' => 'veuillez selectionez la mesure',
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
        $categdel = ModelsCategorie::whereId($this->desplayeditform)->delete();
        if ($categdel) {
            $this->alert('info', 'categorie bien Suprime!');
            $this->reset_fields();
        }
    }
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function savecategorie()
    {
        $this->validate();
        // Validate Form Request
        try {
            ModelsCategorie::create([
                'designation' => $this->designation,
                'mesure' => $this->mesure,
            ])->save();
            // Set Flash Message
            $this->alert('success', 'Categorie bien enregistrer');
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement');
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        }
    }
    public function editcategorie($id)
    {
        $this->desplayeditform = $id;
        $categories = ModelsCategorie::find($this->desplayeditform);
        $this->designation = $categories->designation;
        $this->mesure = $categories->mesure;
    }
    // public function annuler()
    // {
    //     $this->designation = '';
    //     $this->mesure = '';
    //     $this->desplayeditform = null;
    // }
    public function reset_fields()
    {
        $this->designation = '';
        $this->mesure = '';
        $this->desplayeditform = null;
    }
    public function editcateg()
    {
        try {
            ModelsCategorie::find($this->desplayeditform)->fill([
                'designation' => $this->designation,
                'mesure' => $this->mesure,
            ])->save();
            $this->alert('success', 'Categorie bien Modifier!');
            $this->reset_fields();
        } catch (\Exception $e) {
            $this->alert('warning', 'Echec de modification!' . $e->getMessage());
        }
    }
    public function render()
    {
        if ($this->reseach) {
            return view('livewire.production.categorie', [
                'categories' => ModelsCategorie::where('designation', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhere('mesure', 'LIKE', '%' . $this->reseach)
                    ->orderBy('id', 'DESC')->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.production.categorie', [
                'categories' => ModelsCategorie::orderBy('id', 'DESC')->paginate($this->page_active)
            ]);
        }
    }
}