<?php

namespace App\Http\Livewire\Construction;

use App\Models\Projetcontrustion;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Depenseconstruction extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $paniers = null;
    public  $reseach, $page_active = 3;

    public $codeprojet;

    public function newproject()
    {
        $this->dispatchBrowserEvent('modal_project');
    }
    public function saveprojet(){

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
