function navigate(url) {
  showLoader();
  document.getElementById('progress-bar').firstElementChild.style.width = '100%';
  setTimeout(() => {
    window.location.href = url;
  }, 1000);
}