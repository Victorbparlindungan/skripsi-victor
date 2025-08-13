<?= $this->extend('layout/frontend_type2') ?>
 
<?= $this->section('content') ?>

<section class="ftco-section contact-section">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="col-md-12 block-9 mb-md-5">
          <input type="hidden" id="id_transport" value="<?=$transport['id']?>">
          <input type="hidden" id="price" value="<?=$transport['price']?>">
          <div class="form-group">
            Kendaraan
            <input type="text" class="form-control" value="<?=$transport['transport_name']?>" readonly>
          </div>
          <div class="form-group">
            Tanggal Dari
            <input type="date" class="form-control" id="date_start" value="<?=date('Y-m-d')?>" onchange="calculate()" placeholder="Tanggal Dari"/>
          </div>
          <div class="form-group">
            Tanggal Sampai
            <input type="date" class="form-control" id="date_end" value="<?=date('Y-m-d')?>" onchange="calculate()"placeholder="Tanggal Sampai"/>
          </div>
          <div class="form-group">
            Biaya
            <input type="text" class="form-control"id="total_price"  value="<?=number_format($transport['price'])?>" readonly>
          </div>
          <div class="form-group">
            Nama Pemesan
            <input type="text" class="form-control" id="booking_name" placeholder="Nama">
          </div>
          <div class="form-group">
            Nomor HP Pemesan
            <input type="text" class="form-control" id="booking_phone" placeholder="Nomor HP">
          </div>
          <div class="form-group">
            Alamat Pemesan
            <input type="text" class="form-control" id="booking_address" placeholder="Alamat">
          </div>
          <div class="form-group">
            <input onclick="payment()" value="Send Message" class="btn btn-primary py-3 px-5">
          </div>
      
      </div>
    </div>
  </div>
</section>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= esc($midtransClientKey) ?>"></script>	
<script type="text/javascript">
	
  function calculate() {
    const date_start = document.getElementById("date_start").value;
    const date_end = document.getElementById("date_end").value;
    const tanggalAwal = new Date(date_start);
    const tanggalAkhir = new Date(date_end);

    // Hitung selisih waktu dalam milidetik
    const selisihWaktu = tanggalAkhir - tanggalAwal;

    // Konversi ke hari (1 hari = 86400000 ms)
    const selisihHari = selisihWaktu / (1000 * 60 * 60 * 24) + 1;
    var cost = (parseInt(selisihHari) * parseInt(document.getElementById("price").value));
    document.getElementById("total_price").value = cost.toLocaleString();

  }
	function payment() {
    var total =  parseInt(document.getElementById("total_price").value.replace(/,/g, ''));
    var date_start =  document.getElementById("date_start").value;
    var date_end =  document.getElementById("date_end").value;
    var booking_name =  document.getElementById("booking_name").value;
    var booking_phone =  document.getElementById("booking_phone").value;
    var booking_address =  document.getElementById("booking_address").value;
    var id_transport =  document.getElementById("id_transport").value;
    var pass = 0;
    if(booking_name == ""){
      pass = 1;
      alert('Nama Pemesan Belum Diisi');
    }
    if(booking_phone == ""){
      pass = 1;
      alert('Hp Pemesan Belum Diisi');
    }
    if(booking_address == ""){
      pass = 1;
      alert('Alamat Belum Diisi');
    }
    if(pass == 0){
      $.ajax({
            type: "GET",
            url: '/payment/'+total,
            context: document.body
        }).done(function(data) {
            console.log(data)
            var response = JSON.parse(data)
            var snapToken = response.snapToken
            var va_number = '';
            var bank = '';
            var transaction_status = '';
            snap.pay(snapToken, {
            onSuccess: function(result){
                transaction_status = result.transaction_status;
                if(result.payment_type == 'bank_transfer'){
                    va_number = result.va_numbers[0].va_number;
                    bank = result.va_numbers[0].bank;
                }else if(result.payment_type == 'echannel'){
                    va_number = result.bill_key;
                    bank = result.biller_code;
                }else if(result.payment_type == 'cstore'){
                    va_number = result.payment_code;
                }
                
                $.ajax({
                    type: "POST",
                    url: '/save_booking',
                    data: { 
                        date_start: date_start,
                        date_end: date_end,
                        booking_name: booking_name,
                        booking_phone: booking_phone,
                        booking_address: booking_address,
                        id_transport: id_transport
                    },
                    context: document.body
                    }).done(function(data) {
                        location.href = "/";
                    })
            },
            // Optional
            onPending: function(result){
                console.log(result)
            },
        
            // Optional
            onError: function(result){
                
                swal("Pembayaran Gagal", "Pembayaran Gagal", "error");
            },
            });
            
            
        })
    }
        	
    }
	
</script>

<?= $this->endSection() ?>

