document.addEventListener('DOMContentLoaded', function () {
    var urlParams = new URLSearchParams(window.location.search);
    var name = urlParams.get('name');
    if (name) {
        document.getElementById('searchUsers').value = name;
    }
});
