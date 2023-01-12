<?php

namespace App\Http\Livewire\Mesure;

use App\Models\Mesure;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Mesures extends Component
{
    use WithPagination;
    use LivewireAlert;
    public  $reseach, $page_active = 4;
    public $ids;
    public $mesures;

    public $desplayeditform = null;
    protected $rules = [
        'mesures' => 'required',
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
        $vars = Mesure::whereId($this->desplayeditform)->delete();
        if ($vars) {
            $this->alert('info', 'Mesure bien Suprime!');
            $this->reset_fields();
        }
    }
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        // Validate Form Request
        try {
            Mesure::create([
                'mesures' => $this->mesures,
            ])->save();
            // Set Flash Message
            $this->alert('success', 'Mesure bien enregistré');
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement: ' . $e->getMessage());
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        }
    }
    public function desplay($id)
    {
        $this->desplayeditform = $id;
        $mesure = Mesure::find($this->desplayeditform);
        $this->ids = $mesure->id;
        $this->mesures = $mesure->mesures;
    }
    public function reset_fields()
    {
        $this->mesures = '';
        $this->ids = null;
        $this->desplayeditform = null;
    }

    public function edit()
    {
        try {
            Mesure::find($this->desplayeditform)->fill([
                'mesures' => $this->mesures,
            ])->save();
            $this->alert('success', 'Mesure bien Modifier!');
            $this->reset_fields();
        } catch (\Exception $e) {
            $this->alert('warning', 'Echec de modification!' . $e->getMessage());
        }
    }
    public function render()
    {
        if ($this->reseach) {
            return view('livewire.mesure.mesures', [
                'mesurs' => Mesure::where('mesures', 'LIKE', '%' . $this->reseach . '%')
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.mesure.mesures', [
                'mesurs' => Mesure::orderBy('id', 'DESC')->paginate($this->page_active)
            ]);
        }
    }
}