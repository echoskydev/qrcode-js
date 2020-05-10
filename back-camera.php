<main class="default-content" aria-label="Content">
    <div class="wrapper-content">
        <style>
            #qr {
                width: 640px;
                border: 1px solid silver
            }

            @media(max-width: 600px) {
                #qr {
                    width: 300px;
                    border: 1px solid silver
                }
            }

            button:disabled,
            button[disabled] {
                opacity: 0.5;
            }



            .empty {
                display: block;
                width: 100%;
                height: 20px;
            }

            #qr .placeholder {
                padding: 50px;
            }
        </style>
        <h1> HTML5 QR Code scanner</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <div id="qr" style="display: inline-block;">
                        <div class="placeholder"> QR Code viewfinder comes here</div>
                    </div>
                    <div id="scannedCodeContainer"></div>
                    <div id="feedback"></div>
                </div>
                <div class="col-md-12 scan-type-region camera" id="scanTypeCamera">
                    <div>
                        <code id="status">Click "Start Scanning"</b></code>
                    </div>
                    <div>
                        <div>
                            <div id="selectCameraContainer" style="display: inline-block;"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <script src="js/qrcode.js"></script>
        <script src="node_modules/html5-qrcode/minified/html5-qrcode.min.js"></script>
        <script>
            const scanRegionCamera = document.getElementById('scanTypeCamera');
            const selectCameraContainer = document.getElementById('selectCameraContainer');
            const scannedCodeContainer = document.getElementById('scannedCodeContainer');
            const feedbackContainer = document.getElementById('feedback');
            const statusContainer = document.getElementById('status');
            const SCAN_TYPE_CAMERA = "camera";

            // declaration of html5 qrcode
            const html5QrCode = new Html5Qrcode("qr", /* verbose= */ true);
            var currentScanTypeSelection = SCAN_TYPE_CAMERA;
            var codesFound = 0;
            var lastMessageFound = null;


            $(function() {
                Html5Qrcode.getCameras().then(cameras => {
                    // selectCameraContainer.innerHTML = `Select Camera (${cameras.length})`;
                    if (cameras.length == 0) {
                        setFeedback("Error: Zero cameras found in the device");
                        return false;
                    }

                    if (cameras.length > 1) {
                        var cameraId = cameras[1].id;
                    } else {
                        var cameraId = cameras[0].id;
                    }

                    console.log('cameraId :>> ', cameraId);

                    setFeedback("Select carmera: " + cameraId);

                    html5QrCode.start(
                            cameraId, {
                                fps: 10,
                                qrbox: 250
                            },
                            qrCodeSuccessCallback,
                            qrCodeErrorCallback)
                        .then(_ => {
                            setStatus("scanning");
                            setFeedback("");
                        })
                        .catch(error => {
                            videoErrorCallback(error);
                        });

                }).catch(err => {
                    setFeedback(`Error: Unable to query any cameras. Reason: ${err}`);
                });
            });


            const setFeedback = message => {
                feedbackContainer.innerHTML = message;
            }
            const setStatus = status => {
                statusContainer.innerHTML = status;
            }
            const qrCodeSuccessCallback = qrCodeMessage => {
                setStatus("Pattern Found");
                setFeedback("");
                if (lastMessageFound === qrCodeMessage.toLocaleLowerCase()) {
                    return;
                }
                ++codesFound;
                lastMessageFound = qrCodeMessage.toLocaleLowerCase();
                const result = document.createElement('div');
                result.innerHTML = `[${codesFound}] New code found: <strong>${qrCodeMessage}</strong>`;
                scannedCodeContainer.appendChild(result);

                html5QrCode.stop();
            }
            const qrCodeErrorCallback = message => {
                setStatus("Scanning");
            }
            const videoErrorCallback = message => {
                setFeedback(`Video Error, error = ${message}`);
            }
        </script>
    </div>
</main>