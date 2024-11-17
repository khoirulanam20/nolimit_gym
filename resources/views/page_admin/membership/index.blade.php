@extends('template_admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Membership</h4>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMembershipModal">
            Tambah Membership Baru
        </button>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="example" class="display compact nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAMA</th>
                                <th>KATEGORI</th>
                                <th>HARGA</th>
                                <th>TANGGAL MULAI</th>
                                <th>TANGGAL BERAKHIR</th>
                                <th>SISA HARI</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($memberships as $membership)
                                <tr>
                                    <td>{{ $membership->id }}</td>
                                    <td>{{ $membership->user->nama }}</td>
                                    <td>{{ $membership->kategori ? $membership->kategori->name : 'Tidak ada kategori' }}</td>
                                    <td>{{ $membership->price }}</td>
                                    <td>{{ $membership->start_date }}</td>
                                    <td>{{ $membership->end_date }}</td>
                                    <td>{{ \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($membership->end_date), false) }}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-primary editMembershipButton"
                                            data-id="{{ $membership->id }}" data-user_id="{{ $membership->user_id }}"
                                            data-kategori_id="{{ $membership->kategori_id }}"
                                            data-start_date="{{ $membership->start_date }}"
                                            data-price="{{ $membership->price }}"
                                            data-duration="{{ $membership->duration }}">Edit</a>
                                        <form action="{{ route('membership_dashboard.destroy', $membership->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus membership ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Tambah Membership Modal -->
        <div class="modal fade" id="addMembershipModal" tabindex="-1" aria-labelledby="addMembershipModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMembershipModalLabel">Tambah Membership Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('membership_dashboard.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Nama User</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select class="form-control" id="kategori_id" name="kategori_id" required>
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id }}" data-price="{{ $kat->price }}">{{ $kat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price_kategori" class="form-label">Harga Kategori</label>
                                <input type="number" class="form-control" id="price_kategori" name="price_kategori" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label">Durasi</label>
                                <select class="form-control" id="duration" name="duration" required>
                                    <option value="1">1 Bulan</option>
                                    <option value="3">3 Bulan</option>
                                    <option value="6">6 Bulan</option>
                                    <option value="12">12 Bulan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Total Harga</label>
                                <input type="number" class="form-control" id="price" name="price" readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Membership Modal -->
        <div class="modal fade" id="editMembershipModal" tabindex="-1" aria-labelledby="editMembershipModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMembershipModalLabel">Edit Membership</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" id="editMembershipForm">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="edit_user_id" class="form-label">Nama User</label>
                                <select class="form-control" id="edit_user_id" name="user_id" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit_kategori_id" class="form-label">Kategori</label>
                                <select class="form-control" id="edit_kategori_id" name="kategori_id" required>
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id }}" data-price="{{ $kat->price }}">{{ $kat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price_kategori" class="form-label">Harga Kategori</label>
                                <input type="number" class="form-control" id="price_kategori" name="price_kategori" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="edit_start_date" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="edit_start_date" name="start_date"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_duration" class="form-label">Durasi</label>
                                <select class="form-control" id="edit_duration" name="duration" required>
                                    <option value="1">1 Bulan</option>
                                    <option value="3">3 Bulan</option>
                                    <option value="6">6 Bulan</option>
                                    <option value="12">12 Bulan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Total Harga</label>
                                <input type="number" class="form-control" id="price" name="price" required readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addKategoriModal">
            Tambah Kategori
        </button>

        <!-- Tabel Kategori -->
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Kategori</h5>

            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="kategoriTable" class="display compact nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAMA KATEGORI</th>
                                <th>DESKRIPSI</th>
                                <th>HARGA</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $kat)
                                <tr>
                                    <td>{{ $kat->id }}</td>
                                    <td>{{ $kat->name }}</td>
                                    <td>{{ $kat->description }}</td>
                                    <td>{{ $kat->price }}</td>
                                    <td>
                                        <button class="btn btn-primary editKategoriButton" 
                                            data-bs-toggle="modal"
                                            data-bs-target="#editKategoriModal" 
                                            data-id="{{ $kat->id }}"
                                            data-name="{{ $kat->name }}"
                                            data-description="{{ $kat->description }}"
                                            data-price="{{ $kat->price }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('kategori.destroy', $kat->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tambah Kategori Modal -->
        <div class="modal fade" id="addKategoriModal" tabindex="-1" aria-labelledby="addKategoriModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addKategoriModalLabel">Tambah Kategori Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="description" name="description" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Kategori Modal -->
        <div class="modal fade" id="editKategoriModal" tabindex="-1" aria-labelledby="editKategoriModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKategoriModalLabel">Edit Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" id="editKategoriForm">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="edit_name" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_description" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="edit_description" name="description" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_price" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="edit_price" name="price" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Event handler untuk membership
            $('.editMembershipButton').click(function() {
                var id = $(this).data('id');
                var user_id = $(this).data('user_id');
                var kategori_id = $(this).data('kategori_id');
                var start_date = $(this).data('start_date');
                var price = $(this).data('price');
                var duration = $(this).data('duration');

                $('#editMembershipModal').find('form').attr('action', '/membership_dashboard/' + id);
                $('#edit_user_id').val(user_id);
                $('#edit_kategori_id').val(kategori_id);
                $('#edit_start_date').val(start_date);
                $('#edit_price').val(price);
                $('#edit_duration').val(duration);

                $('#editMembershipModal').modal('show');
            });

            // Event handler untuk kategori
            $('.editKategoriButton').click(function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let description = $(this).data('description');
                let price = $(this).data('price');

                $('#edit_name').val(name);
                $('#edit_description').val(description);
                $('#edit_price').val(price);
                $('#editKategoriForm').attr('action', `/kategori/${id}`);
            });

            // Inisialisasi DataTable
            $('#example').DataTable();
            $('#kategoriTable').DataTable();
        });

        $(document).ready(function() {
            // Fungsi untuk mengupdate harga kategori
            function updateKategoriPrice() {
                var kategoriId = $('#kategori_id').val();
                var kategoriPrice = $(`#kategori_id option:selected`).data('price');
                $('#price_kategori').val(kategoriPrice);
                
                // Update total harga berdasarkan durasi
                updateTotalPrice();
            }

            // Fungsi untuk menghitung total harga
            function updateTotalPrice() {
                var basePrice = parseInt($('#price_kategori').val()) || 0;
                var duration = parseInt($('#duration').val()) || 1;
                var totalPrice = basePrice * duration;
                $('#price').val(totalPrice);
            }

            // Event listener untuk perubahan kategori
            $('#kategori_id').change(updateKategoriPrice);
            
            // Event listener untuk perubahan durasi
            $('#duration').change(updateTotalPrice);

            // Update harga saat halaman dimuat
            updateKategoriPrice();
        });
    </script>
@endsection
