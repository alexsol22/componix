<?php

namespace Componix\Componix\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class LiveSearch extends Component
{
    public $query = '';
    public $results = [];
    public $isLoading = false;
    public $showResults = false;
    public $placeholder;
    public $debounce;
    public $minCharacters;
    public $maxResults;
    public $noResultsText;
    public $searchUrl;
    public $searchType = 'all';
    public $searchTypes = [];

    protected $listeners = [
        'clearSearch' => 'clear',
        'setSearchType' => 'setType',
    ];

    public function mount(
        $placeholder = null,
        $debounce = null,
        $minCharacters = null,
        $maxResults = null,
        $noResultsText = null,
        $searchUrl = null,
        $searchTypes = []
    ) {
        $this->placeholder = $placeholder ?? config('componix.search.placeholder', 'Search...');
        $this->debounce = $debounce ?? config('componix.search.debounce', 300);
        $this->minCharacters = $minCharacters ?? config('componix.search.min_characters', 2);
        $this->maxResults = $maxResults ?? config('componix.search.max_results', 10);
        $this->noResultsText = $noResultsText ?? config('componix.search.no_results_text', 'No results found.');
        $this->searchUrl = $searchUrl ?? '/componix/api/search';
        $this->searchTypes = $searchTypes ?: $this->getDefaultSearchTypes();
    }

    public function updatedQuery()
    {
        if (strlen($this->query) >= $this->minCharacters) {
            $this->search();
        } else {
            $this->results = [];
            $this->showResults = false;
        }
    }

    public function search()
    {
        if (strlen($this->query) < $this->minCharacters) {
            return;
        }

        $this->isLoading = true;
        
        try {
            $response = Http::get($this->searchUrl, [
                'q' => $this->query,
                'type' => $this->searchType,
                'limit' => $this->maxResults,
            ]);

            if ($response->successful()) {
                $this->results = $response->json();
                $this->showResults = true;
            } else {
                $this->results = [];
                $this->showResults = false;
            }
        } catch (\Exception $e) {
            $this->results = [];
            $this->showResults = false;
        }

        $this->isLoading = false;
    }

    public function selectResult($result)
    {
        $this->dispatch('result-selected', $result);
        $this->clear();
    }

    public function clear()
    {
        $this->query = '';
        $this->results = [];
        $this->showResults = false;
        $this->isLoading = false;
    }

    public function setType($type)
    {
        $this->searchType = $type;
        if (!empty($this->query)) {
            $this->search();
        }
    }

    public function hideResults()
    {
        $this->showResults = false;
    }

    public function showResultsAgain()
    {
        if (!empty($this->results)) {
            $this->showResults = true;
        }
    }

    protected function getDefaultSearchTypes()
    {
        return [
            ['value' => 'all', 'label' => 'All'],
            ['value' => 'docs', 'label' => 'Documentation'],
            ['value' => 'component', 'label' => 'Components'],
            ['value' => 'css', 'label' => 'CSS Classes'],
        ];
    }

    public function render()
    {
        return view('componix::livewire.live-search');
    }
}
