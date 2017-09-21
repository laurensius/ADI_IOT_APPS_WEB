                <div class="page-content-wrapper">
                    <div class="page-content">
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <span>Monitoring</span>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Dam Monitoring</span>
                                </li>
                            </ul>
                        </div>
                        <h1 class="page-title"> Dam Monitoring 
                            <small></small>
                        </h1>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <div id="gg1"></div>
                                </div>
                                <div class="col-lg-3"></div>
                                <div class="col-lg-12">
                                    <center>
                                        <div id="nilai" style="font-size:24px">0</div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url();?>assets/global/plugins/justgage/justgage-1.1.0.js" type="text/javascript"></script>
                <script src="<?php echo base_url();?>assets/global/plugins/justgage/raphael-2.1.4.min.js" type="text/javascript"></script>
                <script type="text/javascript">

                    var snd = new Audio("<?php echo base_url()?>assets/sound/ambulance.wav");

                    var gg1 = new JustGage({
                            id: "gg1",
                            value: 0,
                            min: 0,
                            max: 20,
                            title: "Ketinggian Air ",
                            label: "Status",
                            donut: false,
                            relativeGaugeSize : true,
                            textRenderer: customValue,
                            gaugeWidthScale: 0.2

                        });

                    function refresh_data(){
                        $.ajax({
                              url : "<?php echo site_url(); ?>/api/dataset/",
                              type : "GET",
                              cache: false,
                              dataType : "json",
                              async : true,
                              success : function(response){
                                    gg1.refresh(response.dataset.last_data[0].ketinggian);
                                    $("#nilai").html(parseFloat(response.dataset.last_data[0].ketinggian,2) + " cm dari dasar bendungan dengan volume " + parseFloat(response.dataset.last_data[0].volume,2) + " cm<sup>3</sup>") ;
                                    if(parseInt(response.dataset.last_data[0].notif) === 1 || parseInt(response.dataset.last_data[0].notif) === 3) {
                                        snd.play();
                                    }     
                            }
                        });
                    }

                    function customValue(val) {
                        if (val >= 15) {
                            return 'Tinggi';
                        } else if (val > 5 && val < 15) {
                            return 'Normal';
                        } else if (val <= 5) {
                            return 'Rendah';
                        }
                    }
                    setInterval(function(){refresh_data();},1000);
                </script>
            