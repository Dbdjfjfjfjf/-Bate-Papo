/* formulario de contato js*/

const form = document.querySelector("#contact-form");

form.addEventListener("submit", function(event) {
  event.preventDefault();
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "submit-form.php");
  xhr.onload = function() {
    if (xhr.status === 200) {
      alert("Sua mensagem foi enviada com sucesso!");
      form.reset();
    } else {
      alert("Houve um problema ao enviar sua mensagem. Tente novamente mais tarde.");
    }
  };
  xhr.send(formData);
});
