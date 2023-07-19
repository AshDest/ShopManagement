<?php

namespace App\Http\Livewire\Parametrage;

use App\Models\Taux;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class TauxChange extends Component
{
    use LivewireAlert;
    public $desplayeditform;
    public $taux;
    public  $reseach;

    protected $rules = [
        'taux' => 'required',
    ];
    public function saveuser()
    {
        // Validate Form Request

        try {
            $id = Taux::value('id');
            if($id){
                Taux::find($id)->fill([
                    'taux' => $this->taux,
                ])->save();
            }else{
                Taux::create([
                    'taux' => $this->taux,
                ]);
            }
            // Set Flash Message
            $this->alert('success', 'Taux de change bien enregistrer');
            // Reset Form Fields After Creating departement
            $this->taux='';
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement');
            // Reset Form Fields After Creating departement
            $this->taux='';
        }
    }
    public function render()
    {
        if ($this->reseach) {
            return view('livewire.parametrage.taux-change', [
                'users' => Taux::where('id', 'LIKE', '%' . $this->reseach)
                    ->orwhere('taux', 'LIKE', '%' . $this->reseach)->get()
            ]);
        } else {
            return view('livewire.parametrage.taux-change', [
                'users' => Taux::get()
            ]);
        }
    }
}
