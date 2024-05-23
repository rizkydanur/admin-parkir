<div class="container mt-5">
    <div class="row row-cols-2">
        @if(count($parkirKeluar) > 0)
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
                        @if(date('Y-m-d', strtotime($item->jam_keluar)) == date('Y-m-d'))
                            <tr>
                                <td>{{ $item->no_polisi }}</td>
                                <td>{{ $item->id_kartu }}</td>
                                <td>{{ $item->jam_keluar }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning" role="alert">
                Tidak ada data parkir hari ini.
            </div>
        @endif
    </div>
    </div>
