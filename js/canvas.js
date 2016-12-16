$(document).ready(function(){

	// GLOBAL VARIABLES
	var word = "HOLIDAY"; // Ideally, I'd change this to an array or read it from a PHP backend, but hardcoding for now
	var missCount; // Used to keep track of how much of the snowman to draw
	var hitCount; // Used to keep track of how many letters were guessed successfully
	var letters; // Will be initialized in the initGame function.  UI will bind to changes to this

	//---------------------------------------------------------
	// INITIALIZATION FUNCTION
	function initGame() {
		// Called each time a new game is started to reset the  values and clear the canvas
		missCount = 0;
		hitCount = 0;
		letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$('#canvas').clearCanvas();
		$('#letters').text(letters);
		drawLinesForLetters();
		$('#guess').focus();
		$('#submit').hide();
		$('#userGuess').show();
	}

	// Call initGame globally for the first game
	initGame();

	//---------------------------------------------------------
	// EVENT HANDLERS

	/**
	 * keyup handler to enable to disable the Submit button based on if a user has entered in a guess
	 */
	$('#guess').keyup(function() {
		var char = $('#guess').val().toUpperCase();
		if (char =="") {
			$('#submit').hide();
		} else {
			var indexOfChar = letters.indexOf(char);
			if (indexOfChar == -1) {
				$('#submit').hide();
			} else {
				$('#submit').show();
			}
		}
	});

	/**
	 * click handler to handle the submit button for a guess
	 */
	$('#submit').click(function() {
		// Get the character entered
		var char = $('#guess').val().toUpperCase();
		// Search for the character in the word
		var indexOfChar = word.indexOf(char);
		if (indexOfChar == -1) {
			// Letter not found, count as a miss
			miss();
		} else {
			// Letter found, count as a hit
			hit(indexOfChar, char);
		}
		// Remove it from the list of remaining letters
		removeChar(char);

		// Reset the user input
		$('#guess').val("");
		$('#guess').focus();
		$('#submit').hide();
	});

	/**
	 * click handler to reset the board for a new game
	 */
	$('#start').click(function(){
		initGame();
	}); //end start

	//---------------------------------------------------------
	// UTILITY FUNCTIONS

	function removeChar(char) {
		var index = letters.indexOf(char);
		var newletters = letters.slice(0, index) + letters.slice(index+1, 26);
		letters = newletters;
		$('#letters').text(letters);
	}

	function hit(index, char) {
		hitCount++;
		var xval = 69 + (60*index);
		$('canvas').drawText({
	  		fillStyle: '#FFF',
			strokeStyle: '#888',
			strokeWidth: 2,
			x: xval, y: 350,
			fontSize: 48,
			fontFamily: 'Verdana, sans-serif',
			text: char,
			layer: true
		});

		if (hitCount == word.length) {
			drawBottom();
			drawMiddle();
			drawLeftArm();
			drawRightArm();
			drawHead();
			drawResults("WINNER");
			$('#userGuess').hide();
		}
	}

	function miss() {
		missCount++;
		switch (missCount) {
			case 1:
					drawBottom();
					break;
			case 2:
					drawMiddle();
					break;
			case 3:
					drawLeftArm();
					break;
			case 4:
					drawRightArm();
					break;
			case 5:
					drawHead();
					// Lost
					drawResults("TRY AGAIN");
					$('#userGuess').hide();
					break;
		}
	}

	function drawBottom() {
		// Bottom
		$('canvas').drawEllipse({
		 	strokeStyle: '#888',
		 	strokeWidth: 3,
		 	fillStyle: '#FFF',
	  		x: 250, y: 250,
	  		width: 140, height: 120,
			layer: true
		});
	} // End drawBottom

	function drawMiddle() {
		// Middle
		$('canvas').drawEllipse({
		 	strokeStyle: '#888',
		 	strokeWidth: 3,
		 	fillStyle: '#FFF',
	  		x: 250, y: 180,
	  		width: 105, height: 75,
			layer: true
		})
		// Buttons
		.drawArc({
		 	strokeStyle: '#888',
			fillStyle: '#000',
			x: 243, y: 165,
			radius: 3,
			layer: true
		}) //end draw arc
		.drawArc({
		 	strokeStyle: '#888',
			fillStyle: '#000',
			x: 240, y: 180,
			radius: 3,
			layer: true
		}) //end draw arc
		.drawArc({
		 	strokeStyle: '#888',
		 	fillStyle: '#000',
			x: 243,	y: 195,
			radius: 3,
			layer: true
		}); //end draw arc
	} // End drawMiddle

	function drawHead() {
		// Head
		$('canvas').drawEllipse({
		 	strokeStyle: '#888',
		 	strokeWidth: 3,
		 	fillStyle: '#FFF',
	  		x: 250, y: 115,
	  		width: 70, height: 65,
			layer: true
		})
		.drawArc({
		 	strokeStyle: '#888',
			fillStyle: '#000',
			strokeWidth: 2,
	  		x: 238,	y: 105,
	  		radius: 3,
			layer: true
		})
		.drawArc({
		 	strokeStyle: '#888',
			fillStyle: '#000',
		 	strokeWidth: 2,
	  		x: 255,	y: 105,
	  		radius: 3,
			layer: true
		})
		.drawLine({
		  strokeStyle: '#888',
		  fillStyle: '#FFA500',
		  strokeWidth: 1,
		  x1: 246, y1: 115,
		  x2: 210, y2: 135,
		  x3: 250, y3: 120,
		  layer: true,
		  closed: true
		});
	} // End drawHead

	function drawLeftArm() {
		// Left Arm
		$('canvas').drawLine({
		  strokeStyle: '#654321',
		  strokeWidth: 3,
		  x1: 199, y1: 170,
		  x2: 185, y2: 172,
		  x3: 175, y3: 180,
		  x4: 150, y4: 180,
		  x5: 175, y5: 180,
		  x6: 170, y6: 195,
		  layer: true
		});
	} // End drawLeftArm

	function drawRightArm() {
		// Right Arm
		$('canvas').drawLine({
		  strokeStyle: '#654321',
		  strokeWidth: 3,
		  x1: 301, y1: 170,
		  x2: 325, y2: 180,
		  x3: 350, y3: 180,
		  x4: 325, y4: 180,
		  x5: 330, y5: 195,
		  layer: true
		});
	} // End drawRightArm

	function drawLinesForLetters() {
		var startX = 50;
		var lineLength = 40;
		var lineGap = 20;

		for (var i=0; i<word.length; i++) {
			$('canvas').drawLine({
				strokeStyle: '#FFF',
				strokeWidth: 3,
				x1: startX, y1: 380,
				x2: startX+lineLength, y2: 380,
				layer: true
			});
			startX += lineLength + lineGap;
		}
	} // End drawLinesForLetters

	function drawResults(results) {
		$('canvas').drawText({
			name: "result",
			fillStyle: '#FFF',
			strokeStyle: '#888',
			strokeWidth: 2,
			x: 250, y: 30,
			fontSize: 50,
			fontFamily: 'Verdana, sans-serif',
			text: results,
			layer: true
		});

		$('canvas').animateLayer('result', {
			fontSize: 80
		}, 'slow', function(layer) {
			// Callback function
				$(this).animateLayer(layer, {
					fontSize: 50
				}, 'slow', 'swing');
		});
	}


}); //end ready
