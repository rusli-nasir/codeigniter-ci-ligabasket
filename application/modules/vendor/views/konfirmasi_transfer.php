

<section class="row">

    <div class="col-sm-8 col-md-8 col-lg-8">

        <div class="card">

            <div class="card-block">

            <table id="dataTable" class="table-striped table-hover" style="width:100%">

                <thead>

                    <tr>

                        <th>Invoice</th>

                        <th>Tanggal</th>

                        <th>Lokasi</th>

                        <th>Durasi Sewa</th>

                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($data as $idx=>$row) { ?>

                        <?php 
                            $bgType = 'bg-info';
                            if($row->status == 'confirmed') {
                                $bgType = 'bg-success';
                            } else if($row->status == 'accepted') {
                                $bgType = 'bg-warning';
                            } else if($row->status == 'paid') {
                                $bgType = 'bg-danger';
                            }
                        ?>
                        <tr data-id='<?= $row->id ?>' data-receipt='data:image/png;base64,<?= base64_encode($row->image_raw) ?>' data-status='<?= $row->status ?>' data-rent-hour='<?= $row->rent_hour ?>' data-hall='<?= $row->hall ?>' data-order-date='<?= $row->order_date ?>' data-customer='<?= $row->customer ?>' data-message='<?= $row->message ?>' data-total='<?= $row->total_bill ?>' data-lat='<?= $row->pic_latitude ?>' data-lng='<?= $row->pic_longitude ?>'>

                            <td><?= $row->id ?></td>

                            <td><?= $row->order_date; ?></td>

                            <td><?= $row->hall; ?></td>

                            <td><?= $row->rent_hour; ?> jam</td>

                            <td style="text-align: center">
                                <div class="alert <?= $bgType ?>"><?= $row->status; ?></span>
                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

            </div>

        </div>

       
        <div class="mapcontainer mb-4 " style="background: #EEE;">
            <div id="googleMap" style="width:100%;height:340px;"></div>
        </div>

    </div>

    <div class="col-sm-4 col-md-4 col-lg-4">

        <div class="card detail data-penyewaan mb-4 " style="display: none">

            <div class="card-block">

                <h3 class="card-title">Invoice</h3>

                <h6 class="card-subtitle mb-2 text-muted"></h6>

                <div class="row content">

                   <div class="col-md-6">

                       <div>Tanggal Order</div>

                       <div>Customer</div>

                       <div>Lokasi</div>

                       <div>Durasi Sewa</div>

                       <div>Total Tagihan</div>

                   </div>

                   

                   <div class="col-md-6 text-right">

                        <div id="rentDate"></div>

                        <div id="customer"></div>

                        <div id="hall"></div>

                        <div id="rentHour"></div>

                        <div id="bill"></div>

                   </div>

                    

                   <div id="buktiBayar" class="col-md-12 border-top"></div>



                   <div class="col-md-12 confirmation border-top" style="display: none">

                    <button id="orderAcceptBtn" type="button" class="btn btn-success">Terima Order</button>

                   </div>

                </div>

            </div>

        </div>

    </div> 

</section>

