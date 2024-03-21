<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Measurement;
use Illuminate\Http\Request;


class MeasurementIndex extends Component
{
    public $measurements;
    public $client_id;
    public $weight_kg;
    public $fat_percentage;
    public $blood_pressure;
    public $isOpen;


    public function mount($id){
        $this->client_id = $id;
        $this->measurements = Measurement::where('client_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.measurement-index');
    }

    public function store(){
        $this->validate([
            'client_id' => 'required',
            'weight_kg' => 'required',
            'fat_percentage' => 'nullable',
            'blood_pressure' => 'nullable',
        ]);
        $measurement = new Measurement();
        $measurement->client_id = $this->client_id;
        $measurement->weight = $this->weight_kg;
        $measurement->fat_percentage = $this->fat_percentage;
        $measurement->blood_pressure = $this->blood_pressure;
        $measurement->save();
        $this->isOpen = false;
        $this->resetInputFields();
    }



    public function delete($id){
        $measurement = Measurement::find($id);
        $measurement->delete();
    }

    public function edit($id){
        $measurement = Measurement::find($id);
        $this->client_id = $measurement->client_id;
        $this->weight_kg = $measurement->weight_kg;
        $this->fat_percentage = $measurement->fat_percentage;
        $this->blood_pressure = $measurement->blood_pressure;
        $this->isOpen = true;
    }

    public function update(){
        $this->validate([
            'client_id' => 'required',
            'weight_kg' => 'required',
            'fat_percentage' => 'nullable',
            'blood_pressure' => 'nullable',
        ]);

        $measurement = Measurement::find($this->client_id) ?? new Measurement();
        $measurement->client_id = $this->client_id;
        $measurement->weight_kg = $this->weight_kg;
        $measurement->fat_percentage = $this->fat_percentage;
        $measurement->blood_pressure = $this->blood_pressure;
        $measurement->save();

        $this->client_id = '';
        $this->weight_kg = '';
        $this->fat_percentage = '';
        $this->blood_pressure = '';
        $this->isOpen = false;
        $this->resetInputFields();
    }

    public function openModal(){
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
    }

    public function resetInputFields(){
        $this->client_id = '';
        $this->weight_kg = '';
        $this->fat_percentage = '';
        $this->blood_pressure = '';
    }
}
