
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <div class="item active">
                <div class="details">
                   <div id="lineChart1"></div>
                   <div>
													<?php echo $this->element('kml/Disponibilidad/tables',array('tipoUnidad'=>1));?>
                   </div>
                </div>
            </div>
            <div class="item">
                <div class="paymentdetails">
                    <div id="lineChart2" style="width:90%; height:40%;"></div>
                   <div>
													<?php echo $this->element('kml/Disponibilidad/tables',array('tipoUnidad'=>2));?>
                   </div>
                </div>
            </div>
            <div class="item">
                <div class="paymentdetails">
                    <div id="lineChart3" style="width:90%; height:40%;"></div>
                   <div>
													<?php echo $this->element('kml/Disponibilidad/tables',array('tipoUnidad'=>4));?>
                   </div>
                </div>
            </div>
            <div class="item">
                <div class="paymentdetails">
                    <div id="lineChart4" style="width:90%; height:40%;"></div>
                </div>
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="controls glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="controls glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>


