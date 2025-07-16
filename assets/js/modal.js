function setCookie(name, value, days) {
  const expires = new Date(Date.now() + days * 864e5).toUTCString();
  document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=/';
}

function getCookie(name) {
  return document.cookie.split('; ').reduce((r, v) => {
    const parts = v.split('=');
    return parts[0] === name ? decodeURIComponent(parts[1]) : r;
  }, '');
}

document.addEventListener('DOMContentLoaded', () => {
  const overlay = document.querySelector('.modal-overlay');
  const closeBtn = document.querySelector('.modal__close');
  const cookieName = 'modal_shown';

  if (getCookie(cookieName) === '1') {
    overlay.style.display = 'none';
    return;
  }

  overlay.style.display = 'flex';
  setCookie(cookieName, '1', 365);

  closeBtn.addEventListener('click', () => {
    overlay.style.display = 'none';
  });
});