<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Band;
use Livewire\WithFileUploads;

class CreateComponent extends Component
{
    use WithFileUploads;
    public $bandname, $description, $genre, $location, $rate, $bandphoto, $band_id;

    public function render()
    {
        return view('livewire.create-component')->layout('livewire.layouts.base');
    }

    public function create() {
        $this->validate([
            'bandname' => 'string|required',
            'description' => 'string|required',
            'genre' => 'string|required',
            'location' => 'string|required',
            'rate' => 'numeric|required',
            'bandphoto' => 'image',
        ]);

        $path = $this->bandphoto->store('public');

        Band::create([
            'bandname' => $this->bandname,
            'description' => $this->description,
            'genre' => $this->genre,
            'location' => $this->location,
            'rate' => $this->rate,
            'bandphoto' => $path,
        ]);

        $this->reset(['bandname', 'description', 'genre', 'location', 'rate', 'bandphoto']);

        return redirect('/')->with('message', 'Band created successfully!');
    }
}
