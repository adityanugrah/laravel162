@extends ('welcome')
@section ('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Transaksi Masuk</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/')}}">Home</a>
            </li>
            <li class="active">
                <strong>Transaksi Masuk</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="order_id">Kode Transaksi</label>
                    <input type="text" id="order_id" name="order_id" value="" placeholder="Kode Transaksi" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="status">Tanggal Transaksi</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added" type="text" class="form-control" value="03/04/2014">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="customer">Kode Supplier</label>
                    <input type="text" id="customer" name="customer" value="" placeholder="Kode Supplier" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="date_added">Nama Supplier</label>
                    <input type="text" id="customer" name="customer" value="" placeholder="Nama Supplier" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="date_modified">Jenis Barang</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" selected>Seragam Baru</option>
                        <option value="1">Pre-Used</option>
                        <option value="2">Loker</option>
                        <option value="3">Tools</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="amount">Kode Barang</label>
                    <input type="text" id="amount" name="amount" value="" placeholder="Kode Barang" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="amount">Nama Barang</label>
                    <input type="text" id="amount" name="amount" value="" placeholder="Nama Barang" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="amount">Jumlah Barang</label>
                    <input type="text" id="amount" name="amount" value="" placeholder="Jumlah Barang" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="amount">Harga Barang</label>
                    <input type="text" id="amount" name="amount" value="" placeholder="Harga Barang" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>
                        <tr>
                            <th>Kode Transaksi</th>
                            <th data-hide="phone">Tanggal Transaksi</th>
                            <th data-hide="phone">Nama Barang</th>
                            <th data-hide="phone">Jumlah Barang</th>
                            <th data-hide="phone,tablet" >Harga Barang</th>
                            <th class="center">Action</th>
                        </tr>
                        </thead>
                            <tbody>
                                <tr>
                                    <td>
                                       <a href="/">3214</a>
                                    </td>
                                    <td>
                                        Customer example
                                    </td>
                                    <td>
                                        $500.00
                                    </td>
                                    <td>
                                        03/04/2015
                                    </td>
                                    <td>
                                        03/05/2015
                                    </td>
                                    <td class="center">
                                        <button class="btn fa fa-pencil" data-toggle="modal" data-target="#myModals" title="Ubah Data">
                                            <span class="lnr lnr-pencil"></span>
                                        </button> 

                                        <form method="POST" action="/" style="display: inline;">
                                          {{ method_field('DELETE') }}{{csrf_field()}}
                                          <button type="submit" class="btn btn-danger fa fa-trash delete-confirm" title="Hapus Data">
                                            <span class="lnr lnr-trash"></span>
                                          </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection