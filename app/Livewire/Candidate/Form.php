<?php

namespace App\Livewire\Candidate;

use App\Models\Candidate;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Symfony\Contracts\Service\Attribute\Required;

class Form extends Component
{
    public $candidate = [];
    public $errors = [];
    public $isEdit = false;
    public function submit()
    {
        // create
        if(!$this->isEdit){
            $response = Http::client()->post('/candidate', $this->candidate);
        // update
        } else {
            $response = Http::client()->put('/candidate/'. $this->candidate['candidate_id'], $this->candidate);
        }

        if($response->successful()){
            session()->flash('status', $response->json()['message']);
            $this->redirect('/');
        } else {
            $this->errors = $response->json()['errors'];
            session()->flash('status', $response->json()['message']);
        }
    }

    public function mount($id = null)
    {
        if($id){
            $this->isEdit = true;
            $get = Http::client()->get("/candidate/". $id)->collect();
            if(isset($get['data'])){
                $this->candidate = $get['data'];
            } else {
                abort(404);
            }
        }
    }

    public function render()
    {
        return view('livewire.candidate.form')->title($this->isEdit ? 'Edit Candidate' : 'Create Candidate');
    }
}
