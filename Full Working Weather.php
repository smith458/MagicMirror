<!DOCTYPE html>
<html>
<head>

<script src="http://code.jquery.com/jquery-1.7.min.js" ></script>
<script src="http://code.jquery.com/ui/1.7.0/jquery-ui.js" ></script>

<style>
.weekend {
	border: 2px solid Black;
}

.tweet {
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translate(-50%, -50%);
}
</style>

<script>

setTimeout(function(){
   window.location.reload(1);
}, 3600000);

var param = {
  "units"     : "imperial",
  "city"      : "Indianapolis,US",
  "APPID"     : "adba8abb4bb5be6b9ba17ce92de0e2be",
  "version"   : "2.5",
}

function update() {
  setInterval(getWeather(), 5000);
  setTimeout(setInterval(getForecast(), 5000), 2500);
}

function getWeather() {
  $.ajax({
    type: 'GET',
    url: "http://api.openweathermap.org/data/" + param.version + "/weather?q=" +
        param.city + "&units=" + param.units + "&appid=" + param.APPID, 
    dataType: 'json',
    success: function (data) {
      document.getElementById("tempToday").innerHTML = Math.round(data.main.temp);
    }
  })
}

function getForecast() {
  $.ajax({
    type: 'GET',
    url: "http://api.openweathermap.org/data/" + param.version + "/forecast/daily?q=" +
        param.city + "&units=" + param.units + "&cnt=7&appid=" + param.APPID, 
    dataType: 'json',
    success: function (data) {
      for(x=0; x<=6; x++) {
        document.getElementById('tempMin'+x).innerHTML = Math.round(data.list[x].temp.min);
		document.getElementById('tempMax'+x).innerHTML = Math.round(data.list[x].temp.max);
		document.getElementById('status'+x).innerHTML = data.list[x].weather[0].main;
	  }
	  
      switch (new Date().getDay()) {
      	case 0:
      	  document.getElementById("day0").setAttribute("class", "weekend");
      	  document.getElementById("day6").setAttribute("class", "weekend");
      	  break;
      	case 1:
      	  document.getElementById("day5").setAttribute("class", "weekend"); 
          document.getElementById("day6").setAttribute("class", "weekend");
          break;
      	case 2:
      	  document.getElementById("day4").setAttribute("class", "weekend"); 
          document.getElementById("day5").setAttribute("class", "weekend");
          break; 
      	case 3:
      	  document.getElementById("day3").setAttribute("class", "weekend"); 
          document.getElementById("day4").setAttribute("class", "weekend");
          break;
      	case 4:
      	  document.getElementById("day2").setAttribute("class", "weekend"); 
          document.getElementById("day3").setAttribute("class", "weekend");
          break;
      	case 5:
      	  document.getElementById("day1").setAttribute("class", "weekend"); 
          document.getElementById("day2").setAttribute("class", "weekend");
          break;
      	case 6:
      	  document.getElementById("day0").setAttribute("class", "weekend");
          document.getElementById("day1").setAttribute("class", "weekend");
          break;
      }
    }
  })
}

</script>
</head>
<body onload="update()">

<table>
  <tr>
    <td id="tempToday" colspan="2">Temp</td>
    <td>
      <table id = "day0">
        <tr>
          <td id = "tempMax0">Hi</td>
        </tr>
        <tr>
          <td id = "tempMin0">Low</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="3">
      <table id="day1">
        <tr>
          <td id = "tempMax1">Hi</td>
          <td id = "tempMin1">Low</td>
          <td id = "status1">Status</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="3">
      <table id="day2">
        <tr>
          <td id = "tempMax2">Hi</td>
          <td id = "tempMin2">Low</td>
          <td id = "status2">Status</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="3">
      <table id="day3">
        <tr>
          <td id = "tempMax3">Hi</td>
          <td id = "tempMin3">Low</td>
          <td id = "status3">Status</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td  colspan="3">
      <table id="day4">
        <tr>
          <td id = "tempMax4">Hi</td>
          <td id = "tempMin4">Low</td>
          <td id = "status4">Status</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="3">
      <table id="day5">
        <tr>
          <td id = "tempMax5">Hi</td>
          <td id = "tempMin5">Low</td>
          <td id = "status5">Status</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="3">
      <table id="day6">
        <tr>
          <td id = "tempMax6">Hi</td>
          <td id = "tempMin6">Low</td>
          <td id = "status6">Status</td>
        </tr>
      </table>
    </td>
  </tr>
</table>    

<p id="status0">Status</p>

</body>
</html>