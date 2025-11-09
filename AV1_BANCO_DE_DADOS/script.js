
function obterTextos() {
  return JSON.parse(localStorage.getItem("textos")) || [];
}

function salvarTextos(textos) {
  localStorage.setItem("textos", JSON.stringify(textos));
}

function criarTexto() {
  const input = document.getElementById("textoInput");
  const texto = input.value.trim();
  if (!texto) return alert("Digite algo!");

  const textos = obterTextos();
  textos.push(texto);
  salvarTextos(textos);
  input.value = "";
  listarTextos();
}

function listarTextos() {
  const ul = document.getElementById("listaTextos");
  const textos = obterTextos();
  ul.innerHTML = "";

  textos.forEach((t, i) => {
    const li = document.createElement("li");
    li.innerHTML = `
      ${t}
      <button onclick="alterarTexto(${i})">✏️</button>
      <button onclick="excluirTexto(${i})">🗑️</button>
    `;
    ul.appendChild(li);
  });
}

function alterarTexto(index) {
  const textos = obterTextos();
  const novo = prompt("Digite o novo texto:", textos[index]);
  if (novo !== null && novo.trim() !== "") {
    textos[index] = novo.trim();
    salvarTextos(textos);
    listarTextos();
  }
}

function excluirTexto(index) {
  const textos = obterTextos();
  textos.splice(index, 1);
  salvarTextos(textos);
  listarTextos();
}


function obterPerguntas() {
  return JSON.parse(localStorage.getItem("perguntas")) || [];
}

function salvarPerguntas(perguntas) {
  localStorage.setItem("perguntas", JSON.stringify(perguntas));
}

function criarPergunta() {
  const input = document.getElementById("perguntaInput");
  const pergunta = input.value.trim();
  if (!pergunta) return alert("Digite algo!");

  const perguntas = obterPerguntas();
  perguntas.push(pergunta);
  salvarPerguntas(perguntas);
  input.value = "";
  listarPerguntas();
}

function listarPerguntas() {
  const ul = document.getElementById("listaPerguntas");
  const perguntas = obterPerguntas();
  ul.innerHTML = "";

  perguntas.forEach((p, i) => {
    const li = document.createElement("li");
    li.innerHTML = `
      ${p}
      <button onclick="alterarPergunta(${i})">✏️</button>
      <button onclick="excluirPergunta(${i})">🗑️</button>
    `;
    ul.appendChild(li);
  });
}

function alterarPergunta(index) {
  const perguntas = obterPerguntas();
  const novo = prompt("Digite a nova pergunta:", perguntas[index]);
  if (novo !== null && novo.trim() !== "") {
    perguntas[index] = novo.trim();
    salvarPerguntas(perguntas);
    listarPerguntas();
  }
}

function excluirPergunta(index) {
  const perguntas = obterPerguntas();
  perguntas.splice(index, 1);
  salvarPerguntas(perguntas);
  listarPerguntas();
}


window.onload = function () {
  listarTextos();
  listarPerguntas();
};
