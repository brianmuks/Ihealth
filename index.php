/*
 * Copyright (c) 2012, Intel Corporation.
 *
 * This program is licensed under the terms and conditions of the 
 * Apache License, version 2.0.  The full text of the Apache License is at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 */

/**
 * globals
 */

var getMessage,
    license_init,
    GameSound,
    window,
    document;

(function () {
    "use strict";

    /**
     * FlashCards() class contains all the variables and functions needed to run the flash card game 
     *  @constructor
     */
    function FlashCards() {
  this.cardDecks = {
	    YELLOWDECK: "y",
	    REDDECK: "r",
	    GREENDECK: "g",
	    BLUEDECK: "b"
	};
	
	this.number_of_answers = 3; //changed
	this.cardCount = 0; //current game wrong answers 
	this.rightCount = 0; //current game right answers 
	this.cardSet = this.cardDecks.BLUEDECK; //name of card set and file prefix
	this.endGameFlag = false; //endGame flag
	this.deckAnswer = []; //the array of answers for this deck
	this.deckQuestion = []; //the array of questions for this deck
        
    };

    /**
     *  FlashCards.helpClicked() plays audio and makes the help card dialog visible when help icon is clicked 
     *  @private
     */
    FlashCards.prototype.helpClicked = function () {
	this.buttonClickSound.play();
	
    	document.getElementById("help-dialog").style.display = "inline";
    };

    /* 
     * FlashCards.helpCloseClicked() plays audio and makes the help card dialog invisible when help X icon is clicked 
     * @private
     */
    FlashCards.prototype.helpCloseClicked = function () {
	this.buttonClickSound.play();
    	document.getElementById("help-dialog").style.display = "none";
    };

    /** 
     * FlashCards.hideAnswer() will hide the wrong and right buttons and answer text reseting the cursor style
     * @private
     */
    FlashCards.prototype.hideAnswer = function () {
	document.getElementById("answer").style.display = "inline";
	
    };

    /** 
     * FlashCards.clear() will reset game counters, hide stars, replay button, answers, and reset the score
     * @private
     */
    FlashCards.prototype.clear = function () {
	var parent = document.getElementById("game-screen"),
	    count,
	    children;

	//reset properties
	this.endGameFlag = false;
	this.rightCount = 0;
	this.cardCount = 0;

	//remove all stars from dom
	children = document.getElementsByClassName("star");
	for (count = children.length - 1; count >= 0; count = count - 1) {
	    parent.removeChild(document.getElementsByClassName("star")[count]);
	}

	document.getElementById("score-number").innerHTML = "0";
	document.getElementById("replay-button").style.display = "none";
	document.getElementById("endgame-prompt").style.display = "none";
	this.hideAnswer();
    };

    /**
     *  FlashCards.navPaneClose()  closes nav pane and plays nav pane sound effect
     * @private
     */
    FlashCards.prototype.navPaneClose = function () {
	this.swooshSound.play();
	if (document.getElementsByClassName("animation-open")[0]) {
	    document.getElementsByClassName("animation-open")[0].setAttribute("class", "animation-close");
	} 
    };
    
    /**
     *  FlashCards.navPaneToggle() opens or closes nav pane and plays nav pane sound effect
     * @private
     */
    FlashCards.prototype.navPaneToggle = function () {
	this.swooshSound.play();
	if (document.getElementsByClassName("animation-open")[0]) {
	    document.getElementsByClassName("animation-open")[0].setAttribute("class", "animation-close");
	} else {
	    document.getElementsByClassName("animation-close")[0].setAttribute("class", "animation-open");
	}
    };

    /**
     *  FlashCards.navPaneClicked() plays button click audio, opens or closes nav pane and plays nav pane sound effect
     * @private
     */
    FlashCards.prototype.navPaneClicked = function () {
	this.buttonClickSound.play();
	this.navPaneToggle();
    };

    /**
     *  FlashCards.getShapeDeckAnswers() will call getMessage to get the localized answers for this deck 
     *  @private
     */
    FlashCards.prototype.getShapeDeckAnswers = function () {
	this.shapeAnswer = [];
	this.shapeAnswer[0] = getMessage("ra0");//a starts
	this.shapeAnswer[1] = getMessage("ra1");
	this.shapeAnswer[2] = getMessage("ra2");
	this.shapeAnswer[3] = getMessage("ra3");
	this.shapeAnswer[4] = getMessage("ra4");
	this.shapeAnswer[5] = getMessage("ra5");
	this.shapeAnswer[6] = getMessage("ra6");
	this.shapeAnswer[7] = getMessage("ra7");
	this.shapeAnswer[8] = getMessage("ra8");
	this.shapeAnswer[9] = getMessage("ra9");
	this.shapeAnswer[10] = getMessage("ra10");
	this.shapeAnswer[11] = getMessage("ra11");
	this.shapeAnswer[12] = getMessage("ra12");
	this.shapeAnswer[13] = getMessage("ra13");
	this.shapeAnswer[14] = getMessage("ra14");
	this.shapeAnswer[15] = getMessage("ra15");
	this.shapeAnswer[16] = getMessage("ra16");
	this.shapeAnswer[17] = getMessage("ra17");
	this.shapeAnswer[18] = getMessage("ra18");
	this.shapeAnswer[19] = getMessage("ra19")
	this.shapeAnswer[20] = getMessage("rb0");//b starts
	this.shapeAnswer[21] = getMessage("rb1");
	this.shapeAnswer[22] = getMessage("rb2");
	this.shapeAnswer[23] = getMessage("rb3");
	this.shapeAnswer[24] = getMessage("rb4");
	this.shapeAnswer[25] = getMessage("rb5");
	this.shapeAnswer[26] = getMessage("rb6");
	this.shapeAnswer[27] = getMessage("rb7");
	this.shapeAnswer[28] = getMessage("rb8");
	this.shapeAnswer[29] = getMessage("rb9");
	this.shapeAnswer[30] = getMessage("rb10");
	this.shapeAnswer[31] = getMessage("rb11");
	this.shapeAnswer[32] = getMessage("rb12");
	this.shapeAnswer[33] = getMessage("rb13");
	this.shapeAnswer[33] = getMessage("rb14");
	this.shapeAnswer[35] = getMessage("rb15");
	this.shapeAnswer[36] = getMessage("rb16");
	this.shapeAnswer[37] = getMessage("rb17");
	this.shapeAnswer[38] = getMessage("rb18");
	this.shapeAnswer[39] = getMessage("rb19");
	this.shapeAnswer[40] = getMessage("rc0");//c starts
	this.shapeAnswer[41] = getMessage("rc1");
	this.shapeAnswer[42] = getMessage("rc2");
	this.shapeAnswer[43] = getMessage("rc3");
	this.shapeAnswer[44] = getMessage("rc4");
	this.shapeAnswer[45] = getMessage("rc5");
	this.shapeAnswer[46] = getMessage("rc6");
	this.shapeAnswer[47] = getMessage("rc7");
	this.shapeAnswer[48] = getMessage("rc8");
	this.shapeAnswer[49] = getMessage("rc9");
	this.shapeAnswer[50] = getMessage("rc10");
	this.shapeAnswer[51] = getMessage("rc11");
	this.shapeAnswer[52] = getMessage("rc12");
	this.shapeAnswer[53] = getMessage("rc13");
	this.shapeAnswer[54] = getMessage("rc14");
	this.shapeAnswer[55] = getMessage("rc15");
	this.shapeAnswer[56] = getMessage("rc16");
	this.shapeAnswer[57] = getMessage("rc17");
	this.shapeAnswer[58] = getMessage("rc18");
	this.shapeAnswer[59] = getMessage("rc19");
	
    }

    /**
     *  FlashCards.setCardContent() sets the image centered horizontally in the card
     * @private
     */
    FlashCards.prototype.setCardContent = function () {
	var key = this.cardSet + "q"  + this.cardCount;
	var cardQuestion = getMessage(key);

	/*var img = new Image();
	 
	img.src = 'images/' + this.cardSet + this.cardCount + '.png';
	
	img.onload = function(){
	    document.getElementById("card-graphic").style.width = img.width+"px";
	    document.getElementById("card-graphic").style.height = img.height+"px";
	    document.getElementById("card-graphic").style.top = (160-(img.height/2))+"px";
	    document.getElementById("card-graphic").style.backgroundImage = 'url('+ img.src +')';
	    document.getElementById("card").style.display = "inline";
	}**/
		document.getElementById("card").innerHTML = cardQuestion;
	document.getElementById("card").style.display = "inline";
	}
	
    

	//add function for displaying question text instead of image as done above
	//step 1 message variable should be 'card deck' and 'current number'
	//step 2 get text from message variable   getMessage("carddeck.currentnumber.question");
	//step 3 add text to DOM element card
	//step 4 center, update size of characters and position DOM element
	//step 5 display DOM element
    /**
     *  FlashCards.shapeDeckClicked() set the game to play through the this deck
     * @private
     */




      FlashCards.prototype.enableButtons = function (){ //enable answear buttons
         document.getElementById("right-button").style.display = "none";
             document.getElementById("card-answer").style.display = "inline";
              document.getElementById("card-answer1").style.display = "inline";
                document.getElementById("card-answer2").style.display = "inline";
                
                
                var v = document.getElementById("card-answer");    
              document.getElementById("clonecard-answer").innerHTML = v.innerHTML;       
         document.getElementById("clonecard-answer").style.display = "none";
           document.getElementById("clonecard-answer1").style.display = "none";
             document.getElementById("clonecard-answer2").style.display = "none";
    };
    
    FlashCards.prototype.disableButtons = function(){ //disable answear buttons
      
         document.getElementById("card-answer").style.display = "none";
                var v = document.getElementById("card-answer");    
              document.getElementById("clonecard-answer").innerHTML = v.innerHTML;       
         document.getElementById("clonecard-answer").style.display = "inline";
            document.getElementById("clonecard-answer").style.color = "#00ff00";
             
             document.getElementById("card-answer1").style.display = "none";
               
                var v = document.getElementById("card-answer1");    
              document.getElementById("clonecard-answer1").innerHTML = v.innerHTML;       
         document.getElementById("clonecard-answer1").style.display = "inline";
         
          document.getElementById("card-answer2").style.display = "none";
               
                var v = document.getElementById("card-answer2");    
              document.getElementById("clonecard-answer2").innerHTML = v.innerHTML;       
         document.getElementById("clonecard-answer2").style.display = "inline";
            //document.getElementById("clonecard-answer1").style.color = "#00ff00";
        
    };
     function randomNumber() {
        var r = Math.floor((Math.random() * 6) + 1);
        return r;
    }
       
    FlashCards.prototype.randomise = function () {
          
       var r = randomNumber();
       
       
            FlashCards.prototype.random = function (){
                return 3;
            };
  
      
      
    if(r === 1){
      
   document.getElementById("card-answer").style.top = "1px";
     document.getElementById("clonecard-answer").style.top = "1px";
    document.getElementById("card-answer1").style.top = "50px";
      document.getElementById("clonecard-answer1").style.top = "50px";
    document.getElementById("card-answer2").style.top = "-50px";
      document.getElementById("clonecard-answer2").style.top = "-50px";
    }else if(r === 2){
          
     document.getElementById("card-answer").style.top = "50px";
       document.getElementById("clonecard-answer").style.top = "50px";
    document.getElementById("card-answer1").style.top = "-50px";
      document.getElementById("clonecard-answer1").style.top = "-50px";
    document.getElementById("card-answer2").style.top = "1px";
      document.getElementById("clonecard-answer2").style.top = "1px";
    }else if(r === 3){
          
      document.getElementById("card-answer").style.top = "-50px";
        document.getElementById("clonecard-answer").style.top = "-50px";
    document.getElementById("card-answer1").style.top = "1px";
      document.getElementById("clonecard-answer1").style.top = "1px";
    document.getElementById("card-answer2").style.top = "50px";
      document.getElementById("clonecard-answer2").style.top = "50px";
      
    }else if(r === 4){
           
     document.getElementById("card-answer").style.top = "50px";
       document.getElementById("clonecard-answer").style.top = "50px";
    document.getElementById("card-answer1").style.top = "-50px";
      document.getElementById("clonecard-answer1").style.top = "-50px";
    document.getElementById("card-answer2").style.top = "1px";
      document.getElementById("clonecard-answer2").style.top = "1px";
    }else if(r === 5){
           
      document.getElementById("card-answer").style.top = "-50px";
        document.getElementById("clonecard-answer").style.top = "-50px";
    document.getElementById("card-answer1").style.top = "1px";
      document.getElementById("clonecard-answer1").style.top = "1px";
    document.getElementById("card-answer2").style.top = "50px";
      document.getElementById("clonecard-answer2").style.top = "50px";
      
    }else if(r === 6){
          
      document.getElementById("card-answer").style.top = "-50px";
        document.getElementById("clonecard-answer").style.top = "-50px";
    document.getElementById("card-answer1").style.top = "1px";
      document.getElementById("clonecard-answer1").style.top = "1px";
    document.getElementById("card-answer2").style.top = "50px";
      document.getElementById("clonecard-answer2").style.top = "50px";
      
    }
    
   
    };
    
    FlashCards.prototype.setShapeDeck = function () {
	this.whipCrackSound.play();
	this.clear();
	this.cardSet = this.cardDecks.REDDECK;
	this.deckAnswer = this.shapeAnswer;
	this.deckQuestion=this.shapeQuestion;
	var offset = this.deckAnswer.length/this.number_of_answers; //change
	
	//TO DO  set deck questions to shape Questions
        
        
        
	this.setCardContent();
	document.getElementById("nav-flag").innerHTML = getMessage("shapes");
	document.getElementById("card-answer").style.color = "#996600";
	document.getElementById("card-answer").innerHTML = this.deckAnswer[this.cardCount];
        document.getElementById("card-answer").addEventListener('click', function () {
	// buttonClickSound.play();
         
        
        this.rightButtonClicked();
         
	}, false);
         document.getElementById("card-answer").innerHTML = "BRAIN";
         
         
	document.getElementById("card-answer1").style.color = "#996600";//change
	document.getElementById("card-answer1").innerHTML = this.deckAnswer[this.cardCount + offset];//change
	document.getElementById("card-answer2").style.color = "#996600";//change
	document.getElementById("card-answer2").innerHTML = this.deckAnswer[this.cardCount + offset*3-1];//change
    };

    /** 
     * FlashCards.shapeDeckClicked() plays the button click audio, navPane animation, and calls the setter for this deck 
     * @private
     */
    FlashCards.prototype.shapeDeckClicked = function () {
	this.buttonClickSound.play();
	this.navPaneClicked();
	this.setShapeDeck();
    };




    FlashCards.prototype.setShapeDeck = function () {
	this.whipCrackSound.play();
	this.clear();
	this.cardSet = this.cardDecks.REDDECK;
	this.deckAnswer = this.shapeAnswer;
	this.deckQuestion=this.shapeQuestion;
	var offset = this.deckAnswer.length/this.number_of_answers; //change
	
	//TO DO  set deck questions to shape Questions
	this.setCardContent();
	document.getElementById("nav-flag").innerHTML = getMessage("shapes");
	document.getElementById("card-answer").style.color = "#996600";
	document.getElementById("card-answer").innerHTML = this.deckAnswer[this.cardCount];
	document.getElementById("card-answer1").style.color = "#996600";//change
	document.getElementById("card-answer1").innerHTML = this.deckAnswer[this.cardCount + offset];//change
	document.getElementById("card-answer2").style.color = "#996600";//change
	document.getElementById("card-answer2").innerHTML = this.deckAnswer[this.cardCount + offset*3-2];//change
    };

    /** 
     * FlashCards.shapeDeckClicked() plays the button click audio, navPane animation, and calls the setter for this deck 
     * @private
     */
    FlashCards.prototype.shapeDeckClicked = function () {
	this.buttonClickSound.play();
	this.navPaneClicked();
	this.setShapeDeck();
    };

    /**
     *  FlashCards.getCountingDeckAnswers() will call getMessage to get the localized answers for this deck 
     *  @private
     */
    FlashCards.prototype.getCountingDeckAnswers = function () {
	this.countingAnswer = [];
	this.countingAnswer[0] = getMessage("ba0");
	this.countingAnswer[1] = getMessage("ba1");
	this.countingAnswer[2] = getMessage("ba2");
	this.countingAnswer[3] = getMessage("ba3");
	this.countingAnswer[4] = getMessage("ba4");
	this.countingAnswer[5] = getMessage("ba5");
	this.countingAnswer[6] = getMessage("ba6");
	this.countingAnswer[7] = getMessage("ba7");
	this.countingAnswer[8] = getMessage("ba8");
	this.countingAnswer[9] = getMessage("ba9");
	this.countingAnswer[10] = getMessage("ba10");
	this.countingAnswer[11] = getMessage("ba11");
	this.countingAnswer[12] = getMessage("ba12");
	this.countingAnswer[13] = getMessage("ba13");
	this.countingAnswer[14] = getMessage("ba14");
	this.countingAnswer[15] = getMessage("ba15");
	this.countingAnswer[16] = getMessage("ba16");
	this.countingAnswer[17] = getMessage("ba17");
	this.countingAnswer[18] = getMessage("ba18");
	this.countingAnswer[19] = getMessage("ba19");
	this.countingAnswer[20] = getMessage("bb0");
	this.countingAnswer[21] = getMessage("bb1");
	this.countingAnswer[22] = getMessage("bb2");
	this.countingAnswer[23] = getMessage("bb3");
	this.countingAnswer[24] = getMessage("bb4");
	this.countingAnswer[25] = getMessage("bb5");
	this.countingAnswer[26] = getMessage("bb6");
	this.countingAnswer[27] = getMessage("bb7");
	this.countingAnswer[28] = getMessage("bb8");
	this.countingAnswer[29] = getMessage("bb9");
	this.countingAnswer[30] = getMessage("bb10");
	this.countingAnswer[31] = getMessage("bb11");
	this.countingAnswer[32] = getMessage("bb12");
	this.countingAnswer[33] = getMessage("bb13");
	this.countingAnswer[34] = getMessage("bb14");
	this.countingAnswer[35] = getMessage("bb15");
	this.countingAnswer[36] = getMessage("bb16");
	this.countingAnswer[37] = getMessage("bb17");
	this.countingAnswer[38] = getMessage("bb18");
	this.countingAnswer[39] = getMessage("bb19");
	this.countingAnswer[40] = getMessage("bc0");
	this.countingAnswer[41] = getMessage("bc1");
	this.countingAnswer[42] = getMessage("bc2");
	this.countingAnswer[43] = getMessage("bc3");
	this.countingAnswer[44] = getMessage("bc4");
	this.countingAnswer[45] = getMessage("bc5");
	this.countingAnswer[46] = getMessage("bc6");
	this.countingAnswer[47] = getMessage("bc7");
	this.countingAnswer[48] = getMessage("bc8");
	this.countingAnswer[49] = getMessage("bc9");
	this.countingAnswer[50] = getMessage("bc10");
	this.countingAnswer[51] = getMessage("bc11");
	this.countingAnswer[52] = getMessage("bc12");
	this.countingAnswer[53] = getMessage("bc13");
	this.countingAnswer[54] = getMessage("bc14");
	this.countingAnswer[55] = getMessage("bc15");
	this.countingAnswer[56] = getMessage("bc16");
	this.countingAnswer[57] = getMessage("bc17");
	this.countingAnswer[58] = getMessage("bc18");
	this.countingAnswer[59] = getMessage("bc19");
    };

    /**
     *  FlashCards.setCountingDeck() set the game to play through the this deck 
     *  @private
     */
    FlashCards.prototype.setCountingDeck = function () {
	this.whipCrackSound.play();
	this.clear();
	this.cardSet = this.cardDecks.BLUEDECK;
	this.deckAnswer = this.countingAnswer;
	this.setCardContent();
	document.getElementById("nav-flag").innerHTML = getMessage("counting");
	document.getElementById("card-answer").style.color = "#996600";
	document.getElementById("card-answer").innerHTML = this.deckAnswer[this.cardCount];
	document.getElementById("card-answer1").style.color = "#996600";//change
	document.getElementById("card-answer1").innerHTML = this.deckAnswer[this.cardCount + offset];//change
	document.getElementById("card-answer2").style.color = "#996600";//change
	document.getElementById("card-answer2").innerHTML = this.deckAnswer[this.cardCount + offset*3-1];//change
    };

    /**
     * FlashCards.countingDeckClicked() plays the button click audio, navPane animation, and calls the setter for this deck
     * @private
     */
    FlashCards.prototype.countingDeckClicked = function () {
	this.buttonClickSound.play();
	this.navPaneClicked();
	this.setCountingDeck();
    };

    /**
     *  FlashCards.getSpanishDeckAnswers() will call getMessage to get the localized answers for this deck 
     *  @private
     */
    FlashCards.prototype.getSpanishDeckAnswers = function () {
	this.spanishAnswer = [];
	this.spanishAnswer[0] = getMessage("ga0");
	this.spanishAnswer[1] = getMessage("ga1");
	this.spanishAnswer[2] = getMessage("ga2");
	this.spanishAnswer[3] = getMessage("ga3");
	this.spanishAnswer[4] = getMessage("ga4");
	this.spanishAnswer[5] = getMessage("ga5");
	this.spanishAnswer[6] = getMessage("ga6");
	this.spanishAnswer[7] = getMessage("ga7");
	this.spanishAnswer[8] = getMessage("ga8");
	this.spanishAnswer[9] = getMessage("ga9");
	this.spanishAnswer[10] = getMessage("gb0");
	this.spanishAnswer[11] = getMessage("gb1");
	this.spanishAnswer[12] = getMessage("gb2");
	this.spanishAnswer[13] = getMessage("gb3");
	this.spanishAnswer[14] = getMessage("gb4");
	this.spanishAnswer[15] = getMessage("gb5");
	this.spanishAnswer[16] = getMessage("gb6");
	this.spanishAnswer[17] = getMessage("gb7");
	this.spanishAnswer[18] = getMessage("gb8");
	this.spanishAnswer[19] = getMessage("gb9");
	this.spanishAnswer[20] = getMessage("gc0");
	this.spanishAnswer[21] = getMessage("gc1");
	this.spanishAnswer[22] = getMessage("gc2");
	this.spanishAnswer[23] = getMessage("gc3");
	this.spanishAnswer[24] = getMessage("gc4");
	this.spanishAnswer[25] = getMessage("gc5");
	this.spanishAnswer[26] = getMessage("gc6");
	this.spanishAnswer[27] = getMessage("gc7");
	this.spanishAnswer[28] = getMessage("gc8");
	this.spanishAnswer[29] = getMessage("gc9");
    };

    /**
     * FlashCards.setSpanishDeck() set the game to play through the this deck
     * @private
     */
    
    FlashCards.prototype.setSpanishDeck = function () {
	this.whipCrackSound.play();
	this.clear();
	this.cardSet = this.cardDecks.GREENDECK;
	this.deckAnswer = this.spanishAnswer;
	this.setCardContent();
	document.getElementById("nav-flag").innerHTML = getMessage("spanish");
	document.getElementById("card-answer").style.color = "#996600";
	document.getElementById("card-answer").innerHTML = this.deckAnswer[this.cardCount];
	document.getElementById("card-answer1").style.color = "#996600";//change
	document.getElementById("card-answer1").innerHTML = this.deckAnswer[this.cardCount + offset];//change
	document.getElementById("card-answer2").style.color = "#996600";//change
	document.getElementById("card-answer2").innerHTML = this.deckAnswer[this.cardCount + offset*2-1];//change
    };

    /**
     *  FlashCards.spanishDeckClicked() plays the button click audio, navPane animation, and calls the setter for this deck 
     *  @private
     */
    FlashCards.prototype.spanishDeckClicked = function () {
	this.buttonClickSound.play();
	this.navPaneClicked();
	this.setSpanishDeck();
    };

    /**
     *  FlashCards.getColorDeckAnswers() will call getMessage to get the localized answers for this deck 
     *  @private
     */
    FlashCards.prototype.getColorDeckAnswers = function () {
	this.colorAnswer = [];
	this.colorAnswer[0] = getMessage("ya0");
	this.colorAnswer[1] = getMessage("ya1");
	this.colorAnswer[2] = getMessage("ya2");
	this.colorAnswer[3] = getMessage("ya3");
	this.colorAnswer[4] = getMessage("ya4");
	this.colorAnswer[5] = getMessage("ya5");
	this.colorAnswer[6] = getMessage("ya6");
	this.colorAnswer[7] = getMessage("ya7");
	this.colorAnswer[8] = getMessage("ya8");
	this.colorAnswer[9] = getMessage("ya9");
	this.colorAnswer[10] = getMessage("ya10");
	this.colorAnswer[11] = getMessage("ya11");
	this.colorAnswer[12] = getMessage("ya12");
	this.colorAnswer[13] = getMessage("ya13");
	this.colorAnswer[14] = getMessage("ya14");
	this.colorAnswer[15] = getMessage("ya15");
	this.colorAnswer[16] = getMessage("ya16");
	this.colorAnswer[17] = getMessage("ya17");
	this.colorAnswer[18] = getMessage("ya18");
	this.colorAnswer[19] = getMessage("ya19");
	this.colorAnswer[20] = getMessage("yb0");
	this.colorAnswer[21] = getMessage("yb1");
	this.colorAnswer[22] = getMessage("yb2");
	this.colorAnswer[23] = getMessage("yb3");
	this.colorAnswer[24] = getMessage("yb4");
	this.colorAnswer[25] = getMessage("yb5");
	this.colorAnswer[26] = getMessage("yb6");
	this.colorAnswer[27] = getMessage("yb7");
	this.colorAnswer[28] = getMessage("yb8");
	this.colorAnswer[29] = getMessage("yb9");
	this.colorAnswer[30] = getMessage("yb10");
	this.colorAnswer[31] = getMessage("yb11");
	this.colorAnswer[32] = getMessage("yb12");
	this.colorAnswer[33] = getMessage("yb13");
	this.colorAnswer[34] = getMessage("yb14");
	this.colorAnswer[35] = getMessage("yb15");
	this.colorAnswer[36] = getMessage("yb16");
	this.colorAnswer[37] = getMessage("yb17");
	this.colorAnswer[38] = getMessage("yb18");
	this.colorAnswer[39] = getMessage("yb19");
	this.colorAnswer[40] = getMessage("yc0");
	this.colorAnswer[41] = getMessage("yc1");
	this.colorAnswer[42] = getMessage("yc2");
	this.colorAnswer[43] = getMessage("yc3");
	this.colorAnswer[44] = getMessage("yc4");
	this.colorAnswer[45] = getMessage("yc5");
	this.colorAnswer[46] = getMessage("yc6");
	this.colorAnswer[47] = getMessage("yc7");
	this.colorAnswer[48] = getMessage("yc8");
	this.colorAnswer[49] = getMessage("yc9");
	this.colorAnswer[50] = getMessage("yc10");
	this.colorAnswer[51] = getMessage("yc11");
	this.colorAnswer[52] = getMessage("yc12");
	this.colorAnswer[53] = getMessage("yc13");
	this.colorAnswer[54] = getMessage("yc14");
	this.colorAnswer[55] = getMessage("yc15");
	this.colorAnswer[56] = getMessage("yc16");
	this.colorAnswer[57] = getMessage("yc17");
	this.colorAnswer[58] = getMessage("yc18");
	this.colorAnswer[59] = getMessage("yc19");
    };

   

    /** 
     * FlashCards.setColorDeck set the game to play through the this deck
     * @private
     */
    FlashCards.prototype.setColorDeck = function () {
	this.whipCrackSound.play();
	this.clear();
	this.cardSet = this.cardDecks.YELLOWDECK;
	this.deckAnswer = this.colorAnswer;
	this.setCardContent();
	document.getElementById("nav-flag").innerHTML = getMessage("colors");
	document.getElementById("card-answer").innerHTML = this.colorAnswer[this.cardCount];
	//document.getElementById("card-answer").style.color = this.colorHex[this.cardCount];
	document.getElementById("card-answer1").style.color = "#996600";//change
	document.getElementById("card-answer1").innerHTML = this.deckAnswer[this.cardCount + offset];//change
	document.getElementById("card-answer2").style.color = "#996600";//change
	document.getElementById("card-answer2").innerHTML = this.deckAnswer[this.cardCount + offset*2-1];//change
    };

    /**
     *  FlashCards.colorDeckClicked() plays the button click audio, navPane animation, and calls the setter for this deck 
     * @private
     */
    FlashCards.prototype.colorDeckClicked = function () {
	this.buttonClickSound.play();
	this.navPaneClicked();
	this.setColorDeck();
    };

    /** 
     * FlashCards.initGame() gets the localized strings for the game play screen, sets the default deck to Shapes
     * @private
     */
    FlashCards.prototype.initGame = function () {
	this.initSound();
	this.backgroundSound.play();

	document.getElementById("score-text").innerHTML = getMessage("scoreText");
	document.getElementById("help-text").innerHTML = getMessage("helpText");

        this.setGameEventListeners();

	this.getColorDeckAnswers();
	//this.getColorDeckColors();
	this.getShapeDeckAnswers();
	this.getCountingDeckAnswers();
	this.getSpanishDeckAnswers();

	this.setShapeDeck();
    };

    /**
     *  FlashCards.playNowClicked() will initialize the game screen when Play Now button is clicked and hide the splash screen 
     * @private
     */
    FlashCards.prototype.playNowClicked = function () {
         this.adventureThemeSound = new GameSound("sound-intro", "audio/Theme_Loop.ogg", "auto", true);
            this.adventureThemeSound.play();
	this.initGame(); 
	document.getElementById("splash-screen").style.display = "none";
	document.getElementById("game-screen").style.display = "inline";
    };

    /**
     * FlashCards.isLastCard() 
     * @private
     * @return true if card count is equal to the number of cards in the deck, else return false
     */
    FlashCards.prototype.isLastCard = function () {
	if ((this.deckAnswer.length/this.number_of_answers) === this.cardCount) {
	    return true;
	}
	return false;
    };

    /**
     * FlashCards.drawStars() draws the stars for right and wrong answers
     * @private
     */
    FlashCards.prototype.drawStars = function () {
	var star,
	count,
	container;

	//paint correct stars equal to rightCount
	for (count = 1; count <= this.rightCount; count = count + 1) {
	    star = document.createElement("img");
	    star.setAttribute('src', 'images/StarFilled.png');
	    star.setAttribute('id', ('star' + count));
	    star.setAttribute('class', ('star'));
	    container = document.getElementById("game-screen");
	    container.appendChild(star);
	}

	//paint remaining stars as empty stars
	for (count = (this.rightCount + 1); count <= (this.deckAnswer.length/this.number_of_answers); count = count + 1) {
	    star = document.createElement("img");
	    star.setAttribute('src', 'images/StarEmpty.png');
	    star.setAttribute('id', ('star' + count));
	    star.setAttribute('class', ('star'));
	    container = document.getElementById("game-screen");
	    container.appendChild(star);
	}
    };

    /**
     * FlashCards.endGame() opens nav pane, plays audio sound for end of game, shows correct star score and replay button
     * @private
     */
    FlashCards.prototype.endGame = function () {
	this.trumpetFanfareSound.play();
	this.endGameFlag = true;
	this.navPaneClose();
	document.getElementById("card").style.display = "none";
	//document.getElementById("card-flip").setAttribute("id", "card-graphic");

	this.drawStars();

	//if user got more right than wrong then show localized strings for "good job" else show localized strings for "try again" 
	if (((this.deckAnswer.length/this.number_of_answers) - this.rightCount) < this.rightCount) {
	    document.getElementById("endgame-prompt").innerHTML = this.rightCount + "/" + this.deckAnswer.length/this.number_of_answers + "  "  + getMessage("goodJob");
	} else {
	    document.getElementById("endgame-prompt").innerHTML = this.rightCount + "/" + this.deckAnswer.length/this.number_of_answers + "  "  +getMessage("tryAgain");
	}

	//set card answer color and display replay button
	document.getElementById("endgame-prompt").style.display = "inline";
	document.getElementById("replay-button").style.display = "inline";
    };

    /**
     * FlashCards.flipCard() hide answers and moves to next card in the deck, increments counters and checks for end game state
     * @private
     */
    FlashCards.prototype.flipCard = function () {
         
  
	this.hideAnswer();
	
	this.cardCount = this.cardCount + 1;
                          
	if (!this.isLastCard()) {
	    this.cardFlipSound.play();
	    this.setCardContent();
	    document.getElementById("card-answer").innerHTML = this.deckAnswer[this.cardCount];
	    if (this.cardSet === this.cardDecks.YELLOWDECK) {
		//document.getElementById("card-answer").style.color = this.colorHex[this.cardCount];
	    }
             var question = this.cardCount;
             
              
              this.readQuestion = new GameSound("readQuestion"+this.cardSet + question, "audio/en_rq"+question+".mp3", "auto", false);
             
                           this.readQuestion.play(); 
             
	    //document.getElementById("card-flip").setAttribute("id", "card-graphic");
	} else {
	    this.endGame();
	}
    };

    /**
     * FlashCards.wrongButtonClicked() plays audio sounds, increments wrongCount and calls flipCard()
     * @private
     */
    FlashCards.prototype.wrongButtonClicked = function () {
          (pathlan == "en")?  this.wrongAnswer = new GameSound("wrongAnswer", "audio/en_you_got_it_wrong.mp3", "auto", false):
                this.wrongAnswer = new GameSound("wrongAnswer", "audio/ny_false.mp3", "auto", false)  ;
                       
  
            
               this.wrongAnswer.play();
               
    	 document.getElementById("right-button").style.display = "inline";
	this.wrongAnswerSound.play();
	this.buttonClickSound.play();
	//this.flipCard();
    };
    
    /**
     * FlashCards.rightButtonClicked() plays audio sounds, increments rightCount and calls flipCard()
     * @private
     */
    FlashCards.prototype.rightButtonClicked = function () {
        (pathlan == "en")?  this.correctAnswer = new GameSound("correctAnswer", "audio/en_you_got_it_right.mp3", "auto", false):
                this.correctAnswer = new GameSound("correctAnswer", "audio/en_you_got_it_right.mp3", "auto", false)  ;
                       this.correctAnswer.play();   
  
               this.correctAnswer.play();
                  
	this.rightAnswerSound.play();
	this.buttonClickSound.play();
	this.rightCount = this.rightCount + 1;
	//this.flipCard();

	  document.getElementById("right-button").style.display = "inline";
	document.getElementById("score-number").innerHTML = this.rightCount;
	document.getElementById("score-number").innerHTML = this.rightCount;
    };

    /**
     * FlashCards.replayButtonClicked() restarts current game and calls clear()
     * @private
     */
    FlashCards.prototype.replayButtonClicked = function () {
	if (this.cardSet === this.cardDecks.YELLOWDECK) {
	    this.colorDeckClicked();
	} else if (this.cardSet === this.cardDecks.REDDECK) {
	    this.shapeDeckClicked();
	} else if (this.cardSet === this.cardDecks.GREENDECK) {
	    this.spanishDeckClicked();
	} else if (this.cardSet === this.cardDecks.BLUEDECK) {
	    this.countingDeckClicked();
	}
	this.clear();
    };

    /**
     * FlashCards.showAnswer() will show right and wrong buttons, answer and set cursor type
     * @private
     */
    FlashCards.prototype.showAnswer = function () {
	document.getElementById("answer").style.display = "inline";
    };

    /**
     * FlashCards.cardClicked() plays button click sound, makes sure the nav pane is closed, and if not end game state will call showAnswer()
     * @private
     */
    FlashCards.prototype.cardClicked = function () {
	this.buttonClickSound.play();
	this.navPaneClose();
	if (!this.endGameFlag) {
	    this.showAnswer();
	}
    };

    /**
     * FlashCards.scrollNavPane will scroll the navigation Pane the direction the user moves the mouse
     * @private
     */
    FlashCards.prototype.scrollNavPane = function (delta) {
	document.getElementById("scroll-items").style.webkitTransform = "translateY("+delta+"px)";
    };

    /**
     * FlashCards.setGameEventListeners sets event handlers for the game
     * @private
     */
    FlashCards.prototype.setGameEventListeners = function () {
	var self = this,
	starty = 0, //starting y coordinate of drag
	isDrag = -1; //flag for qualifying drag event
        
       
	
	document.getElementById("nav-pane").addEventListener('click', function () {
	    self.navPaneClicked();
	}, false);
	document.getElementById("scroll-overlay").addEventListener('mousedown', function (e) {
	    starty = e.clientY;
	    isDrag = 0; //mouse down
	}, false);
	document.getElementById("scroll-overlay").addEventListener('mousemove', function (e) {
	    isDrag = 1; //mouse move
	}, false);
	document.getElementById("scroll-overlay").addEventListener('mouseup', function (e) {
	    if(isDrag === 1) { //if equals 1 is drag event
		self.scrollNavPane((-1)*(starty-e.clientY));
	    }
	    isDrag = -1; //regardless reset endy 
	}, false);
	document.getElementById("red-deck").addEventListener('click', function () {
	    self.shapeDeckClicked();
	}, false);
	document.getElementById("yellow-deck").addEventListener('click', function () {
	    self.colorDeckClicked();
	}, false);
	document.getElementById("blue-deck").addEventListener('click', function () {
	    self.countingDeckClicked();
	}, false);
	document.getElementById("green-deck").addEventListener('click', function () {
	    self.spanishDeckClicked();
	}, false);
	document.getElementById("card").addEventListener('click', function () {
	  //  self.cardClicked();
	}, false);
	document.getElementById("card-answer").addEventListener('click', function () {
           
                self.rightButtonClicked();
              self.cardClicked();
            self.disableButtons();
        
	}, false);
	
	document.getElementById("card-answer1").addEventListener('click', function () {
	    self.wrongButtonClicked();
             self.cardClicked();
             self.disableButtons();
              
	}, false);
        document.getElementById("card-answer2").addEventListener('click', function () {
	    self.wrongButtonClicked();
             self.cardClicked();
             
              self.disableButtons();
	}, false);
	
        document.getElementById("right-button").addEventListener('click', function () {
	   self.flipCard();
          self.randomise();
           self.cardClicked();
          self.enableButtons();
           
	     
	}, false);
	document.getElementById("wrong-button").addEventListener('click', function () {
	    self.wrongButtonClicked();
	}, false);
	document.getElementById("right-button").addEventListener('click', function () {
	   //ww self.rightButtonClicked();
	}, false);
	document.getElementById("replay-button").addEventListener('click', function () {
	    self.replayButtonClicked();
	}, false);
	document.getElementById("help-icon").addEventListener('click', function () {
	    self.helpClicked();
	}, false);
	document.getElementById("help-close").addEventListener('click', function () {
	    self.helpCloseClicked();
           (pathlan == "en")?    this.playquestion = new GameSound("playquestion", "audio/en_rq0.mp3", false):
                           this.playquestion = new GameSound("playquestion", "audio/ny_option1.mp3", false);

                                this.playquestion.play();
                          document.getElementById("instructions").pause();
                         
                           var playlist = Array(1,2,3,4);
                          
                     
                 
                  
                  
                    
                    
                    var audioPlayer = document.getElementById('playquestion');
                     var audioPlayer1 = document.getElementById('playquestion3');
                    
                    audioPlayer.addEventListener('ended', PlayNext);
                    audioPlayer1.addEventListener('ended', PlayNext1);
                       var r =randomNumber();
                    function PlayNext1(){
                        
                     
                      
                            this.playquestion4 = new GameSound("playquestion4", "audio/en_ra2.mp3", false);
                        document.getElementById("card-answer").style.color = "red"; 
                        
                    playquestion4.play();
                    }
                    function PlayNext() {
                         var r = randomNumber();
                         alert(r);
                        if(r ===1){
                             this.playquestion3 = new GameSound("playquestion3", "audio/en_ra2.mp3", false);
                        document.getElementById("card-answer2").style.color = "red"; 
                        }else if(r ===2 ){
                          this.playquestion3 = new GameSound("playquestion3", "audio/en_ra1.mp3", false);
                        document.getElementById("card-answer1").style.color = "red";   
                        }else{
                            this.playquestion3 = new GameSound("playquestion3", "audio/en_ra0.mp3", false);
                        document.getElementById("card-answer").style.color = "red"; 
                        }
                         playquestion3.play();
                        
                       
                      
                        
                        
                    }
                   
                    


              document.getElementById("sound-intro").play();
              
              
	}, false);
    };

    /**
     * FlashCards.setSplashScreenEventListeners sets event handlers for the splash screen 
     * @private
     */
    FlashCards.prototype.setSplashScreenEventListeners = function () {
	var self = this;
	this.buttonClickSound = new GameSound("sound-buttonclick", "audio/GeneralButtonClick_wav.ogg", "none");
	document.getElementById("play-button").addEventListener('click', function () {
	    self.buttonClickSound.play();
	    self.playNowClicked();
            document.getElementById("sound-intro").pause();
           
            
             (pathlan == "en")?  this.instruction = new GameSound("instructions", "audio/en_instructions.mp3", "auto", false):
                this.instruction = new GameSound("instructions", "audio/ny_option1.mp3", "auto", false)  ;
                       this.instruction.play();
          //  this.instructInEng = new GameSound("instructInEng", "audio/");
	}, false);
        
//         document.getElementById("play-en").addEventListener('click', function (){
//           document.getElementById("play-en").style.display = "none";
//          document.getElementById("language").style.display = "none";
//          document.getElementById("play-button").style.display = "inline";
//         
//          
//          self.randomise();
//        }, false);
    };

    /**
     * FlashCards.initSound will initialize all the sound id's for each sound file 
     * @private
     */
    FlashCards.prototype.initSound = function () {
	this.cardFlipSound = new GameSound("sound-cardflip", "audio/CardFlip.ogg", "none");
	this.backgroundSound = new GameSound("sound-background", "audio/GameplayBackgroundAtmospheric_Loop.ogg", "none", true);
	this.swooshSound = new GameSound("sound-navpane", "audio/NavPaneSwoosh.ogg", "none");
	this.trumpetFanfareSound = new GameSound("sound-end", "audio/Replay.ogg", "none");
	this.rightAnswerSound = new GameSound("sound-starbutton", "audio/StarButton.ogg", "none");
	this.wrongAnswerSound = new GameSound("sound-thumbbutton", "audio/ThumbsDown.ogg", "none");
	this.whipCrackSound = new GameSound("sound-begin", "audio/WhipCrackBegin.ogg", "none");
    };

    /**
     * FlashCards.init() will set the license, play intro sound, and set splash screen text 
     * @private
     */
    FlashCards.prototype.init = function () {
        FlashCards.prototype.randomise();
         document.getElementById("lang").style.diplay = "none";  //div receiving the variable
	document.getElementById("app-name").innerHTML = getMessage("appName");
	document.getElementById("adventure-ribbon").innerHTML = getMessage("adventureText");
	document.getElementById("cards-ribbon").innerHTML = getMessage("cardsText");
	var playButton = document.getElementById("play-button");
         playButton.innerHTML = getMessage("playButtonText");
//        document.getElementById("play-ny").innerHTML = ("Play in nyanga"); delete
//       document.getElementById("play-en").innerHTML = ("Play in English"); delete

       
	 (pathlan == "en")?  this.adventureThemeSound = new GameSound("sound-intro", "audio/Theme_Loop.ogg", "auto", true):
                this.adventureThemeSound = new GameSound("sound-intro", "audio/ndiza.mp3", "auto", true)  ;
        
      
                
//        //set audio instruction for both en and ny
//        (pathlan == "en")?  this.adventureThemeSound = new GameSound("sound-intruction", "audio/ndiza.ogg", "auto", false):
//                this.adventureThemeSound = new GameSound("sound-intruction", "audio/ndiza.mp3", "auto", false)  ;
//        
	this.adventureThemeSound.play();
	this.setSplashScreenEventListeners();
	license_init("license", "splash-screen");
   // alert(pathlan);//  full reading what is being passed
    };

    window.addEventListener('load', function () {
	var App = new FlashCards();
	App.init();
	//hack to get active state to work on webkit
	this.touchstart = function (e) {};
    }, false);

}());
