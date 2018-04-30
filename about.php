
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
<!--<link rel="stylesheet" href="/css/polaroid.css">-->
<!--<script src="polaroid.js"></script>-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
*{ margin:0; padding:0; }

body {
  background: url(http://martijndevalk.nl/img/bg-tile.jpg) repeat;
}

.polaroids {
  padding: 40px 20px;
}

.polaroids ul li {
  margin:0 10px 10px;
  position: relative;
  display:inline-block;
  list-style: none;
}

.polaroids ul li .pin {
  margin-left:-16px;
  background-image:url(http://martijndevalk.nl/img/pin.png);
  width:34px;
  height:42px;
  position:absolute;
  top:-25px;
  left:50%;
  z-index:6;
}

.polaroids ul a {
  padding: 10px 10px 8px;
  background-color: #fff;
  float: left;
  width: auto;
  text-align: center;
  text-decoration: none;
  color: #686B70;
  font-size: 30px;    
  position: relative;
  -webkit-transform-origin: top center;
  transform-origin: top center;
  -webkit-transform: rotate(0deg);         
  transform: rotate(0deg);
  -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, .3);
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, .3);            
}


.polaroids ul li a.shake {                
  -webkit-animation-duration: 4500ms;
  animation-duration: 4500ms;
  -webkit-animation-name: pola;
  animation-name: pola;
  -webkit-transition-timing-function: cubic-bezier(0.655, 0.000, 0.005, 1.000);
  transition-timing-function: cubic-bezier(0.655, 0.000, 0.005, 1.000); 
}

.polaroids ul a:after { content: attr(title) }

.polaroids ul img {
  display: block;
  width: 262px;
  margin-bottom: 1px;
}

@-webkit-keyframes pola { 
from { -webkit-transform: rotate(0deg) }
10%  { -webkit-transform: rotate(3deg) }
20%  { -webkit-transform: rotate(-3deg)}
30%  { -webkit-transform: rotate(2deg) }
40%  { -webkit-transform: rotate(-2deg) }
50%  { -webkit-transform: rotate(1deg) }
60%  { -webkit-transform: rotate(-1deg) }
70%  { -webkit-transform: rotate(0.5deg) }
80%  { -webkit-transform: rotate(-0.5deg) }
90%  { -webkit-transform: rotate(0.2deg) }
to   { -webkit-transform: rotate(0deg) }
}
@keyframes pola { 
from { -moz-transform: rotate(0deg) }
10%  { -moz-transform: rotate(3deg) }
20%  { -moz-transform: rotate(-3deg)}
30%  { -moz-transform: rotate(2deg) }
40%  { -moz-transform: rotate(-2deg) }
50%  { -moz-transform: rotate(1deg) }
60%  { -moz-transform: rotate(-1deg) }
70%  { -moz-transform: rotate(0.5deg) }
80%  { -moz-transform: rotate(-0.5deg) }
90%  { -moz-transform: rotate(0.2deg) }
to   { -moz-transform: rotate(0deg) }
}

</style>

<body>
	<div class="polaroids w3-center w3-opacity-min">
  <ul>
    <li>
      <a title="Just">
      <img alt="" src="/w3images/bangkok.jpg">
      </a><span class="pin"></span>
    </li>
    <li>
      <a  title="Keep">
      <img alt="" src="/w3images/london2.jpg">
      </a><span class="pin"></span>
    </li>
    <li>
      <a title="Smiling">
      <img alt="" src="/w3images/paragon.jpg">
      </a><span class="pin"></span>
    </li>
  </ul>
</div>
</body>

<script>
	$(".polaroids li a").on("mouseenter", function() {
	var isRunning = $(this).data("isRunning");
	if (!isRunning) {
		$(this).data("isRunning", true);
		var $this = $(this).addClass("shake");
		setTimeout(function() {
			$this.removeClass("shake");
			$this.data("isRunning", false);
		}, 4500);
	}
});

</script>
</html>
