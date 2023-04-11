<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Band;
use Faker\Provider\Image;
use Livewire\WithFileUploads;

class EditComponent extends Component
{
    use WithFileUploads;
    public $bandname, $description, $genre, $location, $rate, $bandphoto, $newPhoto, $band_id;

    public function mount($id) {
        $band = Band::find($id);
        // dd($band);
        $this->bandname = $band->bandname;
        $this->description = $band->description;
        $this->genre = $band->genre;
        $this->location = $band->location;
        $this->rate = $band->rate;
        $this->bandphoto = $band->bandphoto;
        $this->band_id = $band->id;
    }

    public function render()
    {
        return view('livewire.edit-component')->layout('livewire.layouts.base');
    }

    public function update() {
        $this->validate([
            'bandname' => 'string|required',
            'description' => 'string|required',
            'genre' => 'string|required',
            'location' => 'string|required',
            'rate' => 'numeric|required',
        ]);

        if($this->newPhoto) {
            $this->validate(['newPhoto' => 'required|image|max:2048']);
            $path = $this->newPhoto->store('public');
        }else {
            // $this->validate(['bandphoto' => 'required|image|max:2048']);
            $path = $this->bandphoto;
        }
        // dd($path);
        Band::find($this->band_id)->update([
            'bandname' => $this->bandname,
            'description' => $this->description,
            'genre' => $this->genre,
            'location' => $this->location,
            'rate' => $this->rate,
            'bandphoto' => $path,
        ]);

        return redirect('/')->with('message', 'Band profile updated successfully!');
    }
}
