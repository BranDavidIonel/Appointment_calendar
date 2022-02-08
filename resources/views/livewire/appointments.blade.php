<div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-6 border-container">
            <h2>All Appointments</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($all_appintments))
                    @foreach($all_appintments as $appintment )
                    <tr>
                        <td>{{$appintment->name}}</td>
                        <td>{{$appintment->description}}</td>
                        <td>{{$appintment->date}}</td>
                    </tr>

                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-md-6 border-container">
            <h2>New Appointment</h2>
            <form   wire:submit.prevent="submit(Object.fromEntries(new FormData($event.target)))">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input wire:model="new_appointment.name" name="name" type="text" class="form-control" id="NameInput" placeholder="name..">
                    @error('new_appointment.name') <span class="text-danger">{{ $message}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="DescriptionInput">Description</label>
                    <textarea  wire:model="new_appointment.description" name="description" class="form-control" id="DescriptionInput" placeholder="more details.."></textarea>
                    @error('new_appointment.description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group"  >
                    <label for="DateInput">Date</label>
                    <input  wire:model="new_appointment.date" name="date" class="form-control" type="text" id="datetime">
                    @error('new_appointment.date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
    @push('scripts')

    @endpush
</div>