// import "./styles.scss";

// import json from "./resources/projects.json";
// import { list } from "postcss";

// const projectList = Object.entries(json);
// const projects = document.querySelector("main");
// const toggleProjectBtn = projects.querySelector("[data-show]");

// const projectCard = document.querySelector("[card-item]");
// const projectCardPreview = document.querySelector("[card-preview]");

// projects.addEventListener(
//   "click",
//   (event) => {
//     event.stopPropagation();
//     if (event.target.tagName === "BUTTON" && event.target.parentElement.classList.contains("card-item"))
//       showModal(event.target.dataset.preview);

//     if (event.target === toggleProjectBtn) {
//       if (event.target.dataset.show === "show") {
//         listAllProjects(event.target);
//       } else if (event.target.dataset.show === "hide") {
//         removeAllProjects(event.target);
//         event.target.dataset.show = "show";
//       }
//     }
//   },
//   { passive: true }
// );

// function bootProjects() {
//   let list = projects.querySelector(".project-list");

//   list.innerHTML = "";

//   for (let index = 0; index < 3; index++) {
//     list.appendChild(createCard(projectList[index][1], index));
//   }
// }

// function listAllProjects(button) {
//   let list = projects.querySelector(".project-list");
//   let delay = 0;

//   for (let index = 3; index < projectList.length; index++) {
//     setTimeout(() => {
//       list.appendChild(createCard(projectList[index][1], index));
//     }, delay);
//     delay += 300;
//   }
//   setTimeout(() => {
//     button.dataset.show = "hide";
//     button.textContent = "Ver menos";
//   }, delay - 250);
// }

// function removeAllProjects(button) {
//   let list = projects.querySelector(".project-list");
//   let delay = 0;

//   for (let index = projectList.length - 1; index >= 3; index--) {
//     setTimeout(() => {
//       list.querySelectorAll(".card")[index].classList.add("close");
//       list.querySelectorAll(".card")[index].addEventListener(
//         "animationend",
//         () => {
//           list.querySelectorAll(".card")[index].remove();
//         },
//         { once: true }
//       );
//     }, delay);
//     delay += 300;
//   }

//   setTimeout(() => {
//     button.dataset.show = "show";
//     button.textContent = "Ver mais";
//   }, delay - 200);
// }

// function createCard(project, position) {
//   let card = project.status ? projectCard.content.cloneNode(true) : projectCardPreview.content.cloneNode(true);
//   let imagePrefix = "./assets/images/";

//   card.querySelector("h3").textContent = project.title;
//   card.querySelector("p").innerHTML = project.description;
//   if (project.images[0]) card.querySelector("img").src = `${imagePrefix}${project.images[0]}`;
//   card.querySelector("img").alt = `Imagem do projeto ${project.title}`;
//   card.querySelector("button").dataset.preview = position;

//   return card;
// }

// // Modal

// const modal = document.querySelector(".modal");
// const modalCloseBtn = modal.querySelector("[close-btn]");

// modal.addEventListener("click", (event) => {
//   if (event.target.parentElement === modalCloseBtn) closeModal();

//   var rect = modal.getBoundingClientRect();
//   var isInDialog =
//     rect.top <= event.clientY &&
//     event.clientY <= rect.top + rect.height &&
//     rect.left <= event.clientX &&
//     event.clientX <= rect.left + rect.width;

//   if (!isInDialog) closeModal();
// });

// function showModal(id) {
//   let project = projectList[id][1];

//   if (project.images.length !== 0) {
//     let carousel = modal.querySelector(".carousel");
//     carousel.innerHTML = "";

//     for (const image of project.images) {
//       carousel.innerHTML += `
//     <img
//     src="./assets/images/${image}"
//     alt="Imagem do projeto ${project.title}"
//         loading="lazy"
//         onerror="this.src='./assets/images/crop-unsplash-sxiSod0tyYQ.jpg';this.onerror='';"
//         />
//         `;
//     }
//   }

//   let tags = modal.querySelector(".tags");
//   tags.innerHTML = "";
//   for (const tag in project.tags) {
//     if (Object.hasOwnProperty.call(project.tags, tag)) {
//       tags.innerHTML += `<span class="tag ${project.tags[tag]}">${tag}</span>`;
//     }
//   }

//   let credits = modal.querySelector(".credits");
//   credits.innerHTML = Object.keys(project.credits).length === 0 ? "" : "<h3>Créditos</h3>";
//   for (const credit in project.credits) {
//     if (Object.hasOwnProperty.call(project.credits, credit)) {
//       credits.innerHTML += `<span>${project.credits[credit][0]} <a href="${project.credits[credit][1]}">${credit}</a></span>`;
//     }
//   }

//   modal.querySelector("h1").textContent = project.title;

//   let description = modal.querySelector(".description");
//   description.innerHTML = "";
//   for (const desc of project.html_description) {
//     description.innerHTML += `${desc}`;
//   }

//   let btn = document.querySelectorAll(".btns a");

//   btn[0].tabIndex = project.git[0] ? "0" : "-1";
//   btn[0].classList.toggle("disabled", !project.git[0]);
//   btn[0].href = project.git[1];

//   btn[1].tabIndex = project.demo[0] ? "0" : "-1";
//   btn[1].classList.toggle("disabled", !project.demo[0]);
//   btn[1].href = project.demo[1];

//   btn[2].tabIndex = project.pkg[0] ? "0" : "-1";
//   btn[2].classList.toggle("disabled", !project.pkg[0]);
//   btn[2].href = project.pkg[1];

//   modal.showModal();
// }

// function closeModal() {
//   modal.setAttribute("closing", "");

//   modal.addEventListener(
//     "animationend",
//     () => {
//       modal.removeAttribute("closing");
//       modal.close();
//     },
//     { once: true }
//   );
// }

// // boot

// bootProjects();

import "./styles.scss";

import json from "./resources/projects.json";

import axios from "axios";
import FormData from "form-data";

// Modal

const modal = document.querySelector(".modal");
const modalCloseBtn = modal.querySelector("[close-btn]");

window.loadDialog = (element) => {
  let project = projectList[element.dataset.preview][1];

  if (project.images.length !== 0) {
    let carousel = modal.querySelector(".carousel");
    carousel.innerHTML = "";

    for (const image of project.images) {
      carousel.innerHTML += [
        '<img loading="lazy"',
        `src="./assets/images/${image}"`,
        `alt="Imagem do projeto ${project.title}"`,
        `onerror="this.src='./assets/images/crop-unsplash-sxiSod0tyYQ.jpg';this.onerror='';"`,
        "/>",
      ].join("");
    }
  } else {
    let carousel = modal.querySelector(".carousel");
    carousel.innerHTML = [
      '<img loading="lazy"',
      `src=""`,
      `alt="Sem imagem do projeto"`,
      `onerror="this.src='./assets/images/crop-unsplash-sxiSod0tyYQ.jpg';this.onerror='';"`,
      "/>",
    ].join("");
  }

  let tags = modal.querySelector(".tags");
  tags.innerHTML = "";
  for (const tag in project.tags) {
    if (Object.hasOwnProperty.call(project.tags, tag)) {
      tags.innerHTML += `<span class="tag ${project.tags[tag]}">${tag}</span>`;
    }
  }

  let credits = modal.querySelector(".credits");
  credits.innerHTML = Object.keys(project.credits).length === 0 ? "" : "<h3>Créditos</h3>";
  for (const credit in project.credits) {
    if (Object.hasOwnProperty.call(project.credits, credit)) {
      credits.innerHTML += `<span>${project.credits[credit][0]} <a href="${project.credits[credit][1]}">${credit}</a></span>`;
    }
  }

  modal.querySelector("h1").textContent = project.title;

  let description = modal.querySelector(".description");
  description.innerHTML = "";
  for (const desc of project.html_description) {
    description.innerHTML += `${desc}`;
  }

  Object.entries(document.querySelectorAll(".btns a")).map((btn) => {
    let type = btn[1].hasAttribute("github") ? project.git : btn[1].hasAttribute("demo") ? project.demo : project.pkg;
    btn[1].tabIndex = type[0] ? "0" : "-1";
    btn[1].classList.toggle("disabled", !type[0]);
    btn[1].href = type[1];
  });

  document.body.classList.add("onModal");
  modal.showModal();
};

modal.addEventListener("click", (event) => {
  if (event.target.parentElement === modalCloseBtn) closeModal();

  var rect = modal.getBoundingClientRect();
  var isInDialog =
    rect.top <= event.clientY &&
    event.clientY <= rect.top + rect.height &&
    rect.left <= event.clientX &&
    event.clientX <= rect.left + rect.width;

  if (!isInDialog) closeModal();
});

function closeModal() {
  modal.setAttribute("closing", "");

  modal.addEventListener(
    "animationend",
    () => {
      modal.removeAttribute("closing");
      document.body.classList.remove("onModal");
      modal.close();
    },
    { once: true }
  );
}

// Projects

const projectList = Object.entries(json);
const projectDOM = document.querySelector("main");
const toggleProjectBtn = projectDOM.querySelector("[data-show]");
const ProjectInDOM = projectDOM.querySelector(".project-list");

const imagePrefix = "./assets/images/";

const templateProjectCardItem = document.querySelector("[card-item]");
const templateProjectCardPrev = document.querySelector("[card-preview]");

(() => {
  console.log("boot first three projects");

  ProjectInDOM.innerHTML = "";

  projectList.slice(0, 3).map((project) => {
    ProjectInDOM.appendChild(createProjectCard(project[1], project[0]));
  });
})();

function createProjectCard(project, position) {
  let card = project.status
    ? templateProjectCardItem.content.cloneNode(true)
    : templateProjectCardPrev.content.cloneNode(true);

  card.querySelector("h3").textContent = project.title;
  card.querySelector("p").innerHTML = project.description;
  if (project.images[0]) card.querySelector("img").src = `${imagePrefix}${project.images[0]}`;
  card.querySelector("img").alt = `Imagem do projeto ${project.title}`;
  card.querySelector("button").dataset.preview = position;

  return card;
}

window.toggleProjectList = (element) => {
  let delay = 0;

  if (element.dataset.action === "show") {
    projectList.slice(3).map((project) => {
      setTimeout(() => {
        ProjectInDOM.appendChild(createProjectCard(project[1], project[0]));
      }, delay);
      delay += 300;
    });

    var content = "Ver menos";
    var action = "hide";
  }

  if (element.dataset.action === "hide") {
    projectList
      .slice(3)
      .reverse()
      .map((project) => {
        setTimeout(() => {
          ProjectInDOM.querySelectorAll(".card")[project[0]].classList.add("close");
          ProjectInDOM.querySelectorAll(".card")[project[0]].addEventListener(
            "animationend",
            () => {
              ProjectInDOM.querySelectorAll(".card")[project[0]].remove();
            },
            { once: true }
          );
        }, delay);
        delay += 300;
      });

    var content = "Ver mais";
    var action = "show";
  }

  setTimeout(() => {
    element.dataset.action = action;
    element.textContent = content;
  }, delay - 250);
};

// Form

const form = document.querySelector("form");
const successfulSubmit = document.querySelector(".contact .success");
const unsuccessfulSubmit = document.querySelector(".contact .failure");

form.onsubmit = (e) => {
  e.preventDefault();

  form.querySelector("input[type='submit']").style.display = "none";
  form
    .querySelector("input[type='submit']")
    .insertAdjacentHTML(
      "afterend",
      '<button class="btn-fill spinner lock"><i class="spin fas fa-circle-notch"></i></button>'
    );

  sendForm();
};

function sendForm() {
  let path = window.location.pathname;
  let dataToForm = new FormData();

  path = path.substring(0, path.lastIndexOf("/")) + "/sendmail.php";

  dataToForm.append("token", form.elements["token"].value);
  dataToForm.append("name", form.elements["name"].value);
  dataToForm.append("email", form.elements["email"].value);
  dataToForm.append("message", form.elements["message"].value);

  axios({
    method: "post",
    url: path,
    data: dataToForm,
    headers: { "Content-Type": "multipart/form-data" },
  })
    .then(function (response) {
      form.style.display = "none";
      unsuccessfulSubmit.style.display = "none";
      successfulSubmit.style.display = "flex";
    })
    .catch(function (error) {
      unsuccessfulSubmit.querySelector("button:first-child").classList.remove("lock");
      unsuccessfulSubmit.querySelector("button:last-child").classList.remove("lock");
      unsuccessfulSubmit.querySelector("button:last-child").innerHTML = "Enviar novamente!";
      form.style.display = "none";
      successfulSubmit.style.display = "none";
      unsuccessfulSubmit.style.display = "flex";
    });
}

window.returnForm = (element, cleanForm = false) => {
  form.removeChild(form.querySelector(".spinner"));
  form.querySelector("input[type='submit']").style.display = "";

  if (cleanForm) form.reset();

  form.style.display = "flex";
  successfulSubmit.style.display = "none";
  unsuccessfulSubmit.style.display = "none";
};

window.retryForm = (element) => {
  unsuccessfulSubmit.querySelector("button:first-child").classList.add("lock");
  unsuccessfulSubmit.querySelector("button:last-child").classList.add("lock");
  unsuccessfulSubmit.querySelector("button:last-child").innerHTML = `<i class="spin fas fa-circle-notch"></i>`;

  sendForm();
};

// Nav Mobile

const menuBtn = document.querySelector(".menu-btn");
const navMobile = document.querySelector("nav.sm");

menuBtn.onclick = () => {
  toggleNavMobile();
};

function toggleNavMobile() {
  let toggle = menuBtn.hasAttribute("open");

  menuBtn.toggleAttribute("open", !toggle);
  navMobile.toggleAttribute("open", !toggle);
  document.body.classList.toggle("onModal", !toggle);
}

navMobile.onclick = (e) => {
  if (e.target.tagName === "A") {
    toggleNavMobile();
  }
};
