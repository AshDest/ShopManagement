<?php

namespace App\Http\Livewire\Parametrage;

use Livewire\Component;

class Users extends Component
{
    public $desplayeditform;
    public $nom, $mail, $password, $password_confirmation, $avatar;
    protected $rules = [
        'nom' => 'required|min:4',
        'mail' => 'required|email',
        'photo' => 'image|max:2048', // 2MB Max
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password|min:8',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function saveuser()
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
    public function render()
    {
        return view('livewire.parametrage.users');
    }
}