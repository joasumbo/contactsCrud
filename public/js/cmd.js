function navigate(url) {
  showLoader();
  document.getElementById('progress-bar').firstElementChild.style.width = '100%';
  setTimeout(() => {
    window.location.href = url;
  }, 1000);
}


document.getElementById('searchInput').addEventListener('input', function() {
  const query = this.value.toLowerCase(); 
  const rows = document.querySelectorAll('#tableBody .contact-row'); 
  let resultCount = 0; 

  rows.forEach(row => {
      const name = row.cells[1].textContent.toLowerCase(); 
      const phone = row.cells[2].textContent.toLowerCase(); 
      const email = row.cells[3].textContent.toLowerCase(); 

      if (name.includes(query) || phone.includes(query) || email.includes(query)) {
          row.style.display = ''; 
          resultCount++; 
      } else {
          row.style.display = 'none'; 
      }
  });

  const noResultsMessage = document.getElementById('noResultsMessage');
  if (resultCount === 0 && query !== '') {
      noResultsMessage.style.display = 'block'; 
  } else {
      noResultsMessage.style.display = 'none'; 
  }
});