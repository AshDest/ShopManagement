<?php

namespace App\Http\Livewire\Parametrage;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Intervention\Image\ImageManager;

class Users extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $desplayeditform;
    public $nom, $mail, $username, $password, $password_confirmation, $avatar;

    public  $reseach, $page_active = 4;
    protected $rules = [
        'nom' => 'required|min:4',
        'mail' => 'required|email',
        'photo' => 'image|max:2048', // 2MB Max
        'password' => 'required|min:8',
        'username' => 'required',
        'password_confirmation' => 'required|same:password|min:8',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function saveuser()
    {
        // Validate Form Request
        try {
            if ($this->avatar) {
                $this->validate();
                $imageHash = $this->photo->hashName();
                $manager =  new ImageManager();
                $manager->make($this->photo->getRealPath())->resize(50, 50)->save('assets/images/avatar/' . $imageHash);
                User::create([
                    'noms' => $this->nom,
                    'name' => $this->username,
                    'email' => $this->mail,
                    'password' => $this->password,
                    'avatar' => $imageHash,
                ])->save();
            } else {
                User::create([
                    'noms' => $this->nom,
                    'name' => $this->username,
                    'email' => $this->mail,
                    'password' => $this->password,
                ])->save();
            }

            // Set Flash Message
            $this->alert('success', 'user bien enregistrer');
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