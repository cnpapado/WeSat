            function isVisualPass(sat_id, latitude, longtitude) {
                var result = false;
                $.ajax({
                    data: {cmd:"visual",
                        id: sat_id,
                        obs_lat: latitude,
                        obs_lng: longtitude,
                        obs_alt:"0",
                        days:"1",
                        min:"180"},
                    url: '../handle_api_requests.php',
                    method: 'POST', // or GET
                    async: false,
                    success: function(msg) {
                        var response = JSON.parse(msg);
                        console.log(response);
                        if (response.info.passescount>0) {
                            for (var i=0; i<response.info.passescount; i++) {
                                var start = response.passes[i].startUTC;
                                var end = response.passes[i].endUTC;
                                var now = math.floor(Date.now()/1000);
                                result |= (now-start>0 && end-now>0) || (start-now>0 && start-now<300);  //is live or starts soon (5min)
                            }
                        } else {
                            result = false;
                        }

                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log("Status: " + textStatus + "Error: " + errorThrown);
                        result = false;
                    }

                });

                return result;
            }

            function parseURL() {
                var url = document.location.href;
                var params = url.split("?")[1].split("&");
                var data = {};
                var tmp;
                for (var i = 0, l = params.length; i < l; i++) {
                    tmp = params[i].split('=');
                    data[tmp[0]] = tmp[1];
                }
                return data;
            }

