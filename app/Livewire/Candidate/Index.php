<?php

namespace App\Livewire\Candidate;

use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mockery\Undefined;

class Index extends Component
{
    public $data = [];

    #[Url(keep: false)]
    public $search = '', $sort = '', $order = '', $page = 1, $per_page = 10;

    public $meta;
    public $links;

    // get data from api
    public function getData()
    {
        $response = Http::client()->withQueryParameters(
            [
                'search' => $this->search,
                'page' => $this->page ? (int) $this->page : 1,
                'per_page' => $this->per_page ? (int) $this->per_page : 10,
                'sort' => $this->sort,
                'order' => $this->order,
            ]
        )->get('/candidate')->collect();

        $this->data = $response['data'] ?? [];
        $this->meta = $response['meta'] ?? '';
        $this->links = $response['links'] ?? '';

    }
    public function mount()
    {
        $this->getData();
    }

    // handle filter search
    public function filter()
    {
        $this->page = 1;
        $this->getData();
    }

    // handle delete data
    public function delete($id)
    {
        $response = Http::client()->delete('/candidate/'. $id);

        if($response->successful()){
            session()->flash('status', $response->json()['message']);
            $this->getData();
        } else {
            session()->flash('status', $response->json()['message']);
        }
    }

    // handle sorting table
    public function sortBy($field)
    {
        if($this->sort == $field){
            $this->order = $this->order == 'asc' ? 'desc' : 'asc';
        }
        else{
            $this->sort = $field;
            $this->order = 'asc';
        }
        $this->getData();
    }

    // handle reset filter
    public function resetFilter()
    {
        $this->reset();
        $this->getData();
    }

    // handle on change per page
    public function updatedPerPage()
    {
        $this->page = 1;
        $this->getData();
    }

    // handle on change pagination
    public function pagination($pageNumber)
    {
        if($pageNumber == 'prev'){
            $pageNumber = $this->meta['current_page'] - 1;
        }
        else if($pageNumber == 'next'){
            $pageNumber = $this->meta['current_page'] + 1;
        }
        $this->page = (int) $pageNumber;
        $this->getData();
    }


    public function render()
    {
        return view('livewire.candidate.index')->title('List of Candidate');
    }
}
