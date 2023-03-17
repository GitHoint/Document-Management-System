(function () {
  const linksToAdd = [
    { name: "Search", link: "search.php" },
    { name: "Upload", link: "upload.php" },
    { name: "Users", link: "users.php" },
    { name: "Add User", link: "addUser.php" },
  ];
  const loginLink = {
    name: "Login",
    link: "index.php"
  }

  const logoutLink = {
    name: "Logout",
    link: "logout.php"
  }

  function addLinks(links, list) {
    links.forEach(item => {
      let li = document.createElement("li");
      if (item.isUserName) {
        let span = document.createElement("span");
        span.setAttribute("class", "nav-username");
        span.textContent = item.name;
        li.appendChild(span);
      }
      else {
        let a = document.createElement("a");
        a.setAttribute("class", "nav-link");
        a.setAttribute("href", item.link);
        a.textContent = item.name;
        li.appendChild(a);
      }
      list.appendChild(li);
    })
  }

  function navBar() {
    let navListFirst = document.querySelector(".nav-list-first");
    let navListLast = document.querySelector(".nav-list-last");

    if (!loggedin) {
      addLinks([], navListFirst)
      addLinks([loginLink], navListLast)
      return;
    }
    else if (loggedin === "admin") {
      addLinks(linksToAdd, navListFirst);
    }
    else {
      const userLink = {
        name: username,
        link: ""
      }
      addLinks(linksToAdd.slice(0, 2), navListFirst)
    }

    const userLink = {
      name: username,
      link: "",
      isUserName: true
    }
    addLinks([userLink, logoutLink], navListLast);
  }
  navBar();

})();