<div>
    
    <table class="table table-bordered" wire:poll3.s>
        <thead>
            <tr>
                <th>TOTAL KENDARAAN PARKIR</th>
                <th>TOTAL PARKIR TERSEDIA</th>               
                <th>TOTAL SLOT PARKIR</th>


                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->total_kendaraan_parkir }}</td>
                    <td>{{ $item->total_parkir_tersedia }}</td>
                    <td>{{ $item->total_slot_parkir }}</td>

                    <td>
                        
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" wire:click="edit({{ $item->id }})">Edit</button>
                        <button class="btn btn-danger btn-sm" wire:click="resetRecord({{ $item->id }})">reset</button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



    <!-- Edit Modal -->
    <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Update Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="update">
                        <div class="mb-3">
                            <label for="total_kendaraan_parkir" class="form-label">Total Kendaraan</label>
                            <input type="number" class="form-control" id="total_kendaraan_parkir" wire:model="total_kendaraan_parkir">
                            @error('total_kendaraan_parkir') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
