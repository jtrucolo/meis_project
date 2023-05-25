// Obtém a referência para o elemento de input
const inputValorServico = document.getElementById('valor_servico');

// Função para formatar o valor em moeda brasileira
function formatarMoeda(valor) {
  const formatter = new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL',
    minimumFractionDigits: 2,
  });
  return formatter.format(valor);
}

// Função para atualizar o valor do input formatado quando o usuário digitar
function atualizarValorFormatado() {
  const valor = parseFloat(inputValorServico.value.replace(/\D/g, '')) / 100;
  if (!isNaN(valor)) {
    inputValorServico.value = formatarMoeda(valor);
  }
}

// Evento que dispara quando o usuário digita no input
inputValorServico.addEventListener('input', atualizarValorFormatado);
