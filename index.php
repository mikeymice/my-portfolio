<!DOCTYPE html>
<html >
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portfolio</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
::-webkit-scrollbar {
  width: 5px;
}
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
::-webkit-scrollbar-thumb {
  background: #4f46e5; 
}
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
body {
background: #050505;
margin: 0rem;
min-height: 100vh;
font-family: courier, monospace;
color:  white;
cursor: none;
}
#canvas {
	position: absolute;
	display: block;
	top: 0;
	left: 0;
	z-index: -1;
}
html,body{
height:100%;
 min-height:100%; 
}

.heading{
  -webkit-text-fill-color: transparent;
  -webkit-text-stroke-width: 2px;
  -webkit-text-stroke-color: white;
}

@media screen and (min-width: 900px) {
  .heading {
    -webkit-text-stroke-width: 3px;
  }
}

.heading0{
	text-shadow: 
						8px 8px rgb(220, 38, 38),
						20px 20px #000;
}

.heading1{
	text-shadow: 
						8px 8px #f81f8f,
						20px 20px #000000;
}

.heading2{
	text-shadow: 
						8px 8px #9333ea,
						20px 20px #000000;
}

.heading3{
	text-shadow: 
						8px 8px #4f46e5,
						20px 20px #000000;
}

.heading4{
	text-shadow: 
						8px 8px #0891b2,
						20px 20px #000000;
}


.slide::before {  
  transform: scaleX(0);
  transform-origin: bottom right;
}

.slide:hover::before {
  transform: scaleX(1);
  transform-origin: bottom left;
}

.slide::before {
  content: " ";
  display: block;
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
  inset: 0 0 0 0;
  background: rgba(255,255,255,0.3);
  z-index: -1;
  transition: transform .3s ease;
}

*{
  transition-duration: 300ms !important;
}

 {
  display: inline-block;
  font-family: 'Russo One', sans-serif;
  font-weight: 400;
  color: #fff;
  font-size: 36px;
  text-transform: uppercase;
  pointer-event: none;
  transition: transform 0.1s linear;
}

.cursor {
  pointer-events: none;
  position: fixed;
  padding: 0.3rem;
  background-color: #fff;
  border-radius: 50%;
  mix-blend-mode: difference;
  transition: transform 1s ease;
  z-index: 99;
}

.bigguy {
  transform:translate(-50%, -50%) scale(8);
  opacity: 1;
}


</style>

<script>

let currentState = 0;

let allColors = ["rose-600", "pink-600", "purple-600", "indigo-600", "cyan-600"];

function giveHeadingColors(id) {
	let collection = document.getElementsByClassName("heading");

	for (var i = 0; i < collection.length; i++) {

		collection[i].classList.remove("heading0");
		collection[i].classList.remove("heading1");
		collection[i].classList.remove("heading2");
		collection[i].classList.remove("heading3");
		collection[i].classList.remove("heading4");
	
		addHeading(collection[i], id);
	}
}

function addHeading(element, id) {
	//setTimeout(() => {
		element.classList.add(id);
	//}, 0);
}

function removeColors() {

		for (var i = 0; i < allColors.length; i++) {

			document.getElementById("wrapper").classList.remove("border-"+allColors[i]+"/50");
			document.getElementById("wrapper").classList.remove("hover:border-"+allColors[i]+"/80");

			document.getElementById("nav").classList.remove("ring-"+allColors[i]+"/50");
			document.getElementById("nav").classList.remove("hover:ring-"+allColors[i]+"/80");

			document.getElementById("navButton").classList.remove("ring-"+allColors[i]+"/50");
			document.getElementById("navButton").classList.remove("hover:ring-"+allColors[i]+"/80");

			document.getElementById("content").classList.remove("ring-"+allColors[i]+"/50");
			document.getElementById("content").classList.remove("hover:ring-"+allColors[i]+"/80");
		}

}

function giveSkillColors(id) {
	let collection = document.getElementsByClassName("skill");

	for (var i = 0; i < collection.length; i++) {

		for (var j = 0; j < allColors.length; j++) {
		collection[i].classList.remove("bg-"+allColors[j]+"/80");
		}
		
		collection[i].classList.add("bg-"+id+"/80");
	}
}

function giveFormButtonColors(id) {

		button = document.getElementById("formButton");

		for (var j = 0; j < allColors.length; j++) {
		button.classList.remove("bg-"+allColors[j]);
		}

		button.classList.add("bg-"+id);
	
}

function changeColors(id) {
			
			removeColors();

			document.getElementById("wrapper").classList.add("border-"+allColors[id]+"/50");
			document.getElementById("wrapper").classList.add("hover:border-"+allColors[id]+"/80");

			document.getElementById("nav").classList.add("ring-"+allColors[id]+"/50");
			document.getElementById("nav").classList.add("hover:ring-"+allColors[id]+"/80");

			document.getElementById("navButton").classList.add("ring-"+allColors[id]+"/50");
			document.getElementById("navButton").classList.add("hover:ring-"+allColors[id]+"/80");

			document.getElementById("content").classList.add("ring-"+allColors[id]+"/50");
			document.getElementById("content").classList.add("hover:ring-"+allColors[id]+"/80");

			giveHeadingColors("heading"+id);

			giveSkillColors(allColors[id]);

			giveFormButtonColors(allColors[id]);

	}	
	function revertColors(id) {


		if(currentState != id){

		changeColors(currentState);

		//setTimeout(() => {
			giveHeadingColors("heading"+currentState);
		//}, 0);

		}
	}

	function contactForm() {
		var form = document.querySelector('form')
		if(form.reportValidity() == true){
			var name = document.getElementById("contactName").value;
			var email = document.getElementById("contactEmail").value;
			var subject = document.getElementById("contactSubject").value;
			var message = document.getElementById("contactMessage").value;

			var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          	var msg = document.getElementById("formMessage");

            msg.classList.remove("h-0");
            msg.classList.add("h-7");

            msg.innerHTML = this.responseText;

            document.getElementById("contactName").value = "";
            document.getElementById("contactEmail").value= "";
						document.getElementById("contactSubject").value= "";
						document.getElementById("contactMessage").value= "";

            setTimeout(() => {
            	msg.classList.add("h-0");
            	msg.classList.remove("h-7");
            }, 2000);
          }
      }

      xmlhttp.open("GET", "form.php?name="+name+"&mail="+email+"&subject="+subject+"&message="+message+"", true);
      xmlhttp.send(); 
		}
	}

	function openNavMobile() {
		document.getElementById("nav").classList.remove("max-h-0");
		document.getElementById("nav").classList.add("max-h-[15rem]");
	}

	function closeNavMobile(state) {
		document.getElementById("nav").classList.remove("max-h-[15rem]");
		document.getElementById("nav").classList.add("max-h-0");

		document.getElementById("navButton").innerHTML = state;
	}

	function overMouse() {
		document.body.style.cursor = "auto";
		document.getElementById("cursor").classList.add("bigguy");
	}
	function outMouse() {
		document.body.style.cursor = "none";
		document.getElementById("cursor").classList.remove("bigguy");
	}

</script>



<body onload="giveHeadingColors('heading0');">

	<div class="cursor" id="cursor"></div>

	<div class="xl:p-10 md:p-5 w-full h-full flex">

		<div class="w-full h-full flex md:flex-row flex-col xl:gap-10 md:gap-4 xl:p-10 p-6 border-[4px] border-double border-rose-600/50 hover:border-rose-600/80 transition-all" id="wrapper">

			<button id="navButton" onclick="openNavMobile()" class="md:hidden block w-full text-center ring-2 ring-rose-600/50 hover:ring-rose-600/80 transition-all text-2xl py-2"> 
				Home 
			</button>
			
			<div class="xl:w-[300px] md:w-[230px] w-full flex flex-col justify-center items-center md:ring-2 ring-rose-600/50 hover:ring-rose-600/80 transition-all md:relative absolute left-[0px] right-[0px] md:max-h-[100rem] max-h-0 overflow-hidden md:bg-transparent bg-black z-10" id="nav">

				<a href="#home" onmouseover="changeColors(0);" onmouseout="revertColors(0);" onclick="changeColors(0);currentState=0;closeNavMobile('Home');" class="w-full md:p-4 p-2 relative slide transition-all xl:text-3xl text-2xl text-center text-white md:mb-10">
					Home
				</a>
				<a href="#about" onmouseover="changeColors(1);" onmouseout="revertColors(1);" onclick="changeColors(1);currentState=1;closeNavMobile('About');" class="w-full md:p-4 p-2 relative slide transition-all xl:text-3xl text-2xl text-center text-white">
					About
				</a>
				<a href="#skills" onmouseover="changeColors(2);" onmouseout="revertColors(2);" onclick="changeColors(2);currentState=2;closeNavMobile('Skills');" class="w-full md:p-4 p-2 relative slide transition-all xl:text-3xl text-2xl text-center text-white">
					Skills
				</a>
				<a href="#projects" onmouseover="changeColors(3);" onmouseout="revertColors(3);" onclick="changeColors(3);currentState=3;closeNavMobile('Projects');" class="w-full md:p-4 p-2 relative slide transition-all xl:text-3xl text-2xl text-center text-white">
					Projects
				</a>
				<a href="#contact" onmouseover="changeColors(4);" onmouseout="revertColors(4);" onclick="changeColors(4);currentState=4;closeNavMobile('Contact');" class="w-full md:p-4 p-2 relative slide transition-all xl:text-3xl text-2xl text-center text-white">
					Contact
				</a>

				

			</div>

			<div id="content" class="flex-1 overflow-hidden scroll-smooth ring-2 ring-rose-600/50 hover:ring-rose-600/80 transition-all h-full">
				

				<div class="w-full h-full flex flex-col justify-center items-center md:p-10 p-4" id="home">
					<div class="border xl:p-20 lg:p-16 md:p-10 p-2">
					<h1 class="heading xl:text-7xl lg:text-6xl md:text-5xl text-3xl p-5 text-center tracking-[0.1em] hover:tracking-[0.3em] transition-all ease-in-out">Wassup,</h1>
					<hr>
					<hr class="mt-2 mb-2">
					<h2 class="text-xl text-center">I'm <a href="#" class="lg:text-3xl md:text-2xl px-2 tracking-[0.1em] hover:tracking-[0.3em] transition-all ease-in-out relative slide">Ahmed</a><br class="xl:hidden md:block"> and i build web stuff!</h2>
					<hr class="mt-2">
					<hr class="mt-2 mb-2">
					<div class="flex gap-6 justify-center mt-2">
						<a class="p-4 w-1/2 transition-all ease-in-out text-center relative slide" href="#about" onmouseover="changeColors(1);" onmouseout="revertColors(1);" onclick="changeColors(1);currentState=1;closeNavMobile('About');">More about me</a>
						<a class="p-4 w-1/2 transition-all ease-in-out text-center relative slide" href="#projects" onmouseover="changeColors(3);" onmouseout="revertColors(3);" onclick="changeColors(3);currentState=3;closeNavMobile('Projects');">What ive done</a>
					</div>
					</div>
				</div>

				<div class="w-full h-full flex flex-col justify-center items-center md:p-10 p-4" id="about">
					<div class="max-w-4xl border xl:p-20 lg:p-16 md:p-10 p-4">

					<h1 class="heading xl:text-4xl lg:text-3xl text-2xl text-2xl py-5 tracking-[0.1em] hover:tracking-[0.3em] transition-all ease-in-out">About me,</h1>
					<hr>
					<hr class="mt-2 mb-4">
					<h2 class="xl:text-xl lg:text-lg md:text-base group transition-all">Hi! My name is <span class="transition-all xl:group-hover:text-2xl lg:group-hover:text-xl md:group-hover:text-lg">Ahmed</span>, I'm from <span class="transition-all xl:group-hover:text-2xl lg:group-hover:text-xl md:group-hover:text-lg">Pakistan</span> and I love making <span class="transition-all xl:group-hover:text-2xl lg:group-hover:text-xl md:group-hover:text-lg">online habitats visible to browsers.</span>
					<br>What intrigues me most is <span class="transition-all xl:group-hover:text-2xl lg:group-hover:text-xl md:group-hover:text-lg">development of web</span>, but i can handle some <span class="transition-all xl:group-hover:text-2xl lg:group-hover:text-xl md:group-hover:text-lg">designing</span> too.
					<br>and yes I am a <span class="transition-all xl:group-hover:text-2xl lg:group-hover:text-xl md:group-hover:text-lg">student too, a college one that is.</span> So, turns out im always up for some <span class="transition-all xl:group-hover:text-2xl lg:group-hover:text-xl md:group-hover:text-lg">part time work!</span></h2>
					<br>
					<a class="xl:text-2xl lg:text-xl text-lg py-1 transition-all underline decoration-white/0 hover:decoration-cyan-500 ease-in-out text-center relative slide" href="#contact" onmouseover="changeColors(4);" onmouseout="revertColors(4);" onclick="changeColors(4);currentState=4;closeNavMobile('Contact');">Lets make something special!</a>
					</div>

				</div>

				<div class="w-full h-full flex flex-col justify-center items-center md:p-10 p-4" id="skills">
					<div class="border xl:p-20 lg:p-16 md:p-10 p-4">

					<h1 class="heading xl:text-4xl lg:text-3xl text-2xl py-5 tracking-[0.1em] hover:tracking-[0.27em] transition-all ease-in-out">What can i do?</h1>
					<hr>
					<hr class="mt-2 mb-4">
					<div class="flex flex-col gap-2 xl:w-[30rem] lg:w-[27rem] md:w-[20rem]">
						<div class="w-full flex p-2 bg-[#333] group"><div class="skill ease-in-out duration-500 w-[40px] group-hover:w-[90%] bg-purple-600/80 group-hover:bg-purple-600">PHP</div></div>
						<div class="w-full flex p-2 bg-[#333] group"><div class="skill ease-in-out duration-500 w-[90px] group-hover:w-[80%] bg-purple-600/80 group-hover:bg-purple-600">HTML, CSS</div></div>
						<div class="w-full flex p-2 bg-[#333] group"><div class="skill ease-in-out duration-500 w-[100px] group-hover:w-[70%] bg-purple-600/80 group-hover:bg-purple-600">Javascript</div></div>
						<div class="w-full flex p-2 bg-[#333] group"><div class="skill ease-in-out duration-500 w-[120px] group-hover:w-[75%] bg-purple-600/80 group-hover:bg-purple-600">Tailwind CSS</div></div>
						</div>
					</div>

				</div>

				<div class="w-full h-full flex flex-col justify-center items-center xl:p-10 md:p-5 p-2" id="projects">
					<div class="border xl:p-20 lg:p-16 md:p-10 p-2 overflow-y-scroll overflow-x-hidden">

					<h1 class="heading xl:text-4xl lg:text-3xl text-2xl py-5 tracking-[0.1em] hover:tracking-[0.3em] transition-all ease-in-out">My Work</h1>
					<hr>
					<hr class="mt-2 mb-4">
					<h3 class="xl:text-xl lg:text-lg md:text-base relative slide">Well, i have done quite a few local projects which aren't live at the point, I would like to divert the attentions at this masterpiece of an ecosystem. 😜</h3>
					<hr class="mt-4">
					<hr class="mt-2 mb-4">
					<a href="https://www.shinobi-alliance.com" target="_blank"><img src="shinobi-alliance.webp" class="w-full opacity-90 hover:rotate-6 ease-in-out  hover:scale-110" /></a>
					<hr class="mt-4">
					<hr class="mt-2 mb-4">
					<h1 style="-webkit-text-stroke-width: 2px;" class="heading xl:text-2xl md:text-lg tracking-[0.1em] hover:tracking-[0.3em] transition-all ease-in-out">What is "The Shinobi Alliance"?</h1>
					<h3 class="xl:text-xl lg:text-lg md:text-base mt-4 relative slide">"The Shinobi Alliance" is a multi purpose anime based platform started with the aim of providing its audience top tier content on the basis of its blog system. The platform gathers multiple content creators to write for the website allowing their people to visit and read the respective posts. The website is monetized resulting in share of each content creator so none is in loss. There are some future proof features on the way such as daily games to hook the viewers to the url.</h3>

				</div>
				
			</div>

			<div class="w-full h-full flex flex-col justify-center items-center xl:p-10 p-5" id="contact">
					<div class="border xl:p-20 lg:p-16 md:p-10 p-4 md:w-auto w-full">

					<h1 class="heading xl:text-4xl lg:text-3xl text-2xl py-5 tracking-[0.1em] hover:tracking-[0.3em] transition-all ease-in-out">Hit me up!</h1>
					<hr>
					<hr class="mt-2 mb-4">
					
					<form class="w-full p-2 flex flex-col text-black xl:w-[40rem] lg:w-[30rem] md:[25rem] w-full opacity-90">

						<div class="flex md:flex-row flex-col gap-2">

							<div class="md:w-1/2 w-full p-2 group flex flex-col relative slide"><h3 class="text-white group-hover:underline decoration-cyan-600">Your Name:</h3><input id="contactName" type="text" class="w-full p-2" required /></div>

							<div class="md:w-1/2 w-full p-2 group flex flex-col relative slide"><h3 class="text-white group-hover:underline decoration-cyan-600">Your Mail:</h3><input id="contactEmail" type="email" class="w-full p-2" required /></div>

						</div>

						<div class="flex flex-row gap-2">

							<div class="w-full p-2 group flex flex-col relative slide"><h3 class="text-white group-hover:underline decoration-cyan-600">Subject:</h3><input id="contactSubject" type="text" class="w-full p-2" required /></div>

						</div>

						<div class="flex flex-row gap-2">

							<div class="w-full p-2 group flex flex-col relative slide"><h3 class="text-white group-hover:underline decoration-cyan-600">What's in your mind?</h3><textarea id="contactMessage" class="w-full p-2" required ></textarea></div>

						</div>

						<div class="flex flex-col gap-2">

							<div class="w-full p-2 group flex flex-col relative slide">
								<button id="formButton" type="button" class="w-full p-2 text-lg bg-cyan-600 hover:bg-cyan-500 text-white hover:underline" onclick="contactForm();">Submit</button>
							</div>

							<h3 class="w-full px-2 h-0 overflow-hidden text-lg relative slide transition-all" id="formMessage">Some message here!</h3>


						</div>


					</form>

				</div>
				
			</div>


		</div>

	</div>



	<canvas id="canvas"></canvas>

	<script>

		var allHoverElements = document.querySelectorAll(".heading, a, input, textarea, button");

		for (var i = 0; i < allHoverElements.length; i++) {
			allHoverElements[i].addEventListener("mouseover", overMouse);
			allHoverElements[i].addEventListener("mouseout", outMouse);
		}


	let resizeReset = function() {
		w = canvasBody.width = window.innerWidth;
		h = canvasBody.height = window.innerHeight;
	}

	const opts = { 
		particleColor: "rgb(200,200,200)",
		lineColor: "rgb(200,200,200)",
		particleAmount: (window.innerWidth / 100),
		defaultSpeed: 1,
		variantSpeed: 1,
		defaultRadius: 2,
		variantRadius: 2,
		linkRadius: 200,
	};

	window.addEventListener("resize", function(){
		deBouncer();
	});

	let deBouncer = function() {
	    clearTimeout(tid);
	    tid = setTimeout(function() {
	        resizeReset();
	    }, delay);
	};

	let checkDistance = function(x1, y1, x2, y2){ 
		return Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
	};

	var mouse = {
      x: undefined,
      y: undefined
    };

    window.addEventListener('mousemove', function(event){
      mouse.x = event.x;
      mouse.y = event.y;
    });

	let linkPoints = function(point1, hubs){ 
		for (let i = 0; i < hubs.length; i++) {
			let distance = checkDistance(point1.x, point1.y, hubs[i].x, hubs[i].y);

			let distanceMouse = checkDistance(point1.x, point1.y, mouse.x, mouse.y);

			let opacity = 1 - distance / opts.linkRadius;
			let opacityMouse = 1 - distanceMouse / opts.linkRadius;

			if (opacity > 0) { 
				drawArea.lineWidth = 0.5;
				drawArea.strokeStyle = `rgba(${rgb[0]}, ${rgb[1]}, ${rgb[2]}, ${opacity})`;
				drawArea.beginPath();
				drawArea.moveTo(point1.x, point1.y);
				drawArea.lineTo(hubs[i].x, hubs[i].y);
				drawArea.closePath();
				drawArea.stroke();
			}

			if (opacityMouse > 0) { 
				drawArea.lineWidth = 0.5;
				drawArea.strokeStyle = `rgba(${rgb[0]}, ${rgb[1]}, ${rgb[2]}, ${opacityMouse})`;
				drawArea.beginPath();
				drawArea.moveTo(point1.x, point1.y);
				drawArea.lineTo(mouse.x + 5, mouse.y + 5);
				drawArea.closePath();
				drawArea.stroke();
			}
		}
	}

	Particle = function(xPos, yPos){ 
		this.x = Math.random() * w; 
		this.y = Math.random() * h;
		this.speed = opts.defaultSpeed + Math.random() * opts.variantSpeed; 
		this.directionAngle = Math.floor(Math.random() * 360); 
		this.color = opts.particleColor;
		this.radius = opts.defaultRadius + Math.random() * opts. variantRadius; 
		this.vector = {
			x: Math.cos(this.directionAngle) * this.speed,
			y: Math.sin(this.directionAngle) * this.speed
		};
		this.update = function(){ 
			this.border(); 
			this.x += this.vector.x; 
			this.y += this.vector.y; 
		};
		this.border = function(){ 
			if (this.x >= w || this.x <= 0) { 
				this.vector.x *= -1;
			}
			if (this.y >= h || this.y <= 0) {
				this.vector.y *= -1;
			}
			if (this.x > w) this.x = w;
			if (this.y > h) this.y = h;
			if (this.x < 0) this.x = 0;
			if (this.y < 0) this.y = 0;	
		};
		this.draw = function(){ 
			drawArea.beginPath();
			drawArea.arc(this.x, this.y, this.radius, 0, Math.PI*2);
			drawArea.closePath();
			drawArea.fillStyle = this.color;
			drawArea.fill();
		};
	};

	ParticleMouse = function(xPos, yPos){ 
		this.x = Math.random() * w; 
		this.y = Math.random() * h;
		this.speed = opts.defaultSpeed + Math.random() * opts.variantSpeed; 
		this.directionAngle = Math.floor(Math.random() * 360); 
		this.color = opts.particleColor;
		this.radius = opts.defaultRadius + Math.random() * opts. variantRadius; 
		this.vector = {
			x: Math.cos(this.directionAngle) * this.speed,
			y: Math.sin(this.directionAngle) * this.speed
		};
		this.update = function(){ 
			this.border(); 
			this.x += this.vector.x; 
			this.y += this.vector.y; 

			if(mouse.x - this.x < 200 && mouse.x - this.x > -200 && mouse.y - this.y < 200 && mouse.y - this.y > -200 && this.radius < 6){
	          	this.radius += 0.1;
	        }
	        else if(this.radius > 2){
	          this.radius -= 0.1;
	        }
		};
		this.border = function(){ 
			if (this.x >= w || this.x <= 0) { 
				this.vector.x *= -1;
			}
			if (this.y >= h || this.y <= 0) {
				this.vector.y *= -1;
			}
			if (this.x > w) this.x = w;
			if (this.y > h) this.y = h;
			if (this.x < 0) this.x = 0;
			if (this.y < 0) this.y = 0;	
		};
		this.draw = function(){ 
			drawArea.beginPath();
			drawArea.arc(this.x, this.y, this.radius, 0, Math.PI*2);
			drawArea.closePath();
			drawArea.fillStyle = this.color;
			drawArea.fill();
		};
	};

	function setup(){ 
		particles = [];
		resizeReset();
		for (let i = 0; i < opts.particleAmount; i++){
			particles.push( new ParticleMouse() );
		}

		window.requestAnimationFrame(loop);
	}

	function loop(){ 
		window.requestAnimationFrame(loop);
		drawArea.clearRect(0,0,w,h);
		for (let i = 0; i < particles.length; i++){
			particles[i].update();
			particles[i].draw();
		}
		for (let i = 0; i < particles.length; i++){
			linkPoints(particles[i], particles);
		}
	}

	const canvasBody = document.getElementById("canvas"),
	drawArea = canvasBody.getContext("2d");
	let delay = 200, tid,
	rgb = opts.lineColor.match(/\d+/g);
	resizeReset();
	setup();



(function () {

      const link = document.querySelectorAll('.hover-this');
      const cursor = document.querySelector('.cursor');

      const animateit = function (e) {
            const span = this.querySelector('span');
            const { offsetX: x, offsetY: y } = e,
            { offsetWidth: width, offsetHeight: height } = this,

            move = 25,
            xMove = x / width * (move * 2) - move,
            yMove = y / height * (move * 2) - move;

            span.style.transform = `translate(${xMove}px, ${yMove}px)`;

            if (e.type === 'mouseleave') span.style.transform = '';
      };

      const editCursor = e => {
            const { clientX: x, clientY: y } = e;
            cursor.style.left = x + 'px';
            cursor.style.top = y + 'px';
      };

      link.forEach(b => b.addEventListener('mousemove', animateit));
      link.forEach(b => b.addEventListener('mouseleave', animateit));
      window.addEventListener('mousemove', editCursor);

})();


	
	</script>

</body>
</html>