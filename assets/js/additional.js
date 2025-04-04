'use strict';

(function ($) {
  document.addEventListener('DOMContentLoaded', () => {
    try {
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
      const readMoreButtons = document.querySelectorAll('.reference__about-link--more');

      readMoreButtons.forEach((readMoreButton, i) => {
        const content = readMoreButton.previousElementSibling;
        const children = content.querySelectorAll('p, ul, ol');

        content.innerHTML = '';
        content.appendChild(children[0]);

        readMoreButton.addEventListener('click', () => {
          if (readMoreButton.classList.contains('active')) {
            readMoreButton.textContent = 'Read more';

            content.innerHTML = '';
            content.appendChild(children[0]);

            readMoreButton.classList.remove('active');
          } else {
            readMoreButton.textContent = 'Read less';

            const childrenHTML = [].map.call(children, (child) => {
              return child.outerHTML;
            }).join('');

            content.innerHTML = childrenHTML;

            readMoreButton.classList.add('active');
          }
        });
      });

      // Show more projects

      const showMoreButton = document.querySelector('.completed-projects__btn--show-more');

      if (showMoreButton) {
        showMoreButton.addEventListener('click', (evt) => {
          evt.preventDefault();
          evt.stopPropagation();

          getNextPage(showMoreButton);
        });
      }

      const getNextPage = (button) => {
        const termId = button.dataset.termId ?? -1;
        const paged = button.dataset.paged ?? 1;

        getAjaxData(termId, paged);
      };

      const getAjaxData = (termId, paged) => {
        const postPerpage = 6;

        let data = new FormData();
        data.append('action', 'enercor_projects_list');
        data.append('security', enercor_ajax.nonce);
        data.append('posts_per_page', postPerpage);
        data.append('paged', paged);
        data.append('term_id', termId);

        const dataAjaxContainer = document.querySelector('#international-project-ajax');

        $.ajax({
          url: enercor_ajax.url,
          data: data,
          type: 'POST',
          dataType: 'json',
          // отключаем обработку передаваемых данных, пусть передаются как есть
          processData: false,
          // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
          contentType: false,
          beforeSend: (response) => {
            showMoreButton?.classList.add('sending');
          },
          success: (response) => {
            // console.log(response);

            showMoreButton?.classList.remove('sending');

            if (response.success === true && dataAjaxContainer) {
              dataAjaxContainer.innerHTML += response.data.content;

              const projects = dataAjaxContainer.querySelectorAll(".completed-projects--slide")
              // console.log(projects);
              window.activateProjectsPopup(projects);

              if (response.data.show_more.visibility === false) {
                showMoreButton.remove();
              } else {
                showMoreButton.dataset.paged = response.data.show_more.next_page;
              }
            }
          },
          error: (response) => {
            console.log(response);

            showMoreButton?.classList.remove('sending');
          }
        });
      };
    } catch (error) {
      console.log(error);
    }
  });
})(jQuery);