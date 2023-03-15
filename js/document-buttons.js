(function () {

  function addButton(user) {
    let buttonsWrap = document.querySelector(".buttons-wrap");
    if (user === "owner" | user === "admin") {
      let editBtn = document.createElement("button");
      editBtn.textContent = "Edit";
      buttonsWrap.appendChild(editBtn);
    }
    if (user === "admin") {
      let deleteBtn = document.createElement("button");
      deleteBtn.textContent = "Delete";
      buttonsWrap.appendChild(deleteBtn);
    }
  }

  addButton("admin")

})();