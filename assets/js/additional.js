'use strict';

(function () {
  document.addEventListener('DOMContentLoaded', () => {
    // Files

    const fileInputs = document.querySelectorAll('input[type="file"');
    if (fileInputs.length > 0) {
      fileInputs.forEach((fileInput) => {
        fileInput.addEventListener('change', () => {
          const files = fileInput.files;
          let filesNames = [];

          if (fileInput.closest('label')) {
            for (var i = 0; i < files.length; i++) {
              filesNames.push(files[i].name);
            }

            fileInput.closest('label').dataset.file = filesNames.join(', ');
          }
        });
      });
    }
  });
})();