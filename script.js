const spinnerWrapperEl = document.getElementById('spinner-wrapper');
window.addEventListener('load', () => {
   spinnerWrapperEl.style.opacity = '0';

   setTimeout(() => {
    spinnerWrapperEl.style.display = 'none';
   }, 200);
});
    