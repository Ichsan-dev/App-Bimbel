const questions = [{
    question: "Siapa Presiden ke-1 di Indonesia?",
    answer: [{
        text: "Ir.Soekarno",
        correct: true
      },
      {
        text: "Ir. Jokowi Widodo",
        correct: false
      },
      {
        text: "Puan Maharani",
        correct: false
      },
      {
        text: "Ichsan Moch F,ST",
        correct: false
      },
    ]
  },
  {
    question: "Siapa Presiden ke-2 di Indonesia?",
    answer: [{
        text: "Ir.Soekarno",
        correct: true
      },
      {
        text: "Ir. Jokowi Widodo",
        correct: false
      },
      {
        text: "Puan Maharani",
        correct: false
      },
      {
        text: "Ichsan Moch F,ST",
        correct: false
      },
    ]
  },
  {
    question: "Siapa Presiden ke-3 di Indonesia?",
    answer: [{
        text: "Ir.Soekarno",
        correct: true
      },
      {
        text: "Ir. Jokowi Widodo",
        correct: false
      },
      {
        text: "Puan Maharani",
        correct: false
      },
      {
        text: "Ichsan Moch F,ST",
        correct: false
      },
    ]
  },
  {
    question: "Siapa Presiden ke-4 di Indonesia?",
    answer: [{
        text: "Ir.Soekarno",
        correct: true
      },
      {
        text: "Ir. Jokowi Widodo",
        correct: false
      },
      {
        text: "Puan Maharani",
        correct: false
      },
      {
        text: "Ichsan Moch F,ST",
        correct: false
      },
    ]
  }
];
const questionElement = document.getElementById("question");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");
let currentQuestionIndex;
let score = 0;

function startQuiz() {
  currentQuestionIndex = 0;
  score = 0;
  nextButton.innerHTML = "Next";
  showQuestion();
}

function showQuestion() {
  resetState();
  let currentQuestion = questions[currentQuestionIndex];
  questionElement.innerHTML = (currentQuestionIndex + 1) + ". " + currentQuestion.question;
  currentQuestion.answer.forEach(answer => {
    const button = document.createElement("button");
    button.innerHTML = answer.text;
    button.classList.add("btn");
    answerButtons.appendChild(button);
    if (answer.correct) {
      button.dataset.correct = answer.correct;
    }
    button.addEventListener("click", selectAnswer);
  });
}

function resetState() {
  nextButton.style.display = "none";
  while (answerButtons.firstChild) {
    answerButtons.removeChild(answerButtons.firstChild);
  }
  Array.from(answerButtons.children).forEach(button => {
    if (button.dataset.correct === "true") {
      button.classList.add("correct");
    }
    button.disabled = true;
  });
  nextButton.style.display = "block";
}

function selectAnswer(e) {
  const selectedBtn = e.target;
  const isCorrect = selectedBtn.dataset.correct === "true";
  if (isCorrect) {
    selectedBtn.classList.add("correct");
    score++;
  } else {
    selectedBtn.classList.add("incorrect");
  }
}

function showScore() {
  resetState();
  questionElement.innerHTML = `You Scored ${score} out of ${questions.length}!`;
  nextButton.innerHTML = "Play Again";
  nextButton.style.display = "block";
}

function handleNextButton() {
  currentQuestionIndex++;
  if (currentQuestionIndex < questions.length) {
    showQuestion();
  } else {
    showScore();
  }
}
nextButton.addEventListener("click", () => {
  if (currentQuestionIndex < questions.length) {
    handleNextButton();
  } else {
    startQuiz();
  }
});
startQuiz();
