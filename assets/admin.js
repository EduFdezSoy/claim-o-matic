document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    const $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.classList.add('noti');
    });
  });
});

function trOver(element) {
  element.classList.add('is-selected')
}

function trOverOut(element) {
  element.classList.remove('is-selected')
}

function removeRow(row, element) {
  element.disabled = true;

  fetch('/requests/remove.php?row=' + row, {
    method: 'get',
  })
    .then(res => {
      if (res.status == 200) {
        location.reload()
      } else {
        document.getElementById('noti-error').classList.remove('noti')
      }
    })

}