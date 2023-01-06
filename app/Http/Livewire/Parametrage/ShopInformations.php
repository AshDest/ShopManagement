<?php

namespace App\Http\Livewire\Parametrage;

use App\Models\Parametrage;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;

class ShopInformations extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $nomination;
    public $adresse;
    public $contact;
    public $email;
    public $logo;
    public $rccm;
    public $num_impot;
    public $id_national;

    public $rules = [
        'nomination' => 'required|min:3',
        'adresse' => 'required|min:10',
        'contact' => 'required|min:9|max:13',
        'email' => 'required|email',
        'logo' => 'nullable',
        'rccm' => 'required|max:8|min:5',
        'num_impot' => 'required|min:5|max:8',
        'id_national' => 'required|min:5|max:10',
    ];
    public $messages = [
        'nomination.required' => 'Nom de l\'adresse est requis.',
        'adresse.required' => 'Nom de l\'adresse est requis.',
        'contact.required' => 'Nom de l\'contact est requis.',
        'email.required' => 'L\'adresse email est requis.',
        'logo.required' => 'L\'logo est requis.',
        'rccm.required' => 'L\'rcm est requis.',
        'num_impot.required' => 'L\'numéro de l\'imp',
        'id_national.required' => 'L\'identifiant national',
        'id_national.min' => 'L\'identifiant doit avoir au minimum 5 caractères',
        'adresse.min' => 'adresse pas valide',
        'contact.min' => 'contact pas valide',
        'email.min' => 'email pas valide',
        'rccm.min' => 'rccm pas valide',
        'num_import.min' => 'numero pas valide',
        'id_national.max' => 'id national pas valide',
        'contact.max' => 'contact pas valide',
        'rccm.max' => 'rccm pas valide',
        'num_import.max' => 'numero pas valide',
    ];

    public function save()
    {
        $this->validate();
        try {
            $imageHash = $this->logo->hashName();
            $manager =  new ImageManager();
            $manager->make($this->logo->getRealPath())->resize(50, 50)->save('assets/images/logo/' . $imageHash);
            Parametrage::create([
                'nomination' => $this->nomination,
                'adresse' => $this->adresse,
                'contact' => $this->contact,
                'email' => $this->email,
                'logo' => $this->logo,
                'rccm' => $this->rccm,
                'num_impot' => $this->num_impot,
                'id_national' => $this->id_national,
            ])->save();
            // Set Flash Message
            $this->alert('success', 'Informations bien enregistrer');
            // $this->reset_fields();
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement');
            // Reset Form Fields After Creating departement
            // $this->reset_fields();
        }
    }

    public function mount()
    {
        $vars = Parametrage::find(1);
        if ($vars) {
            $this->nomination = $vars->nomination;
            $this->adresse = $vars->adresse;
            $this->contact = $vars->contact;
            $this->email = $vars->email;
            $this->logo = $vars->logo;
            $this->rccm = $vars->rccm;
            $this->num_impot = $vars->num_impot;
            $this->id_national = $vars->id_national;
        }
    }
    public function render()
    {
        return view('livewire.parametrage.shop-informations');
    }
}
