const questions = [
  {
    id: 0,
    question: "Siapakah nama Anda?",
    choices: [
      {
        id: "a",
        content: "Boruto",
      },
      {
        id: "b",
        content: "Naruto",
      },
      {
        id: "c",
        content: "Hinata",
      },
      {
        id: "d",
        content: "Himawari",
      },
    ],
  },
  {
    id: 1,
    question: "Siapakah Bapak Anda?",
    choices: [
      {
        id: "a",
        content: "Asep",
      },
      {
        id: "b",
        content: "Jamet",
      },
      {
        id: "c",
        content: "Melek",
      },
      {
        id: "d",
        content: "Kausu",
      },
    ],
  },
  {
    id: 2,
    question: "Siapakah Mama Anda?",
    choices: [
      {
        id: "a",
        content: "Bapak Anda",
      },
      {
        id: "b",
        content: "Kakak Anda",
      },
      {
        id: "c",
        content: "Nenek Anda",
      },
      {
        id: "d",
        content: "Mamak Anda",
      },
    ],
  },
];

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

  savedQuestion.push({
    questionId: lastQuestion.id,
    answer: choiceElements.find((e) => e.checked).value,
  });

  resetChoice();
  updateProgress();
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
  form.action = "result.html";
  form.method = "post";
  form.style.display = "none";
  const answerArea = document.createElement("textarea");
  answerArea.name = "answer";
  answerArea.value = answerjson;

  document.body.appendChild(form);
  form.submit();
}
