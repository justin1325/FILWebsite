<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<title>FIL Quiz</title>
		<link rel="stylesheet" type="text/css" href="headnav.css">
		<style type="text/css">
		.quiz{
			background:white;
			padding-right: 20px;
			padding-left: 20px;
		}
		.alertBox{
			margin-bottom: 8px;
		}
		.question{
			margin-bottom: 15px;
		}
		.answers{
		
		}
		
		.score{
			position: absolute;
			display: inline-block;
			background-color: #C8C8C8;
			border: groove;
			border-radius: 15px;
			border-color: #C8C8C8;
			border-width: 3px;
			margin-top: 20px;
			margin-bottom: 20px;
			margin-left: 25%;
			padding: 10px;
			bottom: 40px;
		}
		
		.control{
			position: absolute;
			padding: 7px;
			bottom: 0;
		}
		
		#date{
			float: right;
		}
		
		#pageTitle{
			margin-top: 2px;
			padding-left: 75px;
			text-align: center;
		}
		
		footer{
			position: fixed;
			bottom: 0;
			left: 8px;
		}
		
		#container{
			position: relative;
			background:white;
			margin-left:auto;
			margin-right:auto;
			margin-top: 100px;
			width:400px;
			height: 500px;
			border: ridge;
			border-width: 5px;
		}
		
		#quizheader {
			text-align: center;
			border: solid 1px; 
			background-color: #D80000;
		}
		
		
		.quizbutton {
			background: #999;
		}
		.quizbutton:hover {
			background: #4b545f;
			color:white;
			background: linear-gradient(top, #4f5964 0%, #5f6975 40%);
			background: -moz-linear-gradient(top, #4f5964 0%, #5f6975 40%);
			background: -webkit-linear-gradient(top, #4f5964 0%,#5f6975 40%);
		}
		
		#nextQuestionButton {
			float: left;
			padding-right: 10px;
			padding-left: 10px;
			padding-top: 5px;
			padding-bottom: 5px;
			width: 100px;
		}
		
		#finishQuizButton {
			position: absolute;
			float: left;
			margin-left: 187px;
			padding-right: 10px;
			padding-left: 10px;
			padding-top: 5px;
			padding-bottom: 5px;
			width: 100px;
		}
		
		
		
		</style>
		<script src="quizes.js"></script>
		<script language="javascript">
		var score=0;
		var scoreTotal=0;
		var qnum = Math.floor((Math.random() * quizes.length));
		
		function startQuiz(){
			document.getElementById("topic").innerHTML = quizes[qnum].title;
			showScore();
			showQuestion(0);
		}
		
		function showQuestion(){
			if(scoreTotal>=quizes[qnum].questions.length){
				finishQuiz();
				return;
			}
			var randQ = randomQuestion();
			var qdiv = document.getElementById("question");
			qdiv.innerText = quizes[qnum].questions[randQ].q;
			console.log(quizes[qnum].questions[randQ].q);
			var adiv = document.getElementById("answers");
			while (adiv.firstChild) {
 				adiv.removeChild(adiv.firstChild); ///remove all old answers
			}
			for(var i=0; i<quizes[qnum].questions[randQ].resps.length; i++){
				var radio = document.createElement("input");
				radio.type="radio";
				radio.name="response";
				radio.value=i;
				radio.onclick=function(){answerQuestion(randQ, this.value)};
				adiv.appendChild(document.createTextNode((i+1)+")"));
				adiv.appendChild(radio);
				var label = document.createElement("span");
				label.innerHTML="&nbsp;-&nbsp;"+quizes[qnum].questions[randQ].resps[i]+"<br />";
				adiv.appendChild(label);

			}
		}
		function randomQuestion(){
			var i = Math.floor((Math.random() * quizes[qnum].questions.length));
			while(quizes[qnum].questions[i].shown==true){
				i = Math.floor((Math.random() * quizes[qnum].questions.length));
			}
			quizes[qnum].questions[i].shown=true;
			return i;
		}
		
		//skips the current question
		function nextQuestion(){
			scoreTotal++;
			showScore();
			showQuestion();
		}
		function answerQuestion(q,val){
			correct = (val==quizes[qnum].questions[q].a);
			scoreTotal++;
			var alertdiv = document.getElementById("alertBox");
			if(correct){
				score++;
				alertdiv.style.background="green";
				alertdiv.style.color="white";
				alertdiv.innerText = "Correct!";
			}
			else{
				alertdiv.style.background="red";
				alertdiv.style.color="yellow";
				alertdiv.innerText = "Incorrect! The correct answer was "+(quizes[qnum].questions[q].a+1)+", \""+quizes[qnum].questions[q].resps[quizes[qnum].questions[q].a]+"\"";
			}
			showScore();
			showQuestion();
		}
		function showScore(){
			var scorediv = document.getElementById("score");
			var percent = (scoreTotal==0 ? 100 : Math.floor(score/scoreTotal*100));
			scorediv.innerHTML = "Score: "+score+"/"+scoreTotal+" correct ("+percent+"%)<br />"+(quizes[qnum].questions.length-scoreTotal)+" questions remaining";
		}
		function finishQuiz(){
			document.getElementById("question").innerHTML="";
			document.getElementById("answers").innerHTML="";
			document.getElementById("nextQuestionButton").disabled=true;
			var alertDiv = document.getElementById("alertBox");
			alertDiv.style.color="black";
			alertDiv.style.background="";
			var unfinished = (quizes[qnum].questions.length-scoreTotal);
			alertDiv.innerHTML = "Thank you for playing! You scored "+score+"/"+scoreTotal+" correct("+Math.floor(score/scoreTotal*100)+"%) on the "+quizes[qnum].title+" quiz." + "<br>";
			if(unfinished){
				alertDiv.innerHTML += "<br />You did not answer "+unfinished+" questions.";
			}
		}
		
		function currentDate() {
			document.getElementById("date").innerHTML = Date();
		}
		</script>
		
	</head>
<body onLoad="startQuiz(); currentDate()">
			<?php require("header.php")?>
	<span id = "date"> </span>
	<div id = "container">
		<div id = "quizheader"> <h1> FIL QUIZ </h1> </div>
		<div class="quiz">
			<h2 id="topic"></h2>
			<div class="alertBox" id="alertBox"></div>
			<div class="question" id="question"></div>
			<div class="answers" id="answers"></div>
		</div>
		<div class="score" id="score"></div>
		<div class="control" id="control"><input type='button' value="next question" onClick="nextQuestion()" id="nextQuestionButton" class="quizbutton"> <input type='button' id = "finishQuizButton" value="quit" onClick="finishQuiz()"class="quizbutton"></div>
	</div>

</body>
</html>