document.addEventListener('DOMContentLoaded', function () {
    function getQueryParam(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }
    // Get the 'activeTab' parameter from the URL
    const activeTab = getQueryParam('activeTab');

    if (activeTab === 'myOrder') {
        toggleActiveTab('myOrder');
        myOrder.classList.add('bg-secondary-subtle');
    } else if (activeTab === 'editPreferences') {
        toggleActiveTab('editPreferences');
        editPreferences.classList.add('bg-secondary-subtle');
    } else {
        // Default to making the "Personal Data" tab active
        toggleActiveTab('personalData');
        personalData.classList.add('bg-secondary-subtle');
    }
});

var personalData = document.getElementById('personalData');
personalData.addEventListener('click', function () {
    toggleActiveTab('personalData');
    personalData.classList.add('bg-secondary-subtle');
});

var myOrder = document.getElementById('myOrder');
myOrder.addEventListener('click', function () {
    toggleActiveTab('myOrder');
    myOrder.classList.add('bg-secondary-subtle');
});

var editPreferences = document.getElementById('editPreferences');
editPreferences.addEventListener('click', function () {
    toggleActiveTab('editPreferences');
    editPreferences.classList.add('bg-secondary-subtle');
});

function toggleActiveTab(tabName) {
    var tabs = document.querySelectorAll('.profile-tab');
    tabs.forEach(function (tab) {
        tab.classList.remove('bg-secondary-subtle');
    });

    var tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(function (tab) {
        tab.style.display = 'none';
    });

    var tabActive = document.getElementById(tabName + 'Active');
    if (tabActive) {
        tabActive.style.display = 'block';
    }

    history.pushState({}, '', '?activeTab=' + tabName);
}


function toggleActiveProfile(tabName) {
    var tabActive = document.getElementById(tabName + 'Active');
    var otherTabName = (tabName === 'accInfo') ? 'passSec' : 'accInfo';
    var otherTabActive = document.getElementById(otherTabName + 'Active');
    var tabText = document.getElementById(tabName + 'Text');
    var otherTabText = document.getElementById(otherTabName + 'Text');
    var tabContent = document.getElementById(tabName + 'Content');
    var otherTabContent = document.getElementById(otherTabName + 'Content');

    tabActive.classList.remove('d-none');
    tabActive.classList.add('d-block');
    tabText.style.color = '#5E5946';
    tabContent.classList.add('d-block');
    tabContent.classList.remove('d-none');

    otherTabActive.classList.remove('d-block');
    otherTabActive.classList.add('d-none');
    otherTabText.style.color = '#000';
    otherTabContent.classList.add('d-none');
    otherTabContent.classList.remove('d-block');
}

var allOrderBtn = document.getElementById('allOrderBtn');
var progressBtn = document.getElementById('progressBtn');
var successBtn = document.getElementById('successBtn');
var canceledBtn = document.getElementById('canceledBtn');

// Add event listeners to each button
allOrderBtn.addEventListener('click', function (e) {
    toggleStatusOrder(e);
});

progressBtn.addEventListener('click', function (e) {
    console.log(progressBtn)
    toggleStatusOrder(e);
});

successBtn.addEventListener('click', function (e) {
    toggleStatusOrder(e);
});

canceledBtn.addEventListener('click', function (e) {
    toggleStatusOrder(e);
});

function toggleStatusOrder(event) {
    // Remove "active" class from all buttons
    var buttons = document.querySelectorAll('.status-btn');
    buttons.forEach(function (button) {
        button.classList.remove('active');
    });

    // Add "active" class to the clicked button
    event.target.classList.add('active');
}

