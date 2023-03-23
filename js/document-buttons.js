(function () {

  function addButton(user) {
    let buttonsWrap = document.querySelector(".buttons-wrap");
    if (user === "owner" | userType === "admin") {
      let editIdInput = document.createElement("input");
      editIdInput.setAttribute("type", "hidden");
      editIdInput.setAttribute("name", "id");
      editIdInput.setAttribute("value", docId);
      let editBtn = document.createElement("input");
      editBtn.setAttribute("type", "submit");
      editBtn.setAttribute("name", "submit");
      editBtn.setAttribute("class", "button");
      editBtn.value = "Edit";
      let editForm = document.createElement("form");
      editForm.setAttribute("class", "edit-btn-form")
      editForm.setAttribute("method", "POST");
      editForm.setAttribute("action", "upload.php");

      editForm.appendChild(editIdInput);
      editForm.appendChild(editBtn);
      buttonsWrap.appendChild(editForm);
    }
    if (userType === "admin") {
      let delIdInput = document.createElement("input");
      delIdInput.setAttribute("type", "hidden");
      delIdInput.setAttribute("name", "id");
      delIdInput.setAttribute("value", docId);
      let delBtn = document.createElement("input");
      delBtn.setAttribute("type", "submit");
      delBtn.setAttribute("name", "submit");
      delBtn.setAttribute("class", "button");
      delBtn.value = "Delete";
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