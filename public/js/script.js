//delivery
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('add-delivery-time').addEventListener('click', function() {
      const container = document.getElementById('delivery-time-container');
      const newEntry = container.querySelector('.delivery-time-item').cloneNode(true);
      newEntry.querySelectorAll('input').forEach(input => input.value = '');
      container.appendChild(newEntry);
  });

  document.addEventListener('click', function(e) {
      if (e.target.classList.contains('remove-delivery-time')) {
          e.target.closest('.delivery-time-item').remove();
      }
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
});