<!doctype html>
<html lang="en">

<head>
    <title>QR Code</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script type="text/javascript" src="llqrcode.js"></script>
    <script type="text/javascript" src="webqr.js"></script>

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
</head>

<body>

    <div class="jumbotron">
        <h1 class="display-3">QR Code scanner</h1>
        <p class="lead"></p>
        <hr class="my-2">
        <p>Reference: </p>
        <p class="lead">
            <ul>
                <li>http://www.lazarsoft.info/</li>
                <li>https://qrcodereader.ephespage.de/</li>
                <li>https://developer.tizen.org/development/articles/barcode-generator-and-scanner</li>
            </ul>
        </p>
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
</body>

</html>