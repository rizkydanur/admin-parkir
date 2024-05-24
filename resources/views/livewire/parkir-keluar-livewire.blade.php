<div class="container mt-5">
    <!-- <input type="text" wire:model.debounce.300ms="search" placeholder="Search by No Polisi or ID Kartu" /> -->
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
    {{ $parkirKeluarArray->links() }}
</div>
