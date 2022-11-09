import { toastrSuccess, toastrError } from '../../../controllers/scripts/toastr.js'

function Scanner() {
    const input = document.getElementById("code");

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 30,
            formatsToSupport: [ Html5QrcodeSupportedFormats.QR_CODE ], 
            supportedScanTypes: [ Html5QrcodeScanType.SCAN_TYPE_CAMERA ],
            // supportedScanTypes: [ Html5QrcodeScanType.SCAN_TYPE_CAMERA ],
            qrbox: 250,
            rememberLastUsedCamera: true,

    });

    function onScanSuccess(decodedText) {
        // console.log(`Scan result: ${decodedText}`, decodedResult);

        toastrSuccess("QRCode obtido com sucesso!");
        html5QrcodeScanner.clear();
        input.value = decodedText;
    }

    function onScanError(errorMessage) {

    }

    html5QrcodeScanner.render(onScanSuccess, onScanError);
}

Scanner();

