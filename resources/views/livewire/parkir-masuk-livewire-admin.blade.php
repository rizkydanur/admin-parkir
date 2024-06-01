<div class="container mt-5">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- <div class="row mb-4">
        <div class="col-md-12">
            <input type="text" wire:model.debounce.300ms="search" class="form-control" placeholder="Search by No Polisi or ID Kartu" />
        </div>
    </div> -->

    <div class="row mb-4">
        <div class="col-md-12">
            <button wire:click="toggleForm" class="btn btn-primary mb-3">
                {{ $showForm ? 'Hide Form' : 'Add New Record' }}
            </button>
            @if ($showForm)
                <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" wire:model="no_polisi" class="form-control" placeholder="No Polisi">
                            @error('no_polisi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                            <input type="text" wire:model="id_kartu" class="form-control" placeholder="ID Kartu">
                            @error('id_kartu') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                            <input type="text" wire:model="jam_masuk" class="form-control" placeholder="Jam Masuk (YYYY-MM-DD HH:MM:SS)">
                            @error('jam_masuk') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                            @if($isEditMode)
                                <button type="submit" class="btn btn-success">Update</button>
                            @else
                                <button type="submit" class="btn btn-primary">Add</button>
                            @endif
                            <button type="button" wire:click="cancel" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <table class="table table-bordered table-striped table-hover" wire:poll.2s>
        <thead class="thead-dark">
            <tr>
                <th scope="col">No Polisi</th>
                <th scope="col">ID Kartu</th>
                <th scope="col">Jam Masuk</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parkirMasukArray as $item)
                <tr>
                    <td>{{ $item->no_polisi }}</td>
                    <td>{{ $item->id_kartu }}</td>
                    <td>{{ $item->jam_masuk }}</td>
                    <td>
                        <button wire:click="edit({{ $item->id }})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="delete({{ $item->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $parkirMasukArray->links() }}
</div>
