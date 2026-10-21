(() => {
 const lightbox = document.querySelector('.lightbox');
 if (!lightbox) return;
 const image = lightbox.querySelector('img');
 const caption = lightbox.querySelector('figcaption');
 const closeButton = lightbox.querySelector('.lightbox-close');
 let previousFocus = null;
 const close = () => { lightbox.classList.remove('open'); lightbox.setAttribute('aria-hidden','true'); document.body.style.overflow=''; if (previousFocus) previousFocus.focus(); };
 document.querySelectorAll('[data-lightbox]').forEach(button => button.addEventListener('click', () => {
   previousFocus = button; image.src = button.dataset.src; image.alt = button.dataset.alt || ''; caption.textContent = button.dataset.caption || ''; lightbox.classList.add('open'); lightbox.setAttribute('aria-hidden','false'); document.body.style.overflow='hidden'; closeButton.focus();
 }));
 closeButton.addEventListener('click', close);
 lightbox.addEventListener('click', event => { if (event.target === lightbox) close(); });
 document.addEventListener('keydown', event => { if (event.key === 'Escape' && lightbox.classList.contains('open')) close(); });
})();
