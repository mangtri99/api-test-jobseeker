<?php

namespace App\Livewire\Candidate;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Detail extends Component
{
    public $candidate = [];
    public function mount($id)
    {
        if($id){
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
        return view('livewire.candidate.detail');
    }
}
