<div class="container mt-5">
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No Polisi</th>
                <th scope="col">ID Kartu</th>
                <th scope="col">Jam Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parkirKeluar as $item)
                <tr>
                    <td>{{ $item->no_polisi }}</td>
                    <td>{{ $item->id_kartu }}</td>
                    <td>{{ $item->jam_keluar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

