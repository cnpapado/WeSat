function visiblenow(target_alt, target_az) {
    //check??
    console.log("loaded");
    function sat_found(alt, az, t_alt, t_az, eps) {
        return (math.abs(alt-t_alt)<eps && math.abs(alt-t_alt)<eps);
    }

    function unlock_sat(d) {
        d.innerHTML = "Sat found! Your satellite will now unlock.";
    }

    var observation_info = document.querySelector('.observation-info');
    var found_banner = document.querySelector('.found-banner');
    var orientation_sensors = document.querySelector('.orientation_sensors');

    observation_info.innerHTML = "Look at up and try to locate the satellite in the night sky. Then point your phone towards it to verify.";
    var promise = FULLTILT.getDeviceOrientation({ 'type': 'world' });
    promise.then(function(deviceOrientation) { // Device Orientation Events are supported

        deviceOrientation.listen(function() {
            var currentOrientation = deviceOrientation.getScreenAdjustedEuler();
            var az = 360 - currentOrientation.alpha;
            var alt = currentOrientation.beta;
            orientation_sensors.innerHTML = "Sat is located at:<br>";
            orientation_sensors.innerHTML += "alt:" + target_alt + "<br>";
            orientation_sensors.innerHTML += "az:" + target_az + "<br>";

            orientation_sensors.innerHTML += "You are now pointing at:<br>";
            orientation_sensors.innerHTML += "alt:" + math.round(alt) + "<br>";
            orientation_sensors.innerHTML += "az:" + math.round(az) + "<br>";

            if (sat_found(alt, az, target_alt, target_az, 20)) {
                unlock_sat(found_banner);
            }
        });

    }).catch(function(errorMessage) { // Device Orientation Events are not supported
        console.log(errorMessage);
        observation_info.innerHTML = "";  
        orientation_sensors.innerHTML = "Couldn't detect orientation sensors. Please try a different browser and/or device.<br> You can scan the following QRcode and open this page on your smartphone instead.<br>";
        var qrcode = new QRCode("qrcode");

        function makeCode () {
	    var elText = document.location.href;
	    qrcode.makeCode(elText);
        }

        makeCode();
    });
}
