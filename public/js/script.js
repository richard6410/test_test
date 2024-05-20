document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('add-button').addEventListener('click', function() {
      const form = document.querySelector('form');
      const newEntry = document.querySelector('.date-time-entry').cloneNode(true);
      newEntry.querySelectorAll('input').forEach(input => input.value = '');
      form.insertBefore(newEntry, this);
    });
  
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('delete-btn')) {
        e.target.parentElement.remove();
      }
    });
  });

document.getElementById('image').onchange = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('image-preview');
        output.src = reader.result;
        output.style.display = 'block';  // プレビューを表示
    };
    reader.readAsDataURL(event.target.files[0]);
};
  