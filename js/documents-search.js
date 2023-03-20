(function () {

  const searchInput = document.querySelector(".search-form > input");
  const checkboxes = document.querySelectorAll("input[type='checkbox']");
  const crit = document.getElementById('criticality');

  function submitSearch(e) {
    e.preventDefault()

    const checkedValues = [];

    checkboxes.forEach(checkbox => {
      if (checkbox.checked) {
        checkedValues.push(`'${checkbox.value}'`);
      }
    });
    let searchInputValue = searchInput.value;
    let typesValue = checkedValues.join(",");
    let critValue = crit.value;

    let queryArray = [];
    if (searchInputValue) {
      queryArray.push('q=' + searchInputValue);
    }
    if (typesValue) {
      queryArray.push('types=' + typesValue);
    }
    if (critValue.length > 1) {
      queryArray.push('crit=' + critValue);
    }
    window.location = '/document-management/search.php?' + queryArray.join('&');
  }

  let submitBtn = document.querySelector("button.submit-search");
  submitBtn.onclick = submitSearch;

  const url = window.location.search;
  const params = new URLSearchParams(url);

  searchInput.value = params.get('q');
  crit.value = params.get('crit') ? params.get('crit') : " ";

  const typesValues = params.get('types')?.split(',').map(str => str.replace(/'/g, ''));
  if (typesValues)
    checkboxes.forEach(checkbox => {
      if (typesValues.includes(checkbox.value))
        checkbox.checked = true;
    })


})();