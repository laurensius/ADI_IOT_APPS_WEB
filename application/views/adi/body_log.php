                <div class="page-content-wrapper">
                    <div class="page-content">
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <span>Monitoring</span>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Today Log</span>
                                </li>
                            </ul>
                        </div>
                        <h1 class="page-title"> Today Log <button class="btn btn-xs" onclick="printContent('p1')"><i class="fa fa-print"> Print Today Log </i></button> </h1>
                        <div class="container-fluid">
    						<div id="p1">
                                <center>
                                    <strong>
                                        <h4>Tabel Log Kondisi Ketinggian Air</h4>
    									<h4>Pada hari ini <?php echo date("d-m-Y")?></h4></br>
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
				
                <script type="text/javascript">
                    function refresh_data(){
                        var str_tabel = '';
                        $.ajax({
                            url : "<?php echo site_url(); ?>/api/dataset/",
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
                                        str_tabel += '<td>' + parseFloat(response.dataset.today_log[i].ketinggian).toFixed(2) + '</td>';
                                        str_tabel += '<td>' + parseFloat(response.dataset.today_log[i].volume).toFixed(2) + '</td>';
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
                    // document.body.innerHTML = restorepage;
                    window.location = '<?php echo site_url(); ?>/monitoringketinggian/today_log/';
                }
				</script>
            