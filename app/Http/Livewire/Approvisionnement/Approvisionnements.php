<?php

namespace App\Http\Livewire\Approvisionnement;
use App\Models\Approvisionnement;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Approvisionnements extends Component
{
    use WithPagination;
    use LivewireAlert;
    public  $reseach, $page_active = 4;
    public $desplayeditform = null;
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
        $categdel = Approvisionnement::whereId($this->desplayeditform)->delete();
        if ($categdel) {
            $this->alert('info', 'Approvisionnement bien Suprime!');
            $this->reset_fields();
        }
    }
    public function render()
    {
        $approvs = Approvisionnement::all();
        return view('livewire.approvisionnement.approvisionnements', ['approvs' => $approvs]);
    }
}
