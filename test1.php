<script type="text/javascript" src="js/llqrcode.js"></script>
<script type="text/javascript" src="js/webqr.js"></script>

<style>
    #qr-canvas {
        display: none;
        height: 200px;
    }

    video {
        height: 220px;
        border: solid;
        border-width: 3px 3px 3px 3px;
    }
</style>

<div class="jumbotron">
    <div class="container" id="mainbody">
        <div class="row justify-content-md-center">
            <div class="col col-lg-2">

            </div>
            <div class="col-md-auto">
                <a class="btn btn-primary btn-block" id="webcamimg" href="#" role="button" onclick="setwebcam()">
                    Scan
                </a>
                <hr>

                <div id="outdiv"></div>
                <div id="result"></div>

                <canvas id="qr-canvas" height="200" width="200"></canvas>
                <script type="text/javascript">
                    load();
                </script>
            </div>
            <div class="col col-lg-2">

            </div>
        </div>
    </div>
</div>