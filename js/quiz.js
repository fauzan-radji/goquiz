const questionCount = questions.length;

const question = document.getElementById("question");
const choices = {
  a: document.getElementById("choiceTextA"),
  b: document.getElementById("choiceTextB"),
  c: document.getElementById("choiceTextC"),
  d: document.getElementById("choiceTextD"),
};
const choiceElements = [
  document.getElementById("a"),
  document.getElementById("b"),
  document.getElementById("c"),
  document.getElementById("d"),
];
const buttonLanjut = document.getElementById("buttonLanjut");
const buttonLewati = document.getElementById("buttonLewati");
const progressBar = document.getElementById("progress-bar");

const savedQuestion = [];

let lastQuestion;

updateQuestion();

buttonLanjut.addEventListener("click", () => {
  // cek udah diisi belum?
  if (!choiceElements.some((el) => el.checked)) {
    // kasih warning ke user
    return;
  }

  savedQuestion.push({
    questionId: lastQuestion.id,
    answer: choiceElements.find((e) => e.checked).value,
  });

  updateProgress();

  // tinggal satu pertanyaan kah?
  if (questions.length === 1) {
    buttonLanjut.textContent = "SELESAI";
    buttonLewati.parentElement.style.display = "none";
  }

  // cek dah habis belum?
  if (questions.length === 0) {
    setTimeout(() => {
      sendAnswer(JSON.stringify(savedQuestion));
    }, 600);
  }

  resetChoice();
  updateQuestion();
});

buttonLewati.addEventListener("click", () => {
  questions.push(lastQuestion);
  resetChoice();
  updateQuestion();
});

function updateQuestion() {
  lastQuestion = questions.shift();
  question.textContent = lastQuestion.question;
  choices.a.textContent = lastQuestion.choices[0].content;
  choices.b.textContent = lastQuestion.choices[1].content;
  choices.c.textContent = lastQuestion.choices[2].content;
  choices.d.textContent = lastQuestion.choices[3].content;
}

function resetChoice() {
  for (const el of choiceElements) el.checked = false;
}

function updateProgress() {
  const percentage = ((savedQuestion.length / questionCount) * 100).toFixed(2);

  progressBar.style.width = `${percentage}%`;
}

function sendAnswer(answerjson) {
  const form = document.createElement("form");
  form.action = "result.php";
  form.method = "post";
  form.style.display = "none";
  const answerArea = document.createElement("textarea");
  answerArea.name = "answer";
  answerArea.value = answerjson;
  form.appendChild(answerArea);
  const finishTime = document.createElement("input");
  finishTime.type = "number";
  finishTime.name = "finish-time";
  finishTime.value = Date.now();
  form.appendChild(finishTime);

  document.body.appendChild(form);

  form.submit();
}
