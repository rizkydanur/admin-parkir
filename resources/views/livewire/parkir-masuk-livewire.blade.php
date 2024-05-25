<div class="container mt-5" wire:poll.3s>
    <!-- <input type="text" wire:model.debounce.500ms="search" placeholder="Cari nomor polisi..."> -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No Polisi</th>
                <th scope="col">ID Kartu</th>
                <th scope="col">Jam Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parkirMasukArray as $item)
                <tr>
                    <td>{{ $item['no_polisi'] }}</td>
                    <td>{{ $item['id_kartu'] }}</td>
                    <td>{{ $item['jam_masuk'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $parkirMasukArray->links() }}
</div>
