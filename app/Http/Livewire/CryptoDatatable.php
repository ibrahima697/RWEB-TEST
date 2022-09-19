<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Builder;
//use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Crypto;

class CryptoDatatable extends Component 
{ 

        use WithPagination;

        public $search;
        public $sortField;
        public $sortAsc = true;
        protected $queryString = ['search', 'sortAsc', 'sortField'];
    
        public function sortBy($field)
        {
            $this->sortAsc = true;
            if ($this->sortField === $field) {
                $this->sortAsc = !$this->sortAsc;
            }
    
            $this->sortField = $field;
        }
    
        public function updatingSearch()
        {
            $this->resetPage();
        }

        public function render()
        {
            $cryptos = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false')->json();
            $cryptos = collect($cryptos);
            if ($this->search) {
                $cryptos = $cryptos->filter(function ($crypto) {
                    return false !== stripos($crypto['name'], $this->search);
                });
            }
            if ($this->sortField) {
                $cryptos = $cryptos->sortBy($this->sortField);
                if (!$this->sortAsc) {
                    $cryptos = $cryptos->reverse();
                }
            }
           // $cryptos = $cryptos->paginate(10);
            return view('livewire.crypto-datatable', [
                
            'cryptos' => Crypto::where(function ($query) {
                $query->where('name',  '%'.$this->search.'%');
            })->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->paginate(10),
           
            ]);
        }
       // public $cryptos = []; 


        public function mount() { 

            $this->cryptos = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false')->json(); } 
            
            
            
        
}
