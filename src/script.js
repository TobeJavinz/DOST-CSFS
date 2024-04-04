// start: Sidebar
const sidebarToggle = document.querySelector(".sidebar-toggle");
const sidebarOverlay = document.querySelector(".sidebar-overlay");
const sidebarMenu = document.querySelector(".sidebar-menu");
const main = document.querySelector(".main");
if (window.innerWidth < 768) {
  main.classList.toggle("active");
  sidebarOverlay.classList.toggle("hidden");
  sidebarMenu.classList.toggle("-translate-x-full");
}
sidebarToggle.addEventListener("click", function (e) {
  e.preventDefault();
  main.classList.toggle("active");
  sidebarOverlay.classList.toggle("hidden");
  sidebarMenu.classList.toggle("-translate-x-full");
});
sidebarOverlay.addEventListener("click", function (e) {
  e.preventDefault();
  main.classList.add("active");
  sidebarOverlay.classList.add("hidden");
  sidebarMenu.classList.add("-translate-x-full");
});
document.querySelectorAll(".sidebar-dropdown-toggle").forEach(function (item) {
  item.addEventListener("click", function (e) {
    e.preventDefault();
    const parent = item.closest(".group");
    if (parent.classList.contains("selected")) {
      parent.classList.remove("selected");
    } else {
      document
        .querySelectorAll(".sidebar-dropdown-toggle")
        .forEach(function (i) {
          i.closest(".group").classList.remove("selected");
        });
      parent.classList.add("selected");
    }
  });
});
// end: Sidebar

// start: Popper
const popperInstance = {};
document.querySelectorAll(".dropdown").forEach(function (item, index) {
  const popperId = "popper-" + index;
  const toggle = item.querySelector(".dropdown-toggle");
  const menu = item.querySelector(".dropdown-menu");
  menu.dataset.popperId = popperId;
  popperInstance[popperId] = Popper.createPopper(toggle, menu, {
    modifiers: [
      {
        name: "offset",
        options: {
          offset: [0, 8],
        },
      },
      {
        name: "preventOverflow",
        options: {
          padding: 24,
        },
      },
    ],
    placement: "bottom-end",
  });
});
document.addEventListener("click", function (e) {
  const toggle = e.target.closest(".dropdown-toggle");
  const menu = e.target.closest(".dropdown-menu");
  if (toggle) {
    const menuEl = toggle.closest(".dropdown").querySelector(".dropdown-menu");
    const popperId = menuEl.dataset.popperId;
    if (menuEl.classList.contains("hidden")) {
      hideDropdown();
      menuEl.classList.remove("hidden");
      showPopper(popperId);
    } else {
      menuEl.classList.add("hidden");
      hidePopper(popperId);
    }
  } else if (!menu) {
    hideDropdown();
  }
});

function hideDropdown() {
  document.querySelectorAll(".dropdown-menu").forEach(function (item) {
    item.classList.add("hidden");
  });
}
function showPopper(popperId) {
  popperInstance[popperId].setOptions(function (options) {
    return {
      ...options,
      modifiers: [
        ...options.modifiers,
        { name: "eventListeners", enabled: true },
      ],
    };
  });
  popperInstance[popperId].update();
}
function hidePopper(popperId) {
  popperInstance[popperId].setOptions(function (options) {
    return {
      ...options,
      modifiers: [
        ...options.modifiers,
        { name: "eventListeners", enabled: false },
      ],
    };
  });
}
// end: Popper

// const groups = document.querySelectorAll(".group");
// groups.forEach((groups) => {
//   groups.addEventListener("click", () => {
//     groups.classList.add("active");
//   });
// });

// const showPasswordCheckbox = document.getElementById("showPassword");
// const passwordField = document.getElementById("password");

// showPasswordCheckbox.addEventListener("change", function () {
//   const type = showPasswordCheckbox.checked ? "text" : "password";
//   passwordField.setAttribute("type", type);
// });

const logshowPasswordCheckbox = document.getElementById("logshowPassword");
const logpasswordField = document.getElementById("logpassword");

logshowPasswordCheckbox.addEventListener("change", function () {
  const type = logshowPasswordCheckbox.checked ? "text" : "password";
  logpasswordField.setAttribute("type", type);
});