                <div class="page-content-wrapper">
                    <div class="page-content">
                        <div class="page-bar" style="background-color:#E1E5EC">
                            <ul class="page-breadcrumb">
                                <li>
                                    <span>Report</span>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Morning Report</span>
                                </li>
                            </ul>
                        </div>
                        <h1 class="page-title"> Morning Report (daily) 
                             <button class="btn btn-primary btn-xs" onclick="printContent('p1')"><i class="fa fa-print"> Print Morning Report </i></button>
                        </h1>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Bulan Awal
                                        </span>
                                        <input type="month" class="form form-control" name="batas_bawah" id="batas_bawah" required>
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Bulan Akhir
                                        </span>
                                        <input type="month" class="form form-control" name="batas_atas" id="batas_atas" required>
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                                <div class="col-lg-2">
                                    <button class="btn btn-primary form-control" id="btn_cari" onClick="filterLaporan();">
                                        <span class="glyphicon glyphicon-search"></span>
                                        Cari 
                                    </button>
                                </div><!-- /.col-lg-6 -->
                            </div><!-- /.row -->
                            <hr>
                            <div class="row">
                                <div id="p1">
                                    <center>
                                        <strong>
                                            <h4>Laporan Harian Stasiun Pemantauan Waduk Darma</h4>
                                            <h4>Bulan data : <span id="bulan_data"></span></h4>
                                            <h6>(Pemantauan Pukul 8 Pagi)</h6>
                                        </strong>
                                    </center>
                                    <br>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Waktu</th>
                                                <th>Ketinggian</th>
                                                <th>Volume</th>
                                                <th>Status Ketinggian</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_log">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
				function printContent(el){
                    var restorepage = document.body.innerHTML;
                    var printcontent = document.getElementById(el).innerHTML;
                    document.body.innerHTML = printcontent;
                    window.print();
                    // document.body.innerHTML = restorepage;
                    window.location = '<?php echo site_url(); ?>/monitoringketinggian/morning_report';
                }
                
                function filterLaporan(){
                    var batas_bawah = document.getElementById('batas_bawah').value;
                    var batas_atas = document.getElementById('batas_atas').value;
                    if(batas_bawah !== "" && batas_atas !== ""){
                        if(batas_bawah > batas_atas){
                            alert("Perhatian : Bulan akhir harus lebih besar atau sama dengan bulan awal. Terima kasih.");
                        }else{
                            load_report(batas_bawah,batas_atas);
                        }    
                    }else{
                        alert("Perhatian : Bulan akhir dan bulan awal harus diisi. Terima kasih.");
                    }    
                }

                function load_report(bb,ba){
                    var str_tabel = '';
                    $.ajax({
                        url : "<?php echo site_url(); ?>/api/custom_morning_report/" + bb + "/" + ba + "/",
                        type : "GET",
                        dataType : "json",
                        success : function(response){
                            if(response.report.custom_morning_report.length > 0){
                                $("#bulan_data").html(bb + " sampai dengan " + ba);
                                var ctr = 1;
                                var severity = "";
                                for(var i=0;i<response.report.custom_morning_report.length;i++){
                                    if(response.report.custom_morning_report[i].status == "Rendah"){
                                        severity = "badge badge-warning";
                                    }else
                                    if(response.report.custom_morning_report[i].status == "Tinggi"){
                                        severity = "badge badge-danger";
                                    }else
                                    if(response.report.custom_morning_report[i].status == "Normal"){
                                        severity = "badge badge-success";
                                    }
                                    str_tabel += '<tr>';
                                    str_tabel += '<td>' + ctr + '</td>';
                                    str_tabel += '<td>' + response.report.custom_morning_report[i].date + '</td>';
                                    str_tabel += '<td>' + parseFloat(response.report.custom_morning_report[i].ketinggian).toFixed(2) + ' cm dari dasar</td>';
                                    str_tabel += '<td>' + parseFloat(response.report.custom_morning_report[i].volume).toFixed(2) + ' cm<sup>3</sup></td>';
                                    str_tabel += '<td><span class="'+severity+'">' + response.report.custom_morning_report[i].status + '</span></td>';
                                    str_tabel += '</tr>';
                                    ctr++;
                                }
                            }else{
                                str_tabel += '<tr>';
                                str_tabel += '<td colspan="5">Tidak ada laporan tersimpan untuk periode ini.</td>';
                                str_tabel += '</tr>';
                            }
                            $("#body_log").html(str_tabel);
                        }
                    });
                }

                
				</script>
            