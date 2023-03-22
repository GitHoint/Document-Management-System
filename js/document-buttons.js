(function () {

  function addButton(user) {
    let buttonsWrap = document.querySelector(".buttons-wrap");
    if (user === "owner" | userType === "admin") {
      let editBtn = document.createElement("input");
      editBtn.setAttribute("type", "submit");
      editBtn.setAttribute("name", "submit");
      editBtn.setAttribute("class", "button");
      let editForm = document.createElement("form");
      editForm.setAttribute("class", "edit-btn-form")
      editForm.setAttribute("method", "POST");
      editBtn.value = "Edit";

      editForm.appendChild(editBtn);
      buttonsWrap.appendChild(editForm);
    }
    if (userType === "admin") {
      // let deleteBtn = document.createElement("button");
      // deleteBtn.textContent = "Delete";
      // buttonsWrap.appendChild(deleteBtn);
      console.log(userType)
      let delIdInput = document.createElement("input");
      delIdInput.setAttribute("type", "hidden");
      delIdInput.setAttribute("name", "id");
      delIdInput.setAttribute("value", docId);
      let delBtn = document.createElement("input");
      delBtn.setAttribute("type", "submit");
      delBtn.setAttribute("name", "submit");
      delBtn.setAttribute("class", "button");
      let delForm = document.createElement("form");
      delForm.setAttribute("class", "del-btn-form")
      delForm.setAttribute("method", "POST");
      delForm.setAttribute("action", "deleteDocument.php");

      delForm.appendChild(delIdInput);
      delForm.appendChild(delBtn);
      buttonsWrap.appendChild(delForm);
    }
  }

  addButton(userStatus)

})();