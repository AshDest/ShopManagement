<?php

namespace App\Http\Livewire\Parametrage;

use App\Models\Parametrage;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;

class Starters extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $nomination;
    public $adresse;
    public $contact;
    public $email;
    public $logos;
    public $rccm;
    public $num_impot;
    public $id_national;

    public $old_logo;

    public $rules = [
        'nomination' => 'required|min:3',
        'adresse' => 'required|min:10',
        'contact' => 'required|min:9|max:13',
        'email' => 'required|email',
        // 'logo' => 'required|mimes:png|max:2048',// 2MB Max
        'rccm' => 'required|max:20|min:5',
        'num_impot' => 'required|min:5|max:20',
        'id_national' => 'required|min:5|max:20',
    ];

    public function save()
    {
        $this->validate();
        try {
            if ($this->logos) {
                $imageHash = $this->logos->hashName();
                $manager =  new ImageManager();
                $manager->make($this->logos->getRealPath())->resize(50, 50)->save('assets/images/logo/' . $imageHash);
                Parametrage::create([
                    'nomination' => $this->nomination,
                    'adresse' => $this->adresse,
                    'contact' => $this->contact,
                    'email' => $this->email,
                    'logo' => $imageHash,
                    'rccm' => $this->rccm,
                    'num_impot' => $this->num_impot,
                    'id_national' => $this->id_national,
                ])->save();
                // Set Flash Message
            } else {
                Parametrage::create([
                    'nomination' => $this->nomination,
                    'adresse' => $this->adresse,
                    'contact' => $this->contact,
                    'email' => $this->email,
                    'rccm' => $this->rccm,
                    'num_impot' => $this->num_impot,
                    'id_national' => $this->id_national,
                ])->save();
                // Set Flash Message
            }
            $this->alert('success', 'Informations bien enregistrer');
            return redirect()->route('home');
            // $this->reset_fields();
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement');
            // Reset Form Fields After Creating departement
            // $this->reset_fields();
        }
    }
    public function render()
    {
        return view('livewire.parametrage.starters');
    }
}