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

    // Read more
    const contents = document.querySelectorAll('.reference__about-text');
    const readMoreButtons = document.querySelectorAll('.reference__about-link--more');

    contents.forEach((content, i) => {
      const children = content.querySelectorAll('*');

      content.innerHTML = '';
      content.appendChild(children[0]);

      readMoreButtons[i]?.addEventListener('click', () => {
        if (readMoreButtons[i].classList.contains('active')) {
          readMoreButtons[i].textContent = 'Read more';

          content.innerHTML = '';
          content.appendChild(children[0]);

          readMoreButtons[i].classList.remove('active');
        } else {
          readMoreButtons[i].textContent = 'Read less';

          const childrenHTML = [].map.call(children, (child) => {
            return child.outerHTML;
          }).join('');

          content.innerHTML = childrenHTML;

          readMoreButtons[i].classList.add('active');
        }
      });
    });
  });
})();