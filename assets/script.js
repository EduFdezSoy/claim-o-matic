window.onload = function () {
  let val = ''
  if (localStorage.getItem('username') != null) val = localStorage.getItem('username');
  document.getElementById('username').value = val


}

function clearForm() {
  document.getElementById('name').value = '';
  document.getElementById('extra').value = '';
}

function saveContent() {
  localStorage.setItem('username', document.getElementById('username').value);

}

function sendForm() {
  const formdata = new FormData(document.getElementById('form'));
  const data = new URLSearchParams(formdata);

  fetch('/requests/register.php', {
    method: 'post',
    body: data,
  })
    .then(res => {
      console.log(res)
      document.getElementById('submit').classList.remove("is-loading")

      if (res.status == 200) {
        clearForm()
        document.getElementById('noti-success').classList.remove('noti')
      } else {
        document.getElementById('noti-error').classList.remove('noti')
      }
    })
}

function submitForm() {
  saveContent()
  sendForm()

  document.getElementById('submit').classList.add("is-loading")
}

document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    const $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.classList.add('noti');
    });
  });
});