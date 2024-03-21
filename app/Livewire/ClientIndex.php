<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithFileUploads;

class ClientIndex extends Component
{
    use WithFileUploads;
    public $clients;
    public $client_id;
    public $first_name;
    public $last_name;
    public $date_of_birth;
    public $length_cm;
    public $email;
    public $photo;
    public $isOpen = false;

    public function render()
    {
        $this->clients = Client::all();
        return view('livewire.client-index');
    }

    public function create(){
        $this->resetInputFields();
        $this->openModal();
    }

    public function delete($id){
        $client = Client::find($id);
        $client->delete();
    }

    public function edit($id){
        $client = Client::find($id);
        $this->first_name = $client->first_name;
        $this->last_name = $client->last_name;
        $this->date_of_birth = $client->date_of_birth;
        $this->length_cm = $client->length_cm;
        $this->email = $client->email;
        $this->photo = $client->photo;
        $this->isOpen = true;
    }

    public function openModal(){
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
    }

    public function store(){
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'length_cm' => 'required',
            'email' => 'required|email|unique:clients,email'
        ]);



        $client = Client::find($this->client_id);
        if(!$client){
            $client = new Client();
        }

        $client->first_name = $this->first_name;
        $client->last_name = $this->last_name;
        $client->date_of_birth = $this->date_of_birth;
        $client->length_cm = $this->length_cm;
        $client->email = $this->email;
        //$client->photo = $this->photo->store('photos', 'public');
        $client->save();


        $this->closeModal();

        $this->first_name = '';
        $this->last_name = '';
        $this->date_of_birth = '';
        $this->length_cm = '';
        $this->email = '';
        $this->photo = '';
    }

    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->date_of_birth = '';
        $this->length_cm = '';
        $this->email = '';
        $this->photo = '';
    }


    public function measurements($id){
        return redirect()->to('/measurements/'.$id);
    }
}
