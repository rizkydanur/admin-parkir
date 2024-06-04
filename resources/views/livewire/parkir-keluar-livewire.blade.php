<div class="container mt-5" wire:poll.2s>

@if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="startDate">Start Date</label>
                <input type="date" id="startDate" class="form-control" wire:model="startDate" placeholder="Start Date">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="endDate">End Date</label>
                <input type="date" id="endDate" class="form-control" wire:model="endDate" placeholder="End Date">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="search">Search</label>
                <input type="text" id="search" class="form-control" wire:model="search" placeholder="Search...">
            </div>
        </div>
        <br>

    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No Polisi</th>
                    <th scope="col">ID Kartu</th>
                    <th scope="col">Jam Keluar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parkirKeluarArray as $item)
                    <tr>
                        <td>{{ $item['no_polisi'] }}</td>
                        <td>{{ $item['id_kartu'] }}</td>
                        <td>{{ $item['jam_keluar'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $parkirKeluarArray->links() }}
</div>
