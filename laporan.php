<div class="card">
    <div class="card-body">
        <h1 class="mt-4">Laporan Peminjaman Buku</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input type="text" id="tanggal_awal" class="form-control datepicker" placeholder="Pilih Tanggal Awal...">
                </div>
                <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input type="text" id="tanggal_akhir" class="form-control datepicker" placeholder="Pilih Tanggal Akhir...">
                </div>
                <button class="btn btn-primary" id="filter_btn"><i class="fa fa-filter"></i> Filter</button>
                <a href="cetak.php" target="_blank" class="btn btn-primary" id="cetak_btn"><i class="fa fa-print"></i> Cetak Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <!-- Tabel data peminjaman buku -->
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        $(".datepicker").datepicker({
            dateFormat: 'yy-mm-dd'
        });

        $("#filter_btn").click(function() {
            var tanggal_awal = $("#tanggal_awal").val();
            var tanggal_akhir = $("#tanggal_akhir").val();

            $.ajax({
                url: "filter_laporan.php?tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir,
                success: function(response) {
                    $("#dataTable").html(response);
                }
            });
        });

        $("#cetak_btn").click(function(e) {
            e.preventDefault();

            var tanggal_awal = $("#tanggal_awal").val();
            var tanggal_akhir = $("#tanggal_akhir").val();

            var url = "cetak.php?tanggal_awal=" + tanggal_awal + "&tanggal_akhir=" + tanggal_akhir;
            window.open(url, "_blank");
        });
    });
</script>