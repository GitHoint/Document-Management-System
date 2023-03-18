(function () {

  function addButton(user) {
    let buttonsWrap = document.querySelector(".buttons-wrap");
    if (user === "owner" | userType === "admin") {
      let editBtn = document.createElement("button");
      editBtn.textContent = "Edit";
      buttonsWrap.appendChild(editBtn);
    }
    if (userType === "admin") {
      let deleteBtn = document.createElement("button");
      deleteBtn.textContent = "Delete";
      buttonsWrap.appendChild(deleteBtn);
    }
  }

  addButton(userStatus)

})();