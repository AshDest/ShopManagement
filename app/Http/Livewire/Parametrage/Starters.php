<?php

namespace App\Http\Livewire\Parametrage;

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

    public function render()
    {
        return view('livewire.parametrage.starters');
    }
}
