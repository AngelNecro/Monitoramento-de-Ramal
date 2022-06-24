function request() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "http://localhost/programador_junior-master/lib/ramais.php",
      crossDomain: true,
      dataType: "json",
      method: "GET",
      headers: { "Content-Type": "application/json" },
      success: function (data) {
        resolve(data);
      },
      error: function (error) {
        reject(error);
      },
    });
  });
}

request()
  .then((data) => {
    for (let i in data) {
      $("#cartoes").append(
        `<div class="cartao" id="${data[i].status}" >
            <div class=>${data[i].nome}</div>
            <span class="${data[i].status} icone-posicao"></span>
            <h1>${data[i].usuario}</h1>
        </div>`
      );
    }
  })
  .catch((error) => {
    $(".containerError").append(
      `<div class="error">
            <h1>Todos os ramais encontram-se indisponiveis, tente novamente mais tarde!</h1>
        </div>`
    );
  });
