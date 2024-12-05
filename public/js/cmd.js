function navigate(url) {
  showLoader();
  document.getElementById('progress-bar').firstElementChild.style.width = '100%';
  setTimeout(() => {
    window.location.href = url;
  }, 1000);
}


document.getElementById('searchInput').addEventListener('input', function() {
  const query = this.value.toLowerCase(); // Pega o valor da pesquisa e converte para minúsculo
  const rows = document.querySelectorAll('#tableBody .contact-row'); // Pega todas as linhas da tabela
  let resultCount = 0; // Contador de resultados encontrados

  rows.forEach(row => {
      const name = row.cells[1].textContent.toLowerCase(); // Nome
      const phone = row.cells[2].textContent.toLowerCase(); // Contato
      const email = row.cells[3].textContent.toLowerCase(); // E-mail

      // Verifica se algum dos campos contém o texto da pesquisa
      if (name.includes(query) || phone.includes(query) || email.includes(query)) {
          row.style.display = ''; // Exibe a linha
          resultCount++; // Incrementa o contador
      } else {
          row.style.display = 'none'; // Oculta a linha
      }
  });

  // Exibe ou oculta a mensagem "Sem resultados"
  const noResultsMessage = document.getElementById('noResultsMessage');
  if (resultCount === 0 && query !== '') {
      noResultsMessage.style.display = 'block'; // Exibe a mensagem
  } else {
      noResultsMessage.style.display = 'none'; // Oculta a mensagem
  }
});