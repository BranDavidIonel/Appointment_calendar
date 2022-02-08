<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointment;

class Appointments extends Component
{
    public Appointment $new_appointment;
    public $all_appintments;
    public function mount()
    {
        $this->new_appointment = new Appointment();
    }

    public function render()
    {

        $this->all_appintments = Appointment::orderBY('date', 'DESC')->get();
        return view('livewire.appointments');
    }
    protected $rules = [
        'new_appointment.name' => 'required|string|min:2|max:200',
        'new_appointment.description' => 'required|string|max:8000',
        'new_appointment.date' => 'required'
    ];

    public function submit($request)
    {
        $this->new_appointment->name=$request['name'];
        $this->new_appointment->description=$request['description'];
        $this->new_appointment->date=$request['date'];
        $this->validate();
        $this->new_appointment->save();
        //reset de all de data
        $this->new_appointment = new Appointment();

    }
}
