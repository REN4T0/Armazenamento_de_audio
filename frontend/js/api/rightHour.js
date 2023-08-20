// Ao iniciar a página, a função já inicia
document.addEventListener('DOMContentLoaded', () => {
    getHours();
});

// Dentro dessa função, a API consumida é referente a data e hora atual. Evita usar o horário que é fornecido pelo hardware, que tem grande chance de estar errado
async function getHours(){
    const url = "http://worldtimeapi.org/api/timezone/America/Sao_Paulo";
    const response = await fetch(url);
    const result = await response.json();
    const data = result['datetime'];

    // O valor recebido vem cheio de datalhes, então é enviado para outra função que irá tratar a informação do dado, selecionando apenas a data e a hora
    filterData(data);
}

function filterData(dataProcess){
    // Selecionando os caracteres que será usado
    const dataFiltered = dataProcess.substring(0, 19);
    // Eliminando um caractere indesejado
    const dateTime = dataFiltered.replace(/T/i, " ");

    document.querySelector("#dateTimeInput").value = dateTime;
}

// A cada segundo o horário é atualizado
const UpdateHour = setInterval(getHours, 1000);