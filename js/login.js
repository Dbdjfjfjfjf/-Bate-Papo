// Seletor dos elementos da página
const loginForm = document.querySelector("#login-form");
const usernameInput = document.querySelector("#username");
const passwordInput = document.querySelector("#password");
const memberList = document.querySelector("#member-list");

// Array com os membros cadastrados
const members = [
  { username: "johndoe", password: "password123", name: "John Doe" },
  { username: "janedoe", password: "qwertyuiop", name: "Jane Doe" },
  { username: "bobsmith", password: "letmein123", name: "Bob Smith" },
];

// Função para fazer o login
function login(event) {
  event.preventDefault();
  const username = usernameInput.value;
  const password = passwordInput.value;
  const member = members.find((member) => member.username === username && member.password === password);
  if (member) {
    // Se o login for bem-sucedido, mostra a lista de membros
    showMemberList(member);
  } else {
    // Se o login falhar, exibe uma mensagem de erro
    alert("Nome de usuário ou senha incorretos. Tente novamente.");
  }
}

// Função para mostrar a lista de membros
function showMemberList(member) {
  // Esconde o formulário de login
  loginForm.style.display = "none";

  // Cria um cabeçalho com o nome do usuário
  const header = document.createElement("h2");
  header.textContent = `Bem-vindo(a), ${member.name}!`;

  // Cria uma lista com os membros
  const list = document.createElement("ul");
  members.forEach((m) => {
    const item = document.createElement("li");
    item.textContent = m.name;
    list.appendChild(item);
  });

  // Adiciona o cabeçalho e a lista à página
  memberList.appendChild(header);
  memberList.appendChild(list);
}

// Adiciona um ouvinte de eventos ao formulário de login
loginForm.addEventListener("submit", login);
