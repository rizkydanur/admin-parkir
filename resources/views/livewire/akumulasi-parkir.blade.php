<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>TOTAL MOBIL MASUK</th>
                <th>TOTAL PARKIR TERSEDIA</th>
                <th>TOTAL SLOT PARKIR</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody wire:poll.2s>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->total_kendaraan_parkir }}</td>
                    <td>{{ $item->total_parkir_tersedia }}</td>
                    <td>{{ $item->total_slot_parkir }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" wire:click="edit({{ $item->id }})">Edit</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#resetModal" wire:click="resetRecord({{ $item->id }})">Reset</button>
                        <!-- <button class="btn btn-danger btn-sm" wire:click="resetRecord({{ $item->id }})">reset</button> -->
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
                            <input type="number" class="form-control" id="total_kendaraan_parkir" wire:model="total_kendaraan_parkir" min="0" max="144">
                            @error('total_kendaraan_parkir') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset Confirmation Modal -->
    <div wire:ignore.self class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetModalLabel">Konfirmasi Reset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Ingin Reset Data Parkir?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" wire:click="resetRecord({{ $item->id }})">Ya, Reset</button>
                </div>
            </div>
        </div>
    </div>
</div>
