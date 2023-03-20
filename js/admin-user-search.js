$(document).ready(function () {

    //Update Display of Active State
    $(".toggle-user-btn").each(function () {
        if ($(this).text() == "0") {
            $(this).text("Activate");
        }

        if ($(this).text() == "1") {
            $(this).addClass("active-user");
            $(this).text("Deactivate");
        }
    })

    // Search filters
    let userSearchInput = document.getElementById('user-search');

    function setCheckedValue() {
        const url = window.location.search;
        const params = new URLSearchParams(url);
        const activeOnly = params.get('active_only') ? Number(params.get('active_only')) : null;
        activeOnlyCheckbox.checked = activeOnly === null ? true : !!activeOnly;
        document.getElementById('active-title').innerHTML = activeOnly === null || !!activeOnly ? "Active Users" : "Deactive Users";
    }

    function submitQueries() {
        let queriesArray = [];
        queriesArray.push(`active_only=${activeOnlyCheckbox.checked ? 1 : 0}`);
        queriesArray.push(`q=${userSearchInput.value}`);
        window.location = '/document-management/users.php?' + queriesArray.join('&');
    }

    let activeOnlyCheckbox = document.querySelector("#ckb");
    
    setCheckedValue();

    activeOnlyCheckbox.addEventListener('change', e => {
        e.preventDefault();
        submitQueries();
    })

    let userSearchBtn = document.getElementById('search-button');
    userSearchBtn.onclick = submitQueries;

})