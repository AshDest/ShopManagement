<?php

namespace App\Http\Livewire\Parametrage;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Intervention\Image\ImageManager;
use Livewire\WithFileUploads;

class Users extends Component
{
    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;
    public $desplayeditform;
    public $nom, $mail, $role, $username, $password, $password_confirmation, $avatar, $old_avatar;

    public  $reseach, $page_active = 4;
    protected $rules = [
        'nom' => 'required|min:4',
        'mail' => 'required|email',
        'avatar' => 'image|max:2048', // 2MB Max
        'password' => 'required|min:8',
        'username' => 'required',
        'password_confirmation' => 'required|same:password|min:8',
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
        $users = User::findOrFail($this->desplayeditform);
        $this->old_avatar = $users->avatar;
        $categdel = User::whereId($this->desplayeditform)->delete();
        if ($categdel) {
            $this->cleanupOldTemps($this->old_avatar);
            $this->alert('info', 'categorie bien Suprime!');
            $this->reset_fields();
        }
    }
    public function cleanupOldTemps($old_avatar)
    {
        if ($old_avatar != null) {
            $path = public_path('assets/images/avatar/' . $this->old_avatar);
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
    public function modifieruser()
    {
        try {

            if ($this->avatar) {
                // $this->validate();
                $imageHash = $this->avatar->hashName();
                $manager =  new ImageManager();
                $manager->make($this->avatar->getRealPath())->resize(50, 50)->save('assets/images/avatar/' . $imageHash);
                User::find($this->desplayeditform)->fill([
                    'noms' => $this->nom,
                    'name' => $this->username,
                    'email' => $this->mail,
                    'password' => $this->password,
                    'avatar' => $imageHash,
                    'role' => $this->role,
                ])->save();
                $this->cleanupOldTemps($this->old_avatar);
            } else {
                User::find($this->desplayeditform)->fill([
                    'noms' => $this->nom,
                    'name' => $this->username,
                    'email' => $this->mail,
                    'password' => $this->password,
                    'role' => $this->role,
                ])->save();
            }
            $this->alert('success', 'Utilisateur modifier');
        } catch (\Exception $e) {
            $this->alert('warning', 'Echec de modification!' . $e->getMessage());
        }
    }
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
                $imageHash = $this->avatar->hashName();
                $manager =  new ImageManager();
                $manager->make($this->avatar->getRealPath())->resize(50, 50)->save('assets/images/avatar/' . $imageHash);
                switch ($this->role) {

                    case 'Admin':
                        User::create([
                            'noms' => $this->nom,
                            'name' => $this->username,
                            'email' => $this->mail,
                            'password' => $this->password,
                            'avatar' => $imageHash,
                            'role' => $this->role,
                        ]);
                        // ->assignRole('writer', 'admin');
                        break;
                    case 'Gerant':
                        User::create([
                            'noms' => $this->nom,
                            'name' => $this->username,
                            'email' => $this->mail,
                            'password' => $this->password,
                            'avatar' => $imageHash,
                            'role' => $this->role,
                        ]);
                        // ->assignRole('writer', 'manager', 'seler');
                        break;
                    case 'Seler':
                        User::create([
                            'noms' => $this->nom,
                            'name' => $this->username,
                            'email' => $this->mail,
                            'password' => $this->password,
                            'avatar' => $imageHash,
                            'role' => $this->role,
                        ]);
                        // ->assignRole('writer', 'seler');
                        break;
                    case 'User':
                        User::create([
                            'noms' => $this->nom,
                            'name' => $this->username,
                            'email' => $this->mail,
                            'password' => $this->password,
                            'avatar' => $imageHash,
                            'role' => $this->role,
                        ]);
                        // ->assignRole('writer', 'admin');
                        break;
                    default:
                }
            } else {
                switch ($this->role) {

                    case 'Admin':
                        User::create([
                            'noms' => $this->nom,
                            'name' => $this->username,
                            'email' => $this->mail,
                            'password' => $this->password,
                            'role' => $this->role,
                        ]);
                        // ->assignRole('writer', 'admin');
                        break;
                    case 'Gerant':
                        User::create([
                            'noms' => $this->nom,
                            'name' => $this->username,
                            'email' => $this->mail,
                            'password' => $this->password,
                            'role' => $this->role,
                        ]);
                        //->assignRole('writer', 'manager', 'seler');
                        break;
                    case 'Seler':
                        User::create([
                            'noms' => $this->nom,
                            'name' => $this->username,
                            'email' => $this->mail,
                            'password' => $this->password,
                            'role' => $this->role,
                        ]);
                        // ->assignRole('writer', 'seler');
                        break;
                    case 'User':
                        User::create([
                            'noms' => $this->nom,
                            'name' => $this->username,
                            'email' => $this->mail,
                            'password' => $this->password,
                            'role' => $this->role,
                        ]);
                        // ->assignRole('writer', 'admin');
                        break;
                    default:
                }
            }

            // Set Flash Message
            $this->alert('success', 'Utilisateur bien enregistrer');
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        } catch (\Exception $e) {
            // Set Flash Message
            $this->alert('warning', 'Echec d\'enregistrement');
            // Reset Form Fields After Creating departement
            $this->reset_fields();
        }
    }
    public function reset_fields()
    {
        $this->nom = "";
        $this->username = "";
        $this->mail = "";
        $this->password = "";
        $this->password_confirmation = "";
        $this->role = "0";
    }
    public function edituser($id)
    {
        $this->desplayeditform = $id;
        $users = User::find($this->desplayeditform);
        $this->nom = $users->noms;
        $this->username = $users->name;
        $this->mail = $users->email;
        $this->role = $users->role;
        $this->old_avatar = $users->avatar;
    }
    public function render()
    {
        if ($this->reseach) {
            return view('livewire.parametrage.users', [
                'users' => User::where('name', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhere('noms', 'LIKE', '%' . $this->reseach)
                    ->orwhere('email', 'LIKE', '%' . $this->reseach)
                    ->orwhere('role', 'LIKE', '%' . $this->reseach)
                    ->orderBy('id', 'DESC')->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.parametrage.users', [
                'users' => User::orderBy('id', 'DESC')->paginate($this->page_active)
            ]);
        }
    }
}
