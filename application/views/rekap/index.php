<style>
    @page {
        size: A4;
        margin: 0;
    }
</style>
<div class="card">
    <div class="card-header">
        Rekap Data
    </div>
    <div class="card-body">
        <div class="row d-print-none">
            <div class="col-2">
                Tahun dan bulan:
            </div>
            <div class="col-2">
                <input type="text" class="form-control" value="<?= $tahun ?>" id="tahun">
            </div>
            <div class="col-6">
                <select class="form-control" name="month" id="bulan">
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="col-2">
                <button class="btn btn-primary btn-block" type="button" id="see">Lihat</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <table
                        class="table table-bordered table-bordered dt-responsive nowrap print d-print-table" cellspacing="0"
                        width="100%">
                </table>

                <div>
                    <div id="error" style="text-align: center">

                    </div>

                </div>

                <div id="clickprint" class="d-print-none">

                </div>
            </div>
        </div>
    </div>
</div>