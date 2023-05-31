const MODAL_BUTTON = document.getElementById("modal-button");
const MODAL = document.getElementById("modal");
MODAL_BUTTON.addEventListener("click", function() {
  MODAL.classList.add("show-modal");
});
const ADD_QUESTION_BUTTON = document.getElementById("add-question-button");
const QUESTION = document.getElementById("question");
var number_question = 1;
ADD_QUESTION_BUTTON.addEventListener("click", function() {
  var question_container = document.createElement("div");
  question_container.setAttribute("id", "question-" + number_question.toString());
  var delete_question = document.createElement("div");
  delete_question.innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"currentColor\" class=\"bi bi-x-lg\" viewBox=\"0 0 16 16\"><path d=\"M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z\"/></svg>";
  var question = document.createElement("input");
  question.setAttribute("type", "text");
  question.setAttribute("class", "data");
  question.setAttribute("name", "question-" + number_question.toString());
  question.setAttribute("placeholder", "Pregunta " + number_question.toString());
  question.setAttribute("required", "");
  //ADD_QUESTION_BUTTON.insertAdjacentElement("beforebegin", question);
  question_container.appendChild(question);
  question_container.appendChild(delete_question);
  QUESTION.appendChild(question_container);
  number_question += 1;
});