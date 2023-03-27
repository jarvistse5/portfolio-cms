<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class ProjectModal extends Component
{
    public $user;
    public $selectedProject;
    public $selectedIndex;
    public $page = 1;

    public function render()
    {
        return view('livewire.frontend.project-modal', [
            'selectedProject' => $this->selectedProject,
            'selectedIndex' => $this->selectedIndex,
        ]);
    }

    public function selected($index)
    {
        $projects = data_get($this->user, 'projects');
        $this->selectedProject = $projects[$index];
        $this->selectedIndex = $index;
        $this->page = 1;
        $this->emit('changed');
    }

    public function unselect()
    {
        $this->selectedProject = null;
        $this->selectedIndex = null;
        $this->page = 1;
        $this->emit('changed');
    }

    public function prev()
    {
        if ($this->page > 1) {
            $this->page--;
            $this->emit('changed');
        }
    }

    public function next()
    {
        $count = count($this->selectedProject['assets']);
        if ($this->page < $count) {
            $this->page++;
            $this->emit('changed');
        }
    }
}