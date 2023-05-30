const news = [  "Mantenha um registro organizado de todas as transações financeiras da sua empresa para facilitar a análise e o acompanhamento.",
"Faça a conciliação bancária regularmente para garantir a precisão das suas informações financeiras.",
"Realize uma análise detalhada dos seus custos e despesas para identificar oportunidades de redução de gastos.",
"Registre todas as receitas e despesas separadamente por categorias para uma visão clara da saúde financeira do seu negócio.",
"Planeje e acompanhe o fluxo de caixa da sua empresa para evitar surpresas financeiras e garantir a sustentabilidade."
];

let i = 0;
setInterval(() => {
  document.getElementById("news").textContent = news[i];
  i++;
  if (i === news.length) {
    i = 0;
  }
}, 5000);
