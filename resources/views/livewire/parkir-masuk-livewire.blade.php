<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No Polisi</th>
                <th scope="col">ID Kartu</th>
                <th scope="col">Jam Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parkir_masuk as $item)
                <tr>
                    <td>{{ $item->no_polisi }}</td>
                    <td>{{ $item->id_kartu }}</td>
                    <td>{{ $item->jam_masuk }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
