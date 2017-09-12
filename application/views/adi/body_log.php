                <div class="page-content-wrapper">
                    <div class="page-content">
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <span>Monitoring</span>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>System Log</span>
                                </li>
                            </ul>
                        </div>
                        <h1 class="page-title"> System Log Ketinggian Air
                        </h1>
                        <div class="container-fluid">
						<div id="p1">
                            <center>
                                <strong>
                                    <h4>Tabel Log Kondisi Level Air</h4>
									<h4>Dalam Periode</h4></br>
                                </strong>
                            </center>
                            <br>
							
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Waktu</th>
                                        <th>Status Ketinggian</th>
                                    </tr>
                                </thead>
                                <tbody id="body_log">
                                </tbody>
                            </table>
							</div>
							<button class="btn btn-success" onclick="printContent('p1')"><i class="fa  fa-print">Print</i></button>
                        </div>
                    </div>
                </div>
				
                <script type="text/javascript">
                    function refresh_data(){
                        var str_tabel = '';
                        $.ajax({
                            url : "<?php echo site_url(); ?>/adi/api/dataset/",
                            type : "GET",
                            dataType : "json",
                            success : function(response){
                                if(response.dataset.today_log.length > 0){
                                    var ctr = 1;
									var severity = "";
                                    for(var i=0;i<response.dataset.today_log.length;i++){
										if(response.dataset.today_log[i].status === "rendah"){
											severity = "badge badge-warning";
										}else
										if(response.dataset.today_log[i].status === "tinggi"){
											severity = "badge badge-danger";
										}
                                        str_tabel += '<tr>';
                                        str_tabel += '<td>' + ctr + '</td>';
                                        str_tabel += '<td>' + response.dataset.today_log[i].datetime + '</td>';
                                        str_tabel += '<td><span class="'+severity+'">' + response.dataset.today_log[i].status + '</span></td>';
                                        str_tabel += '</tr>';
                                        ctr++;
                                    }
                                }else{
                                    str_tabel += '<tr>';
                                    str_tabel += '<td colspan="5">Tidak ada log tersimpan hari ini.</td>';
                                    str_tabel += '</tr>';
                                }
                                $("#body_log").html(str_tabel);
                            }
                        });
                    }
                    setInterval(function(){refresh_data();},1000);
					 
                </script>
				<script>
				  function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
				</script>
            