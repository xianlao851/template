<?php

namespace App\Http\Livewire\Admin;

use App\Models\HrisEmployee;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search_employee;
    protected $getEmployees;
    public $employeelist;
    public $selectedPatient;
    // public function  updatedSearchEmployee()
    // {
    //     $columns = ['emp_id', 'lastname', 'firstname'];

    //     $this->getEmployees = HrisEmployee::select('emp_id', 'lastname', 'firstname', 'middlename', 'emp_id')->where(function ($query) use ($columns) {
    //         foreach ($columns as $column) {
    //             $query->orWhere($column, 'LIKE', '%' . $this->search_employee . '%');
    //         }
    //     })->get();
    // }

    public function render()
    {

        $columns = ['emp_id', 'lastname', 'firstname'];
        if (strlen($this->search_employee > 3)) {
            $this->getEmployees = HrisEmployee::select('emp_id', 'lastname', 'firstname', 'middlename', 'emp_id')->where(function ($query) use ($columns) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'LIKE', '%' . $this->search_employee);
                }
            })->paginate(6, ['*'], 'employeelist');
        }


        $users = User::all();
        return view('livewire.admin.index', [
            'users' => $users,
            'employees' => $this->getEmployees,
        ]);
    }

    public function selectedEmployee($getId)
    {
        $this->selectedPatient = HrisEmployee::where('emp_id', sprintf('%06d', $getId))->first();
        $this->resetExcept('selectedPatient');
    }
}
