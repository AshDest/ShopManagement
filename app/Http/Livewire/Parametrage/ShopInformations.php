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

    public $logos;

    public $old_logo;
    public $vars;
    public $ids;

    public $rules = [
        'nomination' => 'required|min:3',
        'adresse' => 'required|min:10',
        'contact' => 'required|min:9|max:13',
        'email' => 'required|email',

        'rccm' => 'required|max:8|min:5',
        'num_impot' => 'required|min:5|max:8',
        'id_national' => 'required|min:5|max:10',
    ];
    public $messages = [
        'nomination.required' => 'Nom de l\'adresse est requis.',
        'adresse.required' => 'Nom de l\'adresse est requis.',
        'contact.required' => 'Nom de l\'contact est requis.',
        'email.required' => 'L\'adresse email est requis.',
        'logo.file' => 'Le Logo pas valide.',
        'logo.mimes' => 'Le Logo pas valide.',
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
            if(!$this->vars)
            {
                if($this->logos){
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
                }
                else
                {
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
            }
            else
            {
                if($this->logos){
                    $imageHash = $this->logos->hashName();
                    $manager =  new ImageManager();
                    $manager->make($this->logos->getRealPath())->resize(50, 50)->save('assets/images/logo/' . $imageHash);
                    Parametrage::find($this->ids)->fill([
                        'nomination' => $this->nomination,
                        'adresse' => $this->adresse,
                        'contact' => $this->contact,
                        'email' => $this->email,
                        'logo' => $imageHash,
                        'rccm' => $this->rccm,
                        'num_impot' => $this->num_impot,
                        'id_national' => $this->id_national,
                    ])->save();
                    $this->cleanupOldTemps($this->old_logo);
                }
                else
                {
                    Parametrage::find($this->ids)->fill([
                        'nomination' => $this->nomination,
                        'adresse' => $this->adresse,
                        'contact' => $this->contact,
                        'email' => $this->email,
                        'rccm' => $this->rccm,
                        'num_impot' => $this->num_impot,
                        'id_national' => $this->id_national,
                    ])->save();
                }
            }
            $this->alert('success', 'Informations bien enregistrer');
            // $this->reset_fields();
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement');
            // Reset Form Fields After Creating departement

        }
    }

    public function mount()
    {
        $this->vars = Parametrage::find(1);

        if ($this->vars) {
            $this->ids = $this->vars->id;
            $this->nomination = $this->vars->nomination;
            $this->adresse = $this->vars->adresse;
            $this->contact = $this->vars->contact;
            $this->email = $this->vars->email;
            if($this->vars->logo)
            {
                $this->old_logo = $this->vars->logo;
            }
            $this->rccm = $this->vars->rccm;
            $this->num_impot = $this->vars->num_impot;
            $this->id_national = $this->vars->id_national;
        }
    }
    public function cleanupOldTemps($old_image)
    {
        if ($old_image != null) {
            $path = public_path('assets/images/logo/' . $old_image);
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
    public function render()
    {
        return view('livewire.parametrage.shop-informations');
    }
}
