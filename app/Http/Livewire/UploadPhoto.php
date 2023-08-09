<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;

class UploadPhoto extends Component
{
    use WithFileUploads;
 
    public $photo;
 
    public function save()
    {
        $this->validate([
            'photo' => 'required|image|max:1024', // 1MB Max
        ]);
 
        $this->photo->storeAs('photos', 'avatar');
    }
    public function render()
    {
        return view('livewire.upload-photo');
    }

}
