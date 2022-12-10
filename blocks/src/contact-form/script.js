import apiFetch from '@wordpress/api-fetch';

const form = document.querySelector('#contact_form');

if (form) {
  form.addEventListener('submit', e => {
    e.preventDefault();

    const name = form.querySelector('#name').value;
    const email = form.querySelector('#email').value;
    const message = form.querySelector('#message').value;

    document.querySelector('.frm-message').style.display = 'block';
    document.querySelector('.frm-message').classList.remove('alert-danger', 'alert-success', 'd-none');
    document.querySelector('.frm-message').innerText = 'Sending...';
    document.querySelector('#submit').disabled = true;


    const datosJSON = {
      nonce: contact_form.contact_formNonce,
      name,
      email,
      message
    };

    console.log(datosJSON);

    apiFetch({
      path: 'contact_form/v1/admin-ajax',
      method: 'POST',
      data: datosJSON,
    })
      .then(response => {
        console.table(response);
					const noticeClass = response.status === 1 ? 'alert-success' : 'alert-danger';
          const element = document.querySelector('.frm-message');
          element.classList.remove('alert-danger', 'alert-success', 'd-none');
          element.classList.add(noticeClass);
          element.innerText = response.message;
      }).catch(err => console.log(err))
      .finally(() => {
        document.getElementById('submit').disabled = false;
        document.getElementById('contact_form').reset();
      });

  });
}