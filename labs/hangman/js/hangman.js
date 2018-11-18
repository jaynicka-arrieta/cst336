var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [{word: "snake", hint: "It's a reptile"},
             {word: "monkey", hint:"It's a mammal"},
             {word: "beetle", hint: "It's an insect"}];
var alpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];


//LISTENERS
window.onload = startGame();

//FUNCTIONS
function startGame() {
    pickWord();
    initBoard();
    createLetters();
    updateBoard();
}

//fill board with underscores
function initBoard() {
    for (var letter in selectedWord) {
        board.push("_");
    }
}

function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}


function updateBoard() {
    $("#word").empty();
    
    for (var letter of board) {
        document.getElementById("word").innerHTML += letter + " ";
    }
    
    $("#word").append("</br></br>");
    $("#word").append("<button id='hint'>Hint</button>");
}

function createLetters() {
    for (var letter of alpha) {
        $("#letters").append("<button class='letter' id ='" + letter + "'>" + letter + "</button>");
    }
}

//update current word then calls for a board update
function updateWord(positions, letter) {
    for (var pos of positions) {
        board[pos] = letter;
    }
    updateBoard();
}

//checks to see if selected letter exists in selectedWord
function checkLetter(letter) {
    var positions = new Array();
    
    //put all the positions the letter exists in an array
    for (var i = 0; i < selectedWord.length; i++) {
        console.log(selectedWord);
        if (letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    
    if (positions.length > 0) {
        updateWord(positions, letter);
        
        //check to see if this is a winning guess
        if (!board.includes('_')) {
            endGame(true);
        }
    } else {
        remainingGuesses -= 1;
        updateMan();
    }
    
    if (remainingGuesses <= 0) {
        endGame(false);
    }
}

//calculates and updates the img for our stick man
function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

//ends game by hiding game divs and displaying the win or loss divs
function endGame(win) {
    $("#letters").hide();
    
    if (win) {
        $("#won").show();
    } else {
        $("#lost").show();
    }
}

function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}

$(".letter").click(function() {
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$(".replayBtn").on("click", function() {
    location.reload();
});

$("#hint").on("click", function() {
    $("#hint").hide();
    $("#word").append("<span class = 'hint'>Hint: " + selectedHint + "</span>");
});
