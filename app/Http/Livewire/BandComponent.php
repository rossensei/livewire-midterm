<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Band;
use Livewire\WithPagination;

class BandComponent extends Component
{
    use WithPagination;
    public $bandname, $description, $genre, $location, $rate, $bandphoto, $band_id;
    public $search, $rock, $pop, $reggae, $acoustic, $classical, $locationSelect, $rateRange, $sortDirection, $selectedGenres = [];

    public function render()
    {
        $query = Band::orderBy('bandname', 'asc');

        if($rock = 'Rock' || $pop = 'Pop' || $reggae = 'Reggae' || $acoustic = 'Acoustic' || $classical = 'classical'){
            $query->where(function($query) {
                foreach ($this->selectedGenres as $genre) {
                    $query->orWhere('genre', 'LIKE', '%'.$genre.'%');
                }
            });
        }

        if ($this->search) {
            $query->search($this->search);
        }

        if(!empty($this->locationSelect)){
            $query->where('location', $this->locationSelect);
        }

        if(!empty($this->rateRange)){
            $query->where('rate', '>=', $this->rateRange);
        }
        if(!empty($this->sortDirection)){
            $query->orderBy('rate', $this->sortDirection);
        }

        $bands = $query->paginate(6);

        // dd($bands);

        $result = Band::orderBy('id')->get();
        $data = $result->toArray();
        $locations = array_unique(array_column($data, 'location'));

        return view('livewire.band-component', [
            'bands' => $bands,
            'locations' => $locations,
        ])->layout('livewire.layouts.base');
    }

    public function updateUrl($page) {
        $this->redirect('/?page='.$page);
    }

    public function editBand($id) {

        $band = Band::find($id);

        $this->bandname = $band->bandname;
        $this->description = $band->description;
        $this->genre = $band->genre;
        $this->location = $band->location;
        $this->rate = $band->rate;
        $this->bandphoto = $band->bandphoto;

        $this->band_id = $band->id;
    }

    public function removeBand() {
        Band::find($this->band_id)->delete();

        $this->bandname = "";
        $this->description = "";
        $this->genre = "";
        $this->location = "";
        $this->rate = "";
        $this->bandphoto = "";
        $this->band_id = "";

        return redirect('/')->with('message', 'Band has been removed.');
    }

    public function clear() {
        $this->reset([
            'search',
            'rock',
            'pop', 
            'reggae', 
            'acoustic', 
            'classical', 
            'locationSelect',
            'rateRange',
            'sortDirection',
            'selectedGenres',
        ]);
        // $this->reset(['bandname', 'genre']);
    }

}
