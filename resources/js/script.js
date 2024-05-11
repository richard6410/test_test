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
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        form.addEventListener('submit', function (e) {
            let hasError = false;
            const startDate = document.getElementById('start-date').value;
            const startTime = document.getElementById('start-time').value;
            const endDate = document.getElementById('end-date').value;
            const endTime = document.getElementById('end-time').value;

            if (!startDate || !startTime || !endDate || !endTime) {
                alert('すべての日付と時刻を入力してください。');
                hasError = true;
            }

            // ここでさらにバリデーションを追加できます（開始が終了前であるかどうかをチェックするなど）

            if (hasError) {
                e.preventDefault(); // フォームの送信を防ぎます
            }
        });
    });



  });
  