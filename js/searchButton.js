(function () {
  let searchContainer = document.querySelector(".searchContainer");
  let [searchButtonMobile, searchButtonDesktop] = document.querySelectorAll(".searchIcon");
  let closeBtn = document.getElementById("closeBtn");
  let searchResults = document.querySelector(".searchResultsPositioner");
  let searchInput = document.getElementById("searchInput");

  function searchButtonEventListener(btn) {
    btn.addEventListener("click", () => {
      searchContainer.style.visibility = "visible";
    })
  }

  const closeSearch = () => {
    searchContainer.style.visibility = "";
    searchResults.style.visibility = "hidden";
    searchInput.value = "";
  }

  closeBtn.addEventListener("click", closeSearch)
  searchButtonEventListener(searchButtonMobile);
  searchButtonEventListener(searchButtonDesktop);

  document.addEventListener("scroll", closeSearch);
})();