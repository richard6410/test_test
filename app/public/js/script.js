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
  